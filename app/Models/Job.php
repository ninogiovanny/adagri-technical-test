<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{

	public $timestamps = true;

	protected $table = 'jobs';

	protected $pivotTable = 'jobs_candidates';

	protected $fillable = [
		'title',
		'description',
		'type',
		'accepts_application'
	];

	public function candidates(): BelongsToMany
	{
		return $this->belongsToMany(Candidate::class, $this->pivotTable);
	}

}