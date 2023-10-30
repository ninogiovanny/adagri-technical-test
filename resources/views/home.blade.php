@extends('templates.master')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2">

	<div class="p-6">
		<div class="flex items-center">
			<svg stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
			</svg>

			<div class="ml-4 text-lg leading-7 font-semibold">
				<a href="{{ route('jobs') }}" class="underline text-blue-600 hover:text-blue-800 dark:text-white">
					Vagas {{ $jobs->count() > 0 ?  '(' . $jobs->count() . ')' : '' }}
				</a>
			</div>

		</div>

		<div class="ml-12">
			<div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
				<ul>
					<li class="mb-2"><a href="{{ route('jobs') }}" class="text-gray-600 hover:text-gray-900">Listar vagas cadastradas até o momento.</a></li>
					<li><a href="{{ route('job.create') }}" class="text-gray-600 hover:text-gray-900">Cadastrar nova vaga.</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
		<div class="flex items-center">

			<svg stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
			</svg>

			<div class="ml-4 text-lg leading-7 font-semibold">
				<a href="{{ route('candidates') }}" class="underline text-blue-600 hover:text-blue-800 dark:text-white">
					Candidatos {{ $candidates->count() > 0 ?  '(' . $candidates->count() . ')' : '' }}
				</a>
			</div>

		</div>

		<div class="ml-12">
			<div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
				<ul>
					<li class="mb-2"><a href="{{ route('candidates') }}" class="text-gray-600 hover:text-gray-900">Listar candidatos cadastrados até o momento.</a></li>
					<li><a href="{{ route('candidate.create') }}" class="text-gray-600 hover:text-gray-900">Cadastrar novo candidato.</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection