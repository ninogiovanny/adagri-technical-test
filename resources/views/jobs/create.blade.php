@extends('templates.master')

@section('content')

<div class="grid grid-cols-1 p-6">

	<h2 class="subtitle text-center mb-0 w-100">Cadastrar nova vaga de emprego</h2>

	<hr class="my-3">

	{{ html()->form('POST', route('job.store'))->open() }}

	<div class="row">

		@include('jobs.form')

		<div class="col-12 form-group mb-2">
			{{ html()->submit('Adicionar vaga de emprego')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}
		</div>

	</div>

	{{ html()->form()->close() }}

</div>

@endsection