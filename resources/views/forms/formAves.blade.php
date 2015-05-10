{!!Form::open(['url' => '/tomas/crear/Aves' , 'files'=>true]) !!}

<div class="panel panel-primary">
	<div class="panel-heading">Específicos del Ave:</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4">
				{!!Form::label('id','Id:')!!}
				<input type="number" name="id" class="form-control" value="{{ old('id') }}" required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('especie','Especie:')!!}
				<input type="text" name="especie" class="form-control" value="{{ old('especie') }}"  required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('genero','Género:')!!}
				<input type="text" name="genero" class="form-control" value="{{ old('genero') }}" required>
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
						@if($epoca->id == old('epoca_id')) 
							<option selected value="{{$epoca->id}}">{{$epoca->nombre}}</option>
						@else
							<option value="{{$epoca->id}}">{{$epoca->nombre}}</option>
						@endif
					@endforeach 
				</select> 
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('sitio_id','Sitio:')!!} 
				<select name="sitio_id" class="form-control" required>
					<option selected disabled  value=''>Seleccione sitio</option>
					@foreach($sitios as $sitio)
						@if($sitio->id == old('sitio_id') )
							<option selected value="{{$sitio->id}}" >{{$sitio->name}}</option>
						@else
							<option value="{{$sitio->id}}" >{{$sitio->name}}</option>
						@endif 
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
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('red'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('oj','Oj:')!!}
				<select name="oj" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('oj'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('cao','Cao:')!!}
				<select name="cao" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('cao'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('q','Q:')!!}
				<select name="q" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('q'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('ab','Ab:')!!}
				<select name="ab" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('ab'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('cl','Cl:')!!}
				<select name="cl" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
						@if($i == old('cl'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('pa','PA:')!!}
				<select name="pa" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 0; $i<= 3 ; $i++)
						@if($i == old('pa') && old('pa') != "")
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('al','Al:')!!}
				<select name="al" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 0; $i<= 3 ; $i++)
						@if($i == old('al') && old('al') != "")
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
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
				<input type="text" class="form-control" name="peso" placeholder="g" value="{{old('peso')}}">
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('ala','Ala:')!!}
				<input type="text" class="form-control" name="ala" placeholder="cm" value="{{old('ala')}}">
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('plumaje','Plumaje:')!!}
				<select name="plumaje" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 0; $i<= 3 ; $i++)
						@if($i == old('plumaje'))
							<option selected value="{{$i}}" >{{$i}}</option>
						@else
							<option value="{{$i}}" >{{$i}}</option>
						@endif 
					@endfor
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('edad','Edad:')!!}
				<select name="edad" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('edad') == "I")
						<option selected value="I" >Inmaduro</option>
					@else
						<option value="I" >Inmaduro</option>
					@endif

					@if(old('edad') == "NV")
						<option selected value="NV" >No Volador</option>
					@else
						<option  value="NV" >No Volador</option>
					@endif

					@if(old('edad') == "J")
						<option selected value="J" >Joven</option>
					@else
						<option value="J" >Joven</option>
					@endif

					@if(old('edad') == "A")
						<option selected value="A" >Adulto</option>
					@else
						<option value="A" >Adulto</option>
					@endif
					
				</select>
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('sexo','Sexo:')!!}
				<select name="sexo" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('sexo') == "H")
						<option selected value="H" >H</option>
					@else
						<option value="H" >H</option>
					@endif

					@if(old('sexo') == "M")
						<option selected value="M" >M</option>
					@else
						<option value="M" >M</option>
					@endif
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('anillo','Anillo:')!!}
				<input type="text" class="form-control" name="anillo" required value="{{old('anillo')}}">
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('muestra_endoparasito','Muestra Endoparásito:')!!}
				<select name="muestra_endoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('muestra_endoparasito') == "0")
						<option selected value="0" >No</option>
					@else
						<option value="0" >No</option>
					@endif

					@if(old('muestra_endoparasito') == "1")
						<option selected value="1" >Sí</option>
					@else
						<option value="1" >Sí</option>
					@endif
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('muestra_ectoparasito','Muestra Ectoparásito:')!!}
				<select name="muestra_ectoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('muestra_ectoparasito') == "0")
						<option selected value="0" >No</option>
					@else
						<option value="0" >No</option>
					@endif

					@if(old('muestra_ectoparasito') == "1")
						<option selected value="1" >Sí</option>
					@else
						<option value="1" >Sí</option>
					@endif
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
				<textarea class="form-control" rows="5" name="observaciones"> {{old('observaciones')}} </textarea> 
			</div>
		</div>
	</div>
</div>
<!-- Fin panel5 -->

<div class="panel panel-primary">
	<div class="panel-heading">Imágen: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4 ">
				<input type="file" accept="image/*" capture="camera" name="img">
			<br>
			</div>
			<div class="col-lg-8">
				<input type="text" class="form-control" name="imgNombre" placeholder="Nombre de la imagen" />
			<br>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel6 -->


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
	@if(old('fecha') == null)
		$("#datepicker").datepicker('setDate', new Date());
	@else
		$("#datepicker").val({{old('fecha')}});
		//$("#datepicker").datepicker('setDate', {{old('fecha')}});
	@endif
	
});
</script>


<br><br><br><br><br>