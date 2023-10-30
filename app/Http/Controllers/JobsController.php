<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\Models\Job;
use App\Models\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\JobRepository;

class JobsController extends Controller
{

	protected $jobRepository;

	public function __construct(JobRepository $jobRepository) {

        $this->jobRepository = $jobRepository;

    }

	public function index() {

		$jobs = Job::with('candidates')
			->orderBy('title', 'ASC')
			->paginate(20);

		return view('jobs.index')
			->with('jobs', $jobs);

	}

	public function search(Request $request) {

		$input = $request->all();

		if(!array_key_exists('term', $input) || $input['term'] == '' || $input['term'] == NULL) {
			return redirect()->route('home');
		}

		$jobs = $this->jobRepository->getJobs($input['term']);

		return view('jobs.index')
			->with('jobs', $jobs)
			->with('searchTerm', $input['term']);

	}

	public function create() {

		$jobType = [
			'clt' => 'CLT',
			'pj' => 'Pessoa Jurídica',
			'freelancer' => 'Freelancer'
		];

		return view('jobs.create')
			->with('jobType', $jobType);
	}

	/**
     * Store job.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request) {

		$input = $request->all();

		$rules = array(
			'title'			=> 'required|max:255',
			'type'			=> 'required'
		);

		$messages = array(
			'title.required'	=> 'Título de vaga é campo obrigatório',
			'title.max'			=> 'Título de vaga deve ter no máximo 255 caracteres',
			'type.required'		=> 'Tipo de vaga é campo obrigatório'
		);

		$this->validate($request, $rules, $messages);

		$newJob = new Job();

		$newJob->title = $input['title'];
		$newJob->description = $input['description'];
		$newJob->type = $input['type'];

		$savedJob = $newJob->save();

		if($savedJob) {

			Session::flash('success_message', [
				'title' => 'Cadastro realizado!',
				'description' => 'Vaga de emprego <strong>' . $newJob->name . '</strong> foi cadastrada com sucesso.'
			]);

		} else {

			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Não foi possível salvar esta categoria de produto. Por favor, atualize sua página e tente novamente.'
			]);

		}

		return redirect()->back();

	}

	public function show(Job $job) {

		$candidatesDropdown = Candidate::orderBy('name')->pluck('name', 'id');

		return view('jobs.show')
			->with('candidatesDropdown', $candidatesDropdown)
			->with('job', $job);

	}

	public function edit(Job $job) {

		$jobType = [
			'clt' => 'CLT',
			'pj' => 'Pessoa Jurídica',
			'freelancer' => 'Freelancer'
		];

		return view('jobs.edit')
			->with('job', $job)
			->with('jobType', $jobType);

	}

	public function update(Request $request, Job $job) {

		$input = $request->all();

		if($job == NULL) {
			Session::flash('error_message', 'Não foi possível identificar a vaga que você está tentando atualizar.');
			return redirect()->back();
		}

		$rules = array(
			'title'	=> 'required|max:255',
			'type'	=> 'required'
		);

		$messages = array(
			'title.required'	=> 'Título de vaga é campo obrigatório',
			'title.max'			=> 'Título de vaga deve ter no máximo 255 caracteres',
			'type.required'		=> 'Tipo de vaga é campo obrigatório'
		);

		$this->validate($request, $rules, $messages);

		$job->title					= $input['title'];
		$job->description			= $input['description'];
		$job->type					= $input['type'];
		$job->accepts_application	= array_key_exists('accepts_application', $input) && $input['accepts_application'] != NULL ? 1 : 0;

		$savedJob = $job->save();

		if($savedJob) {

			Session::flash('success_message', [
				'title' => 'Tudo certo!',
				'description' => 'Informações de vaga foram atualizadas.'
			]);

			return redirect()->back();

		} else {

			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Não foi possível atualizar as informações desta vaga de emprego. Por favor, atualize sua página e tente novamente.'
			]);

			return redirect()->back()->withInput();

		}

	}

	public function delete(Job $job) {

		$job->delete();

		Session::flash('success_message', [
			'title' => 'Vaga foi deletada!',
			'description' => 'Todas as informações de vaga de emprego, assim como suas candidaturas, foram deletadas.'
		]);

		return redirect()->route('jobs');

	}

}