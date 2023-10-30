<?php

namespace App\Repositories;

use Session;
use Schema;

use App\Models\Candidate;
use App\Interfaces\CandidateRepositoryInterface;

class CandidateRepository implements CandidateRepositoryInterface
{

	public function getAllCandidates() {

		return Candidate::with('jobs')->get();

	}

	public function getCandidates($searchTerm = '') {

		$columns = Schema::getColumnListing('candidates');

		$candidates = Candidate::with('jobs');

		if($searchTerm != '') {
			$candidates = $candidates->where(function ($query) use ($searchTerm, $columns) {
				foreach($columns as $value) {
					$query->orWhere($value, 'LIKE', '%' . $searchTerm . '%');
				}
			});
		}

		$order = Session::has('candidates_order') ? Session::get('candidates_order') : NULL;
		$orderBy = Session::has('candidates_order_by') ? Session::get('candidates_order_by') : NULL;

		if(in_array($order, $columns) && in_array($orderBy, ['asc', 'desc'])) {
			$candidates = $candidates->orderBy($order, $orderBy);
		} else {
			$candidates = $candidates->orderBy('name', 'ASC');
		}

		return $candidates->paginate(20);

	}

}