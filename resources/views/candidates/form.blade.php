<div class="col-12 form-group mb-2">
	{{ html()->label('Nome', 'name')->class(['block w-full text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->text('name')->id('name')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Insira o nome do candidato') }}
</div>

<div class="col-12 form-group mb-2">
	{{ html()->label('Email', 'email')->class(['block w-full text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->text('email')->id('email')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Insira o email do candidato') }}
</div>

<div class="col-12 form-group mb-3">
	{{ html()->label('Telefone', 'phone')->class(['block w-full text-gray-700 text-sm font-bold mb-2']) }}
	{{ html()->text('phone')->id('phone')->class(['shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])->placeholder('Insira o telefone do candidato') }}
</div>