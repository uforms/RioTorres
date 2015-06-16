
{!! Form::open(array('url' => '/reporteAves')) !!}

	<h3>Reporte de Aves</h3>
	<strong>Seleccione la información que desea en su reporte:</strong><br><br>


	<div class="row">
		<div class="col-lg-11 col-lg-offset-1">

		<input type="hidden" name="generalidades" value=1 > 
		<i class="glyphicon glyphicon-ok"></i> &nbsp<label for="generalidades">Generalidades</label><br>

			{!! Form::checkbox('medidasBiometricas', true, true)!!}&nbsp<label for="medidasBiometricas">Medidas Biométricas</label><br>

			{!! Form::checkbox('examenGeneral', true, true)!!}&nbsp<label for="examenGeneral">Exámen General</label><br>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-6">
			Seleccione el formato deseado:<br>

			<input type="radio" name="format" required value="xlsx" />&nbsp<label for="format">Excel</label>&nbsp&nbsp&nbsp

			{!! Form::radio('format', 'csv')!!}&nbsp<label for="format">CSV</label><br>

		</div>
	</div>

	<br>

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<button type="submit" class="btn btn-primary btn-block" style="float:right;">Generar</button>
		</div>
	</div>
    
{!! Form::close() !!}
