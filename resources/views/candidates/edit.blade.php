@extends('templates.master')

@section('content')

<div class="grid grid-cols-1 p-6">

	<h2 class="subtitle text-center mb-0 w-100">Atualizar informações de candidato</h2>

	<hr class="my-3">

	{{ html()->modelForm($candidate, 'PATCH', route('candidate.update', [$candidate]))->open() }}

	<div class="row">

		@include('candidates.form')

		<div class="col-12 form-group mb-2">
			{{ html()->submit('Atualizar informações sobre candidato')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}
		</div>

	</div>

	{{ html()->form()->close() }}

</div>

@endsection