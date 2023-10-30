@section('message_scripts')

<script type="text/javascript">

	@if($errors->any())

	@php $message = ''; @endphp

	@foreach($errors->all() as $error)
	@php $message .= $error; if(!$loop->last) $message .= '<br>'; @endphp
	@endforeach

	toastr.error("{!! $message !!}", "Corrija os seguintes problemas", { positionClass: "toast-top-right", "progressBar": true, "closeButton": true });

	@elseif(Session::has('info_message') || Session::has('success_message') || Session::has('warning_message') || Session::has('error_message'))

	@if(Session::has('info_message'))
	toastr.info("{!! Session::get('info_message')['description'] !!}", "{!! Session::get('info_message')['title'] !!}", { positionClass: "toast-top-right", "progressBar": true, "closeButton": true });
	@elseif(Session::has('success_message'))
	toastr.success("{!! Session::get('success_message')['description'] !!}", "{!! Session::get('success_message')['title'] !!}", { positionClass: "toast-top-right", "progressBar": true, "closeButton": true });
	@elseif(Session::has('warning_message'))
	toastr.warning("{!! Session::get('warning_message')['description'] !!}", "{!! Session::get('warning_message')['title'] !!}", { positionClass: "toast-top-right", "progressBar": true, "closeButton": true });
	@elseif(Session::has('error_message'))
	toastr.error("{!! Session::get('error_message')['description'] !!}", "{!! Session::get('error_message')['title'] !!}", { positionClass: "toast-top-right", "progressBar": true, "closeButton": true });
	@endif

	@endif

</script>

@endsection