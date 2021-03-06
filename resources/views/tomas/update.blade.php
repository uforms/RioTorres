@extends('app')

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row custom-header">
	<div class="container">
	<div class="col-lg-12">
		<h1 class="h1-custom">Actualizando toma # {{$id}} de {{$type}}
			<small></small>
		</h1>
	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	<div class="container">
		<ol class="breadcrumb breadcrumb-custom">
			<li><a href="/">Actividades</a></li>
			<li ><a href="/tomas/{{$type}}">{{$type}} </a></li>
			<li class="active">Editar</li>
		</ol>
	</div>
	</div>
</div>
<!-- /.row -->
<div class="container">
@if(Session::get('errors') != null)
	<div class="alert alert-danger" role="alert">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<span aria-hidden="true">Ocurrieron los siguientes errores: </span>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

@include('forms.formEditar'.$type)
</div>



<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };

 $.datepicker.setDefaults($.datepicker.regional['es']);


$(function () {
	$(".datepicker").datepicker();
	/*
	@if(old('fecha') == null)
		$(".datepicker").datepicker('setDate', new Date());
	@else
		$(".datepicker").val("{{old('fecha')}}");
		//$("#datepicker").datepicker('setDate', {{old('fecha')}});
	@endif
	*/
});

</script>

@stop




