<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('jobs', function (Blueprint $table) {

			$table->id();

			$table->string('title');
			$table->text('description')->nullable();
			$table->enum('type', ['clt', 'pj', 'freelancer']);
			$table->boolean('accepts_application')->default(true);

			$table->timestamps();

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {

		Schema::dropIfExists('jobs');

	}

}