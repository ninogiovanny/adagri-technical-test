@extends('templates.master')

@section('content')

<div class="grid grid-cols-1 p-6">

	<h2 class="subtitle text-center mb-0 w-100">Atualizar informações de vaga</h2>

	<hr class="my-3">

	{{ html()->modelForm($job, 'PATCH', route('job.update', [$job]))->open() }}

	<div class="row">

		@include('jobs.form')

		<div class="col-12 form-group mb-2">
			{{ html()->checkbox('accepts_application', null)->id('accepts_application')->class(['shadow border border-gray-300 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}
			{{ html()->label('Aceita aplicação?', 'accepts_application')->class(['block w-100 text-gray-700 text-sm font-bold mb-2']) }}
		</div>

		<div class="col-12 form-group mb-2">
			{{ html()->submit('Atualizar informações de vaga')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}
		</div>

	</div>

	{{ html()->form()->close() }}

</div>

@endsection