<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsCandidatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('jobs_candidates', function (Blueprint $table) {

			$table->id();

			$table->bigInteger('job_id')->unsigned();
			$table->bigInteger('candidate_id')->unsigned();

			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
			$table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');

			$table->timestamps();

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {

		Schema::dropIfExists('jobs_candidates');

	}

}