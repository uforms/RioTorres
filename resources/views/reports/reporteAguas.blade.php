
{!! Form::open(array('url' => '/reporteAguas')) !!}

	<h3>Reporte de Aguas</h3>
	<strong>Seleccione la información que desea en su reporte:</strong><br><br>


	<div class="row">
		<div class="col-lg-11 col-lg-offset-1">

		<input type="hidden" name="infoBasica" value=1 > 
		<i class="glyphicon glyphicon-ok"></i> &nbsp<label for="infoBasica">Información Básica </label><br>

			{!! Form::checkbox('generalidades', true, true)!!}&nbsp<label for="generalidades">Generalidades </label><br>

			{!! Form::checkbox('vegetacion', true, true)!!}&nbsp<label for="vegetacion">Vegetación</label><br>

			{!! Form::checkbox('caracterizacionVisual', true, true)!!}&nbsp<label for="caracterizacionVisual">Caracterización Visual</label><br>

			{!! Form::checkbox('densiometro', true, true)!!}&nbsp<label for="densiometro">Densiómetro</label><br>

			{!! Form::checkbox('fisicoQuimicos', true, true)!!}&nbsp<label for="fisicoQuimicos">Físico Químicos</label><br>
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

