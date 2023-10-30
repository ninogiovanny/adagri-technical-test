<?php

namespace Database\Seeders;

use DB;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('candidates')->truncate();

		\App\Models\Candidate::factory()->count(50)->create();

		$this->command->info('50 candidatos inseridos via factory com sucesso.');

	}

}