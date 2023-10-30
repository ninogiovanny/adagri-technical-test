@extends('templates.master')

@section('content')

<div class="grid grid-cols-1 p-6">

	<p class="text-center text-sm pt-1 pb-3">
		<a class="text-green-700" href="{{ route('candidate.create') }}">
			<strong>Cadastrar novo candidato</strong>
		</a>
	</p>

	@if(count($candidates) > 0)

	<h2 class="subtitle text-center mb-3 w-100">Candidatos cadastrados até o momento</h2>

	<div class="row">
		<div class="col-lg-6">
			{{ html()->form('POST', route('candidates.order'))->open() }}
			<div class="row">
				<div class="col-6 form-group mb-2 pr-1">
					{{ html()->select('order', $columns, isset($order) ? $order : NULL)->id('order')->class(['block w-full border border-gray-300 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline'])->placeholder('Ordenar por') }}
				</div>
				<div class="col-3 form-group mb-2 pl-1 pr-1">
					{{ html()->select('by', ['asc' => 'ASC', 'desc' => 'DESC'], isset($orderBy) ? $orderBy : NULL)->id('by')->class(['block w-full border border-gray-300 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline']) }}
				</div>
				<div class="col-3 form-group mb-2 pl-1">
					{{ html()->submit('Ok')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline']) }}
				</div>
			</div>
			{{ html()->form()->close() }}
		</div>
		<div class="col-lg-5 offset-lg-1">
			{{ html()->form('GET', route('candidates.search'))->open() }}
			<div class="row">
				<div class="col-8 form-group mb-2 pr-1">
					{{ html()->text('term')->value(isset($searchTerm) ? $searchTerm : '')->id('term')->class(['border border-gray-300 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Pesquisar') }}
				</div>
				<div class="col-4 form-group mb-2 pl-1">
					{{ html()->submit('Buscar')->class(['block w-full bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline']) }}
				</div>
			</div>
			{{ html()->form()->close() }}
		</div>
	</div>

	<table class="table">
		<thead>
			<tr class="border">
				<th class="px-2 py-1">Nome</th>
				<th class="text-center px-2 py-1">Email</th>
				<th class="text-center px-2 py-1">Telefone</th>
				<th class="text-center px-2 py-1">Candidaturas</th>
				<th class="action text-gray-300 text-center px-2 py-1">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
					</svg>
				</th>
				<th class="action text-gray-300 text-center px-2 py-1">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</th>
			</tr>
		</thead>
		<tbody>

			@foreach($candidates as $candidate)

			<tr class="table-row border">
				<td class="table-cell px-2 py-1">
					<a href="{{ route('candidate.show', $candidate) }}" class="text-blue-600 hover:text-blue-800">
						<strong>{{ $candidate->name }}</strong>
					</a>
				</td>
				<td class="table-cell text-center px-2 py-1">
					{{ $candidate->email }}
				</td>
				<td class="table-cell text-center px-2 py-1">
					{{ $candidate->phone }}
				</td>
				<td class="table-cell text-center px-2 py-1">
					{{ $candidate->jobs->count() }}
				</td>
				<td class="action hidden-print px-2 py-1 text-center">
					<a href="{{ route('candidate.edit', $candidate) }}" class="text-primary" title="Editar informações de vaga">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-5 h-5 mx-auto">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
						</svg>
					</a>
				</td>
				<td class="action hidden-print px-2 py-1 text-center">
					{{ html()->form('DELETE', route('candidate.delete', $candidate))->attributes(['id' => 'delete-candidate-' . $candidate->id, 'class' => 'flex justify-center'])->open() }}
					{{ html()->submit('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>')->class(['btn text-danger delete delete-candidate']) }}
					{{ html()->form()->close() }}
				</td>
			</tr>

			@endforeach

		</tbody>
		<tfoot>
			<tr class="border">
				<th class="px-2 py-1">Nome</th>
				<th class="text-center px-2 py-1">Email</th>
				<th class="text-center px-2 py-1">Telefone</th>
				<th class="text-center px-2 py-1">Candidaturas</th>
				<th class="action text-gray-300 text-center px-2 py-1">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
					</svg>
				</th>
				<th class="action text-gray-300 text-center px-2 py-1">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</th>
			</tr>
		</tfoot>
	</table>

	@if(method_exists($candidates, 'total'))
	<div class="col-lg-12 text-center">
		@if($candidates->total() > 0)
		<p class="text-gray-500 mb-0">
			<small><i>{{ 'Mostrando de ' . $candidates->firstItem() . ' a ' . $candidates->lastItem() . ' de um total de ' . $candidates->total() . ' resultados - Página ' . $candidates->currentPage() . ' de ' . $candidates->lastPage() }}</i></small>
		</p>
		@php $input = request()->input(); unset($input['_token']); @endphp
		{{ $candidates->appends($input)->links('pagination::bootstrap-4') }}
		@endif
	</div>
	@endif

	@else
	<p class="lead text-mute text-center p-4">Não há vagas de emprego cadastradas até o momento.</p>
	@endif

</div>

@section('scripts')

<script type="text/javascript">

	jQuery(document).ready(function() {

		jQuery('.delete-candidate').click(function (e) {

			var form = jQuery(this).parents('form');

			Swal.fire({

				type: "warning",
				title: "Deseja realmente remover?",
				text: "O candidato não ficará mais disponível para futuras candidaturas. Todas as candidaturas atreladas até o momento também serão deletadas.",
				icon: 'error',
				showCancelButton: true,
				confirmButtonColor: "#FFC107",
				confirmButtonText: "Deletar",
				cancelButtonText: "Cancelar",
				closeOnConfirm: false

			}).then((result) => {

				if (result.isConfirmed) {
					form.submit();
				} else {
					if (result.isDenied) {
						swal("Cancelado!", "Tudo como antes! Candidato não foi removido.", "success").delay(640);
					}
				}

			});

			e.preventDefault();

		});

	});

</script>

@yield('include_script')

@endsection

@endsection