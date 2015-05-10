@extends('app')

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="h1-custom">Realizando toma de {{$type}}...
			<small></small>
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="/">Actividades</a></li>
			<li ><a href="/tomas/{{$type}}">{{$type}} </a></li>
			<li class="active">Crear</li>
		</ol>
	</div>
</div>
<!-- /.row -->

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

@include('forms.form'.$type)

@stop

	


