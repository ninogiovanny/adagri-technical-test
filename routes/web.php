<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');

// Jobs
Route::group(['prefix' => '/jobs'], function() {
	Route::get('/', [App\Http\Controllers\JobsController::class, 'index'])->name('jobs');
	Route::get('/search', [App\Http\Controllers\JobsController::class, 'search'])->name('jobs.search');
});

Route::group(['prefix' => '/job'], function() {
	Route::get('/create', [App\Http\Controllers\JobsController::class, 'create'])->name('job.create');
	Route::post('/store', [App\Http\Controllers\JobsController::class, 'store'])->name('job.store');
	Route::get('/{job}/show', [App\Http\Controllers\JobsController::class, 'show'])->name('job.show');
	Route::get('/{job}/edit', [App\Http\Controllers\JobsController::class, 'edit'])->name('job.edit');
	Route::patch('/{job}/update', [App\Http\Controllers\JobsController::class, 'update'])->name('job.update');
	Route::delete('/{job}/delete', [App\Http\Controllers\JobsController::class, 'delete'])->name('job.delete');
});

// Candidates
Route::group(['prefix' => '/candidates'], function() {
	Route::get('/', [App\Http\Controllers\CandidatesController::class, 'index'])->name('candidates');
	Route::get('/search', [App\Http\Controllers\CandidatesController::class, 'search'])->name('candidates.search');
	Route::post('/ordenar', [App\Http\Controllers\CandidatesController::class, 'order'])->name('candidates.order');
});

Route::group(['prefix' => '/candidate'], function() {
	Route::get('/create', [App\Http\Controllers\CandidatesController::class, 'create'])->name('candidate.create');
	Route::post('/store', [App\Http\Controllers\CandidatesController::class, 'store'])->name('candidate.store');
	Route::get('/{candidate}/show', [App\Http\Controllers\CandidatesController::class, 'show'])->name('candidate.show');
	Route::get('/{candidate}/edit', [App\Http\Controllers\CandidatesController::class, 'edit'])->name('candidate.edit');
	Route::patch('/{candidate}/update', [App\Http\Controllers\CandidatesController::class, 'update'])->name('candidate.update');
	Route::delete('/{candidate}/delete', [App\Http\Controllers\CandidatesController::class, 'delete'])->name('candidate.delete');
});

Route::post('/job/candidate/application', [App\Http\Controllers\CandidatesController::class, 'application'])->name('application');