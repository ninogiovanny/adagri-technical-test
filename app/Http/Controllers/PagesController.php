<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function home() {

		$jobs = Job::get();
		$candidates = Candidate::get();

		return view('home')
			->with('jobs', $jobs)
			->with('candidates', $candidates);

	}

}