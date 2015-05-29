{!!Form::open(['url' => '/tomas/crear/Aves' , 'files'=>true]) !!}

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseEspecificoAve" aria-expanded="false" aria-controls="collapseEspecificoAve"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Específicos del Ave:</div>

	<div class="panel-body collapse" id="collapseEspecificoAve">
		<div class="row">
			<div class="col-lg-2">
				{!!Form::label('migratoria','¿Ave migratoria?:')!!}<br> 
				Sí 
				@if(old('migratoria') == "Si")
				<input type="radio" id="btnMigraSi" name="migratoria" value="Si"  checked/>
				No <input type="radio" id="btnMigraNo" name="migratoria" value="No" />
				@else
				<input type="radio" id="btnMigraSi" name="migratoria" value="Si"  />
				No <input type="radio" id="btnMigraNo" name="migratoria" value="No" checked/>
				@endif
				<br> <br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('numero_anillo','Número de anillo:')!!}
				<input id="numero_anillo" type="number" class="form-control" name="numero_anillo" value="{{old('numero_anillo')}}" min="0">
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('especie','Especie:')!!}
				<input id="especie" type="text" name="especie" class="form-control" value="{{ old('especie') }}"  required>
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('genero','Género:')!!}
				<input id="genero" type="text" name="genero" class="form-control" value="{{ old('genero') }}" required>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel1 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseEspecificosToma" aria-expanded="false" aria-controls="collapseEspecificosToma"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Específicos de la toma:</div>

	<div class="panel-body collapse" id="collapseEspecificosToma">
		<div class="row">
			<div class="col-lg-4">
				{!!Form::label('fecha','Fecha:')!!}
				<input type="text" name="fecha" id="datepicker" class="form-control datepicker" required>
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
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseExamenGeneral" aria-expanded="false" aria-controls="collapseExamenGeneral"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Examen General:</div>

	<div class="panel-body collapse" id="collapseExamenGeneral">
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

<div class="panel panel-primary ">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseMedidaBiometrica" aria-expanded="false" aria-controls="collapseMedidaBiometrica"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Medidas Biométricas:</div>

	<div class="panel-body collapse" id="collapseMedidaBiometrica">
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
				{!!Form::label('muestra_endoparasito','Muestra Endoparásito:')!!}
				<select name="muestra_endoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('muestra_endoparasito') == "No")
						<option selected value="No" >No</option>
					@else
						<option value="No" >No</option>
					@endif

					@if(old('muestra_endoparasito') == "Si")
						<option selected value="Si" >Sí</option>
					@else
						<option value="Si" >Sí</option>
					@endif
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('muestra_ectoparasito','Muestra Ectoparásito:')!!}
				<select name="muestra_ectoparasito" class="form-control" required>
					<option selected disabled  value=''></option>
					@if(old('muestra_ectoparasito') == "No")
						<option selected value="No" >No</option>
					@else
						<option value="No" >No</option>
					@endif

					@if(old('muestra_ectoparasito') == "Si")
						<option selected value="Si" >Sí</option>
					@else
						<option value="Si" >Sí</option>
					@endif
				</select>
				<br>
			</div>

		</div>
	</div>
</div>
<!-- Fin panel4 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseObservaciones" aria-expanded="false" aria-controls="collapseObservaciones"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Observaciones: </div>

	<div class="panel-body collapse" id="collapseObservaciones">
		<div class="row">
			<div class="col-lg-12 ">
				<textarea class="form-control" rows="5" name="observaciones"> {{old('observaciones')}} </textarea> 
			</div>
		</div>
	</div>
</div>
<!-- Fin panel5 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseImagen" aria-expanded="false" aria-controls="collapseImagen"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Imágen: </div>

	<div class="panel-body " id="collapseImagen">
		<div class="row">
			<input type="hidden" value="1" name="cantidadImagenes" />
			<div class="col-lg-4 ">
				<input type="file" accept="image/*" capture="camera" name="img" >
			<br>
			</div>

			<div class="col-lg-8">
				<input type="text" class="form-control" name="imgNombre" placeholder="Nombre de la imagen" />
			<br>
			</div>

		</div>

		
		<div class="row">
			<div class="col-lg-2"><a class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></a></div>
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






<br><br><br><br><br>
<script>
$('#numero_anillo').blur(function () {
	var numeroAnillo = $('#numero_anillo').val();
    $.ajax({
		type:'GET',
		url: '/remuestreo/'+ numeroAnillo,
		success: function(data){
			console.log(data[0]);
			if(data[0]!=null)
			{
				$('#especie').val(data[0].especie);
				$("#especie").prop('disabled', true);
				$('#genero').val(data[0].genero);
				$("#genero").prop('disabled', true);
			}else{
				$('#especie').val("");
				$("#especie").prop('disabled', false);
				$('#genero').val("");
				$("#genero").prop('disabled', false);
			}
		}
	});
});
</script>

<script>
	$('#btnMigraSi').click(function(){
		$('#numero_anillo').val("");
		$("#numero_anillo").prop('disabled', true);
		$("#especie").prop('disabled', false);
		$("#genero").prop('disabled', false);
	});
	$('#btnMigraNo').click(function(){
		$('#numero_anillo').val("");
		$("#numero_anillo").prop('disabled', false);
	});
</script>