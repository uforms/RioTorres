@extends('app')

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-8">
		<h1 class="h1-custom">Tomas de {{$type}}
			<small>lista</small>
		</h1>
	</div>
	<div class="col-lg-2">
		<a href="/tomas/crear/{{$type}}" class="btn btn-primary btn-block">Realizar Toma</a>
		<br>
	</div>
	<div class="col-lg-2">
		<a href="crear/{{$type}}" class="btn btn-success btn-block">Ver Parámetros</a>
		<br>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="/">Actividades</a>
			</li>
			<li class="active">{{$type}}</li>
		</ol>
	</div>
</div>
<!-- /.row -->

@if(Session::get('successMessage') != null)
	<div class="alert alert-success" role="alert">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		{{Session::get('successMessage')}}
	</div>
@endif


@include('listas.lista'.$type)

@stop