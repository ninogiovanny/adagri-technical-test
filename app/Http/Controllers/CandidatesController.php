<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\Models\Job;
use App\Models\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\CandidateRepository;

class CandidatesController extends Controller
{

	protected $candidateRepository;

	public function __construct(CandidateRepository $candidateRepository) {

        $this->candidateRepository = $candidateRepository;

    }

	public function index() {

		$order = Session::has('candidates_order') ? Session::get('candidates_order') : NULL;
		$orderBy = Session::has('candidates_order_by') ? Session::get('candidates_order_by') : NULL;

		$columns = [
			'name' => 'Nome',
			'email' => 'Email',
			'phone' => 'Telefone'
		];

		$candidates = $this->candidateRepository->getCandidates();

		return view('candidates.index')
			->with('candidates', $candidates)
			->with('columns', $columns)
			->with('order', $order)
			->with('orderBy', $orderBy);

	}

	public function search(Request $request) {

		$input = $request->all();

		$order = Session::has('candidates_order') ? Session::get('candidates_order') : NULL;
		$orderBy = Session::has('candidates_order_by') ? Session::get('candidates_order_by') : 'asc';

		$columns = [
			'name' => 'Nome',
			'email' => 'Email',
			'phone' => 'Telefone'
		];

		if(!array_key_exists('term', $input) || $input['term'] == '' || $input['term'] == NULL) {
			return redirect()->route('home');
		}

		$candidates = $this->candidateRepository->getCandidates($input['term']);

		return view('candidates.index')
			->with('candidates', $candidates)
			->with('columns', $columns)
			->with('order', $order)
			->with('orderBy', $orderBy)
			->with('searchTerm', $input['term']);

	}

	public function order(Request $request) {

		$input = $request->all();

		if(array_key_exists('order', $input) && $input['order'] != '' && $input['order'] != NULL) {
			if(array_key_exists('by', $input) && $input['by'] != '' && $input['by'] != NULL) {
				Session::put('candidates_order', $input['order']);
				Session::put('candidates_order_by', $input['by']);
			} else {
				Session::forget('candidates_order');
				Session::forget('candidates_order_by');
			}
		} else {
			Session::forget('candidates_order');
			Session::forget('candidates_order_by');
		}

		return redirect()->back();

	}

	public function create() {

		return view('candidates.create');

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
			'name'	=> 'required|max:255',
			'email'	=> 'required|email',
			'phone'	=> 'required|max:11'
		);

		$messages = array(
			'name.required'		=> 'Nome é campo obrigatório',
			'name.max'			=> 'Título de vaga deve ter no máximo 255 caracteres',
			'email.required'	=> 'Email é campo obrigatório',
			'email.email'		=> 'Insira um email válido',
			'phone.required'	=> 'Telefone é campo obrigatório',
			'phone.max'			=> 'Telefone deve ter no máximo 11 dígitos'
		);

		$this->validate($request, $rules, $messages);

		$newCandidate = new Candidate();

		$newCandidate->name = $input['name'];
		$newCandidate->email = $input['email'];
		$newCandidate->phone = $input['phone'];

		$savedCandidate = $newCandidate->save();

		if($savedCandidate) {

			Session::flash('success_message', [
				'title' => 'Cadastro realizado!',
				'description' => 'Candidato cadastrada com sucesso.'
			]);

		} else {

			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Não foi possível cadastrar o candidato. Por favor, atualize sua página e tente novamente.'
			]);

		}

		return redirect()->back();

	}

	public function show(Candidate $candidate) {

		$jobsDropdown = Job::orderBy('title')->pluck('title', 'id');

		return view('candidates.show')
			->with('jobsDropdown', $jobsDropdown)
			->with('candidate', $candidate);

	}

	public function edit(Candidate $candidate) {

		return view('candidates.edit')
			->with('candidate', $candidate);

	}

	public function update(Request $request, Candidate $candidate) {

		$input = $request->all();

		if($candidate == NULL) {
			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Não foi possível identificar o candidato que você está tentando atualizar.'
			]);
			return redirect()->back();
		}

		$rules = array(
			'name'	=> 'required|max:255',
			'email'	=> 'required|email',
			'phone'	=> 'required|max:11'
		);

		$messages = array(
			'name.required'		=> 'Nome é campo obrigatório',
			'name.max'			=> 'Título de vaga deve ter no máximo 255 caracteres',
			'email.required'	=> 'Email é campo obrigatório',
			'email.email'		=> 'Insira um email válido',
			'phone.required'	=> 'Telefone é campo obrigatório',
			'phone.max'			=> 'Telefone deve ter no máximo 11 dígitos'
		);

		$this->validate($request, $rules, $messages);

		$candidate->name	= $input['name'];
		$candidate->email	= $input['email'];
		$candidate->phone	= $input['phone'];

		$savedCandidate = $candidate->save();

		if($savedCandidate) {

			Session::flash('success_message', [
				'title' => 'Tudo certo!',
				'description' => 'Informações de candidato foram atualizadas.'
			]);

			return redirect()->back();

		} else {

			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Não foi possível atualizar as informações do candidato. Por favor, atualize sua página e tente novamente.'
			]);

			return redirect()->back()->withInput();

		}

	}

	public function delete(Candidate $candidate) {

		$input = $request->all();

		$candidate->delete();

		Session::flash('success_message', [
			'title' => 'Candidato foi deletado!',
			'description' => 'Todas as informações do candidato, assim como suas candidaturas, foram deletadas.'
		]);

		return redirect()->route('candidates');

	}

	public function application(Request $request) {

		$input = $request->all();

		if(array_key_exists('candidate_id', $input) && $input['candidate_id'] != NULL) {

			$candidate = Candidate::where('id', $input['candidate_id'])->first();

			if($candidate == NULL) {

				Session::flash('error_message', [
					'title' => 'Erro!',
					'description' => 'Não foi possível identificar o candidato.'
				]);

				return redirect()->back();

			}

		} else {

			Session::flash('error_message', [
				'title' => 'Erro!',
				'description' => 'Erro ao identificar o candidato à vaga. Atualize sua página e tente novamente.'
			]);

			return redirect()->back();

		}

		if(array_key_exists('job_id', $input) && $input['job_id'] != NULL) {

			$job = Job::where('id', $input['job_id'])->first();

			if($job == NULL) {
				Session::flash('error_message', [
					'title' => 'Erro!',
					'description' => 'Não foi possível identificar a vaga.'
				]);
				return redirect()->back();
			}

			if($candidate->jobs->contains($job)) {
				Session::flash('warning_message', [
					'title' => 'Candidatura já realizada!',
					'description' => 'O candidato já aplicou para esta vaga.'
				]);
				return redirect()->back();
			}

			if($job->accepts_application == false) {
				Session::flash('info_message', [
					'title' => 'Vaga não aceita mais candidaturas',
					'description' => 'A vaga para a qual você tentou aplicar não está mais recebendo candidaturas.'
				]);
				return redirect()->back();
			}

			$candidate->jobs()->attach($job);

			Session::flash('success_message', [
				'title' => 'Candidatura realizada!',
				'description' => 'O candidato aplicou com sucesso para a vaga.'
			]);

			return redirect()->back();

		}

	}

}