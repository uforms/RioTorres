{!!Form::open() !!}

<div class="panel panel-primary">
	<div class="panel-heading">Específicos del Ave:</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4">
				{!!Form::label('id','Id:')!!}
				<input type="text" name="id" class="form-control" required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('especie','Especie:')!!}
				<input type="text" name="especie" class="form-control" required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('genero','Género:')!!}
				<input type="text" name="genero" class="form-control" required>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel1 -->

<div class="panel panel-primary">
	<div class="panel-heading">Específicos de la toma:</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4">
				{!!Form::label('fecha','Fecha:')!!}
				<input type="text" name="fecha" id="datepicker" class="form-control" required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('epoca_id','Época:')!!}
				<select name="epoca_id" class="form-control" required>
					<option selected disabled  value=''>Seleccione época</option>
					@foreach($epocas as $epoca) 
						<option value="{{$epoca->id}}" >{{$epoca->nombre}}</option>
					@endforeach 
				</select> 
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('sitio_id','Sitio:')!!}
				<select name="sitio_id" class="form-control" required>
					<option selected disabled  value=''>Seleccione sitio</option>
					@foreach($sitios as $sitio) 
						<option value="{{$sitio->id}}" >{{$sitio->name}}</option>
					@endforeach 
				</select> 
				<br>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel2 -->

<div class="panel panel-primary">
	<div class="panel-heading">Examen General:</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-1 col-lg-offset-2">
				{!!Form::label('red','Red:')!!}
				<select name="red" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
					<option value="6" >6</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('oj','Oj:')!!}
				<select name="oj" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('cao','Cao:')!!}
				<select name="cao" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('q','Q:')!!}
				<select name="q" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('ab','Ab:')!!}
				<select name="ab" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('ca','Cl:')!!}
				<select name="cl" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('pa','PA:')!!}
				<select name="pa" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('al','Al:')!!}
				<select name="al" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

		</div>
	</div>
</div>
<!-- Fin panel3 -->

<div class="panel panel-primary">
	<div class="panel-heading">Medidas Biométricas:</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-1">
				{!!Form::label('peso','Peso:')!!}
				<input type="text" class="form-control" name="peso" placeholder="g">
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('ala','Ala:')!!}
				<select name="ala" class="form-control" required>
					<option selected disabled  value=''>cm</option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('plumaje','Plumaje:')!!}
				<select name="plumaje" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('edad','Edad:')!!}
				<select name="edad" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="I" >Inmaduro</option>
					<option value="NV" >No Volador</option>
					<option value="J" >Joven</option>
					<option value="A" >Adulto</option>
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('sexo','Sexo:')!!}
				<select name="sexo" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="H" >H</option>
					<option value="M" >M</option>
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('anillo','Anillo:')!!}
				<input type="text" class="form-control" name="anillo">
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('muestra_endoparasito','Muestra Endoparásito:')!!}
				<select name="muestra_endoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >No</option>
					<option value="1" >Sí</option>
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('muestra_ectoparasito','Muestra Ectoparásito:')!!}
				<select name="muestra_ectoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					<option value="0" >No</option>
					<option value="1" >Sí</option>
				</select>
				<br>
			</div>

		</div>
	</div>
</div>
<!-- Fin panel4 -->

<div class="panel panel-primary">
	<div class="panel-heading">Observaciones: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12 ">
				<textarea class="form-control" rows="5" name="observaciones"> </textarea> 
			</div>
		</div>
	</div>
</div>
<!-- Fin panel5 -->



<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Guardar Toma' , ['class' => 'btn btn-success form-control']) !!}
	</div>
</div>

{!!Form::close()!!}



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
	$("#datepicker").datepicker();
	$("#datepicker").datepicker('setDate', new Date());
});
</script>


<br><br><br><br><br>