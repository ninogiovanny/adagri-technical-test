<div class="col-12 form-group mb-2">
	{{ html()->label('Título', 'title')->class(['block w-full text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->text('title')->id('title')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Insira um título para a vaga') }}
</div>

<div class="col-12 form-group mb-2">
	{{ html()->label('Tipo da vaga', 'type')->class(['block w-100 text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->select('type', $jobType, null)->id('type')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Selecionar tipo da vaga') }}
</div>

<div class="col-12 form-group mb-2">
	{{ html()->label('Descrição', 'description')->class(['block w-full text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->textarea('description')->rows('5')->id('description')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Informe, se desejar, uma breve descrição para a vaga') }}
</div>