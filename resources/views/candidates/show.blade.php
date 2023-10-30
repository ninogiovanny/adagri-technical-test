@extends('templates.master')

@section('content')

<div class="grid grid-cols-3">

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Candidato</h2>

		<hr class="my-3">

		<div class="row">

			<div class="col-12 form-group mb-2">
				<ul>
					<li><strong>Nome</strong>: {{ $candidate->name }}</li>
					<li><strong>Email</strong>: {{ $candidate->email }}</li>
					<li><strong>Telefone</strong>: {{ $candidate->phone }}</li>
				</ul>
			</div>

		</div>

	</div>

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Candidaturas realizadas</h2>

		<hr class="my-3">

		@if($candidate->jobs->count() > 0)
		<ul>
			@foreach($candidate->jobs as $cjob)
			<li><strong><a href="{{ route('job.show', $cjob) }}" class="text-blue-600 hover:text-blue-800">{{ $cjob->title }}</a></strong></li>
			@endforeach
		</ul>
		@else
		<p class="p-4">Nenhuma candidatura realizada no momento</p>
		@endif

	</div>

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Aplicar às vagas disponíveis</h2>

		<hr class="my-3">

		{{ html()->form('POST', route('application'))->open() }}

		{{ html()->hidden('candidate_id', $candidate->id) }}

		<div class="col-12 form-group mb-2">
			{{ html()->select('job_id', $jobsDropdown, null)->id('job_id')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Selecionar vaga para candidato') }}
		</div>

		<div class="col-12 form-group mb-2">
			{{ html()->submit('Aplicar à vaga')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}
		</div>

		{{ html()->form()->close() }}

	</div>

</div>

@endsection