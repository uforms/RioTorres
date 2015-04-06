@extends('app')

@section('content')

<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-10">
		<h1 class="h1-custom">Tomas de {{$type}}
			<small>lista</small>
		</h1>
	</div>
	<div class="col-lg-2">
		<a href="crear/{{$type}}" class="btn btn-primary btn-block">Realizar Toma</a>
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

@include('listas.lista'.$type)

@stop