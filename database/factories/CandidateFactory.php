<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{

	protected $model = \App\Models\Candidate::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->name(),
			'phone' => str_replace('+', '', $this->faker->unique()->e164PhoneNumber()),
			'email' => $this->faker->unique()->safeEmail(),
			'created_at' => date('Y-m-d H:i:s')
		];
	}
}
