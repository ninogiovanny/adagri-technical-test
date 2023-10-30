<?php

namespace App\Repositories;

use Session;
use Schema;

use App\Models\Job;
use App\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{

	public function getAllJobs() {

		return Job::with('jobs')->get();

	}

	public function getJobs($searchTerm = '') {

		$columns = Schema::getColumnListing('jobs');

		$jobs = Job::with('candidates');

		if($searchTerm != '') {
			$jobs = $jobs->where(function ($query) use ($searchTerm, $columns) {
				foreach($columns as $value) {
					$query->orWhere($value, 'LIKE', '%' . $searchTerm . '%');
				}
			});
		}

		$jobs = $jobs->orderBy('title', 'ASC');

		return $jobs->paginate(20);

	}

}