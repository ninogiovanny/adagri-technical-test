<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ADAGRI - Teste técnico</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">

	<style type="text/css">
		h1, h2, h3, h4, h5, h6, p { font-family: 'Nunito', sans-serif; }
		table th { font-size: 90%; }
		table td { font-size: 80%; }
		table th,
		table td { vertical-align:middle; }
		table .action,
		table .action form { width: 20px !important; }
		table th.action { color: rgba(0, 0, 0, .3); }
		table .delete { outline: none; }
		.toast { width: 360px !important; font-size: 90%; }
		ul.pagination { display: inline-flex; margin: 15px auto 0; }
	</style>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
	<script src="https://cdn.tailwindcss.com"></script>

	@yield('scripts')

</head>

<body class="antialiased">

	@include('templates.messages')

	<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

		<div class="@if(Route::currentRouteName() == 'home') max-w-2xl @elseif(in_array(Route::currentRouteName(), ['job.create', 'job.edit', 'candidate.create', 'candidate.edit'])) max-w-lg @endif mx-auto">

			<h1 class="title text-gray-500 text-center px-8 py-3">ADAGRI - Agência de Defesa Agropecuária do Ceará</h1>

			<ul class="flex margin-auto align-center justify-center mb-4">
				<li><a href="{{ route('home') }}" class="py-3 px-2">Página inicial</a></li>
				<li><a href="{{ route('jobs') }}" class="py-3 px-2">Vagas</a></li>
				<li><a href="{{ route('candidates') }}" class="py-3 px-2">Candidatos</a></li>
			</ul>

			<div class="bg-white dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">