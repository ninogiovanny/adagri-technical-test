<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidate extends Model
{

	use HasFactory;

	public $timestamps = true;

	protected $table = 'candidates';

	protected $pivotTable = 'jobs_candidates';

	protected $fillable = [
		'name',
		'email',
		'phone'
	];

	public function jobs(): BelongsToMany
	{
		return $this->belongsToMany(Job::class, $this->pivotTable);
	}

}