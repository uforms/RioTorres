@extends('app')

@section('content')
<div class="row custom-header">
	<div class="container">
		<div class="col-lg-8">
			<h2 class="h1-custom">Seleccione Actividad:
			</h2>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<br><br>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1">
			<a href="/tomas/Aguas" class=" img-rounded"><i class="glyphicon glyphicon-tint fa-5x"></i></a>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
			
			<a href="/tomas/Aves" class=""> <i class="fa fa-twitter fa-5x"></i> </a>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
			<a href="/tomas/Suelos" class=""><i class="fa fa-globe fa-5x"></i> </a>
		</div>
	</div>
</div>

@endsection
