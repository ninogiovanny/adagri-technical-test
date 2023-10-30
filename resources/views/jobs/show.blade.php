@extends('templates.master')

@section('content')

<div class="grid grid-cols-3">

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Irformações sobre a vaga</h2>

		<hr class="my-3">

		<div class="row">

			<div class="col-12 form-group mb-2">
				<ul>
					<li><strong>Título</strong>: {{ $job->title }}</li>
					<li><strong>Descrição</strong>: <small>{{ $job->description }}</small></li>
					<li><strong>Aceita candidaturas</strong>: {{ $job->accepts_application ? 'Sim' : 'Não' }}</li>
				</ul>
			</div>

		</div>

	</div>

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Candidatos com aplicação à vaga</h2>

		<hr class="my-3">

		@if($job->candidates->count() > 0)
		<ul>
			@foreach($job->candidates as $jcand)
			<li><strong><a href="{{ route('candidate.show', $jcand) }}" class="text-blue-600 hover:text-blue-800">{{ $jcand->name }}</a></strong></li>
			@endforeach
		</ul>
		@else
		<p class="p-4">Nenhuma candidatura realizada no momento</p>
		@endif

	</div>

	<div class="p-6">

		<h2 class="subtitle text-center mb-0 w-100">Realizar candidatura</h2>

		<hr class="my-3">

		{{ html()->form('POST', route('application'))->open() }}

		{{ html()->hidden('job_id', $job->id) }}

		<div class="col-12 form-group mb-2">
			{{ html()->select('candidate_id', $candidatesDropdown, null)->id('candidate_id')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Selecionar candidato para aplicação à vaga') }}
		</div>

		<div class="col-12 form-group mb-2">
			{{ html()->submit('Realizar candidatura à vaga')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}
		</div>

		{{ html()->form()->close() }}

	</div>

</div>

@endsection