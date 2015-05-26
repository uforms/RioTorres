@extends('app')

@section('content')
<div class="row custom-header">
	<div class="container">
		<div class="col-lg-8">
			<h1 class="h1-custom">Tomas de {{$type}} 
				<small>lista</small> 
			</h1>
		</div>
		<div class="col-lg-2">
			<a href="/tomas/crear/{{$type}}" class="btn btn-default btn-block btn-custom">Realizar Toma</a>
			<br>
		</div>
		<div class="col-lg-2">
		<a href="crear/{{$type}}" class="btn btn-default btn-block btn-custom">Ver Parámetros</a>
		</div>
	</div>
</div>


	<div class="row">
		<div class="col-lg-12">
			<div class="container">
				<ol class="breadcrumb breadcrumb-custom">
					<li><a href="/">Actividades</a>
					</li>
					<li class="active">{{$type}}</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.row -->

	<div class="container">
		@if(Session::get('successMessage') != null)
		<div class="alert alert-success" role="alert">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			{{Session::get('successMessage')}}
		</div>
		@endif

		
		@include('listas.lista'.$type)
	</div>
@stop

