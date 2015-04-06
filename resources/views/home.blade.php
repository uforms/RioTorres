@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">Seleccione Actividad:</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<a href="/tomas/Aguas" class="btn btn-default btn-block">Aguas</a>
							<br>
						</div>
						<div class="col-lg-4">
							<a href="/tomas/Aves" class="btn btn-default btn-block">Aves</a>
							<br>
						</div>
						<div class="col-lg-4">
							<a href="/tomas/Suelos" class="btn btn-default btn-block">Suelos</a>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
