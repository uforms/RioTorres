{!!Form::open(['url' => '/tomas/crear/Aguas' , 'files'=>true]) !!}

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseInfoBasica" aria-expanded="false" aria-controls="collapseInfoBasica"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Información Básica:</div>

	<div class="panel-body collapse" id="collapseInfoBasica">

		<h4>Tiempo y espacio:</h4>
		<div class="row">

			<div class="col-lg-2">
				<label for="hora_inicial"><a class="btn btn-success btn-xs" id="getHoraInicial"><i class='glyphicon glyphicon-repeat'></i></a>&nbsp &nbsp Hora Inicial </label>
				<input type="text" name="hora_inicial" class="form-control" id="horaInicial" required value="{{old('hora_inicial')}}">
				<br>
			</div>

			<div class="col-lg-2">
				<label for="hora_final"><a class="btn btn-success btn-xs" id="getHoraFinal"><i class='glyphicon glyphicon-repeat'></i></a>&nbsp &nbsp Hora Final:</label>
				<input type="text" name="hora_final" class="form-control" id="horaFinal"  required value="{{ old('hora_final') }}">
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('fecha','Fecha:')!!}
				<input type="text" name="fecha" id="datepicker" class="form-control datepicker" value="{{old('fecha')}}" required>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('sitio_id','Sitio:')!!}
				<select name="sitio_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($sitios as $sitio)
					@if($sitio->id == old('sitio_id')) 
					<option selected value="{{$sitio->id}}" >{{$sitio->name}}</option>
					@else
					<option value="{{$sitio->id}}" >{{$sitio->name}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>
		</div>
		<!-- fin row -->

		<hr>
		<h4><a  class="btn btn-success btn-xs" onclick="getLocation()"><i class="glyphicon glyphicon-repeat"></i></a>&nbsp &nbsp  Geolocalización </h4>
		<div class="row">
			
			<div class="col-lg-2">
				<label for="lat">Latitud:</label>
				<input name="lat" class="form-control" id="lat"  />
			</div>

			<div class="col-lg-2">
				<label for="lng">Longitud:</label>
				<input name="lng" class="form-control" id="lng"  />
			</div>		

		</div>
		<!-- Fin row -->

		<hr>
		<h4>Condiciones climáticas:</h4>
		<div class="row">


			<div class="col-lg-2">
				{!!Form::label('temperatura','Temperatura (°C):')!!}
				<input type="number" step="0.01"  name="temperatura" class="form-control" required value="{{old('temperatura')}}" >
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('viento','Viento (m/s):')!!}
				<input type="number" step="0.01" min="0" name="viento" class="form-control" required value="{{old('viento')}}" >
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('humedad','Humedad (%):')!!}
				<input type="number" step="0.01" min="0" name="humedad" class="form-control" required value="{{old('humedad')}}" >
				<br>
			</div>

		</div>
	</div>
</div>
<!-- fin panel 1 -->


<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseGeneralidades" aria-expanded="false" aria-controls="collapseGeneralidades"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Generalidades:</div>

	<div class="panel-body collapse" id="collapseGeneralidades">
		<div class="row">

			<div class="col-lg-2">
				{!!Form::label('clima_id','Clima:')!!}
				<select name="clima_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($climas as $clima)
					@if($clima->id == old('clima_id')) 
					<option selected="" value="{{$clima->id}}" >{{$clima->nombre}}</option>
					@else
					<option value="{{$clima->id}}" >{{$clima->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('curso_id','Curso:')!!}
				<select name="curso_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($cursos as $curso)
					@if($curso->id == old('curso_id')) 
					<option selected="" value="{{$curso->id}}" >{{$curso->nombre}}</option>
					@else
					<option value="{{$curso->id}}" >{{$curso->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('parametro_nivel_id','Nivel agua en función de:')!!}
				<select name="parametro_nivel_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($parametrosNivel as $parametroNivel)
					@if($parametroNivel->id == old('parametro_nivel_id')) 
					<option selected="" value="{{$parametroNivel->id}}" >{{$parametroNivel->nombre}}</option>
					@else
					<option value="{{$parametroNivel->id}}" >{{$parametroNivel->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>
			

			<div class="col-lg-2">
				{!!Form::label('mo_id','Mos:')!!}
				<select name="mo_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($mos as $mo)
					@if($mo->id == old('mo_id')) 
					<option selected="" value="{{$mo->id}}">{{$mo->nombre}}</option>
					@else
					<option value="{{$mo->id}}">{{$mo->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('trabajo_ingenieril_id','Trabajos Ingenieriles:')!!}
				<select name="trabajo_ingenieril_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($trabajosIngenieriles as $trabajoIngenieril)
					@if($trabajoIngenieril->id == old('trabajo_ingenieril_id')) 
					<option selected="" value="{{$trabajoIngenieril->id}}">{{$trabajoIngenieril->nombre}}</option>
					@else
					<option value="{{$trabajoIngenieril->id}}">{{$trabajoIngenieril->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>
		</div>
		<!-- End Row -->

		<hr>
		<h4>Estructura del Banco:</h4>
		<div class="row">
			<div class="col-lg-2">
				{!!Form::label('estructura_banco_id','Tipo:')!!}
				<select name="estructura_banco_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($estructurasBanco as $estructuraBanco)
					@if($estructuraBanco->id == old('estructura_banco_id')) 
					<option selected="" value="{{$estructuraBanco->id}}">{{$estructuraBanco->nombre}}</option>
					@else
					<option value="{{$estructuraBanco->id}}">{{$estructuraBanco->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-8">
				{!! Form::label('observacion_estructura_banco','Observaciones:') !!}
				<textarea class="form-control" rows="5" name="observacion_estructura_banco">{{old('observacion_estructura_banco')}}</textarea>
			</div>


		</div>
		<!-- End Row -->

		<hr>
		<h4>Valores del cauce</h4>
		<div class="row">
			@foreach($tiposCauces as $tipoCauce)
			<div class="col-lg-2">
				{!!Form::label("cauce".$tipoCauce->id,$tipoCauce->nombre)!!}
				<input type="number" step="0.01" min="0" name="cauce{{$tipoCauce->id}}" class="form-control" value="{{ old('cauce'.$tipoCauce->id) }}" required>
				<br>
			</div>
			@endforeach
		</div>

		<!-- End Row -->
		<hr>
		<h4>Composición del sustrato (%):</h4>
		<div class="row">
			@foreach($tiposSustratos as $tipoSustrato)
			<div class="col-lg-2">
				{!!Form::label('composicionSustrato'.$tipoSustrato->id,$tipoSustrato->nombre)!!}
				<input type="number" step="0.01" min="0" name="composicionSustrato{{$tipoSustrato->id}}" class="form-control" value="{{old('composicionSustrato'.$tipoSustrato->id)}}" required>
				<br>
			</div>
			@endforeach
		</div>

		<!-- End Row -->
		<hr>
		<h4>Condición del sustrato (%):</h4>
		<div class="row">
			@foreach($tiposCondicionesSustratos as $tipoCondicionSustrato)
			<div class="col-lg-2">
				{!!Form::label('condicionSustrato'.$tipoCondicionSustrato->id,$tipoCondicionSustrato->nombre)!!}
				<input type="number" step="0.01" min="0" name="condicionSustrato{{$tipoCondicionSustrato->id}}" class="form-control" value="{{old('condicionSustrato'.$tipoCondicionSustrato->id)}}" required>
				<br>
			</div>
			@endforeach
		</div>

	</div>
	<!-- Fin panel body -->
</div>
<!-- Fin panel 2 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseVegetacion" aria-expanded="false" aria-controls="collapseVegetacion"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Vegetación:</div>

	<div class="panel-body collapse" id="collapseVegetacion">
		<div class="row">
			<div class="col-lg-3">
				{!!Form::label('porcentaje_vegetacion_banco','Vegetación en el banco (%): ')!!}
				<input type="number" step="0.01" min="0" name="porcentaje_vegetacion_banco" class="form-control" value="{{old('porcentaje_vegetacion_banco')}}" required>
				<br>
			</div>
		</div>

		<hr>
		<h4>Exposición del Cauce (%):</h4>
		<div class="row">
			@foreach($tiposExposicionCauce as $tipoExposicionCauce)
			<div class="col-lg-2">
				{!!Form::label('tipoExposicionCauce'.$tipoExposicionCauce->id,$tipoExposicionCauce->nombre)!!}
				<input type="number" step="0.01" min="0" name="tipoExposicionCauce{{$tipoExposicionCauce->id}}" class="form-control" value="{{old('tipoExposicionCauce'.$tipoExposicionCauce->id)}}" required>
				<br>
			</div>
			@endforeach
		</div>

		<hr>
		<h4>Tipo en la Ribera (%):</h4>
		<div class="row">
			@foreach($tiposRiberas as $tipoRibera)
			<div class="col-lg-2">
				{!!Form::label('tipoRibera'.$tipoRibera->id,$tipoRibera->nombre)!!}
				<input type="number" step="0.01" min="0" name="tipoRibera{{$tipoRibera->id}}" class="form-control" value="{{old('tipoRibera'.$tipoRibera->id)}}" required>
				<br>
			</div>
			@endforeach
		</div>

		<hr>
		<h4>Ambientes Asociados (%):</h4>
		<div class="row">
			@foreach($tiposAmbientesAsociados as $tipoAmbienteAsociado)
			<div class="col-lg-2">
				{!!Form::label('tipoAmbienteAsociado'.$tipoAmbienteAsociado->id,$tipoAmbienteAsociado->nombre)!!}
				<input type="number" step="0.01" min="0" name="tipoAmbienteAsociado{{$tipoAmbienteAsociado->id}}" class="form-control" value="{{old('tipoAmbienteAsociado'.$tipoAmbienteAsociado->id)}}" required>
				<br>
			</div>
			@endforeach
		</div>
		
	</div>
	<!-- Fin panel body -->
</div>
<!-- Fin Panel 3 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseCaracterizacionVisual" aria-expanded="false" aria-controls="collapseCaracterizacionVisual"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Caracterización Visual:</div>

	<div class="panel-body collapse" id="collapseCaracterizacionVisual">
		
		<div class="row">
			
			<div class="col-lg-2">
				{!!Form::label('presencia_rs_id','Presencia RS:')!!}
				<select name="presencia_rs_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($presenciasRs as $presenciaRs)
					@if($presenciaRs->id == old('presencia_rs_id')) 
					<option selected="" value="{{$presenciaRs->id}}" >{{$presenciaRs->nombre}}</option>
					@else
					<option value="{{$presenciaRs->id}}" >{{$presenciaRs->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('cont_puntual_id','Contaminación Puntual:')!!}
				<select name="cont_puntual_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($contPuntuales as $contPuntual)
					@if($contPuntual->id == old('cont_puntual_id')) 
					<option selected="" value="{{$contPuntual->id}}" >{{$contPuntual->nombre}}</option>
					@else
					<option value="{{$contPuntual->id}}" >{{$contPuntual->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('color_agua_id','Color del agua:')!!}
				<select name="color_agua_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($coloresAgua as $colorAgua)
					@if($colorAgua->id == old('color_agua_id')) 
					<option selected="" value="{{$colorAgua->id}}" >{{$colorAgua->nombre}}</option>
					@else
					<option value="{{$colorAgua->id}}" >{{$colorAgua->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('olor_agua_id','Olor del agua:')!!}
				<select name="olor_agua_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($oloresAgua as $olorAgua)
					@if($olorAgua->id == old('olor_agua_id')) 
					<option selected="" value="{{$olorAgua->id}}" >{{$olorAgua->nombre}}</option>
					@else
					<option value="{{$olorAgua->id}}" >{{$olorAgua->nombre}}</option>
					@endif
					@endforeach
				</select>
				<br>
			</div>

		</div>
		
	</div>
	<!-- Fin panel body -->
</div>
<!-- Fin Panel 3 -->


<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseDensiometro" aria-expanded="false" aria-controls="collapseDensiometro"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Densiómetro:</div>

	<div class="panel-body collapse" id="collapseDensiometro">

		<div class="row">
			<div class="col-lg-2">
				<label for="factor_cobertura">Factor de Cobertura:</label>
				<input class="form-control" name="factor_cobertura" value="1.04" />
				<br>
			</div>

			<div class="col-lg-2">
				<label for="norte">Norte:</label>
				<input class="form-control" name="norte" value="{{old('norte')}}" />
				<br>
			</div>

			<div class="col-lg-2">
				<label for="sur">Sur:</label>
				<input class="form-control" name="sur" value="{{old('sur')}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="este">Este:</label>
				<input class="form-control" name="este" value="{{old('este')}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="oeste">Oeste:</label>
				<input class="form-control" name="oeste" value="{{old('oeste')}}"/>
				<br>
			</div>
		</div>

	</div>
	<!-- Fin body -->
</div>
<!-- fin panel 4 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseFisicoQuimico" aria-expanded="false" aria-controls="collapseFisicoQuimico"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Físico - Químicos:</div>

	<div class="panel-body collapse" id="collapseFisicoQuimico">


		@for($i = 1 ; $i<=3 ; $i++)
		<h4>Toma #{{$i}}:</h4>
		<div class="row">
			<div class="col-lg-2">
				<label for="oxigeno_miligramos_litro{{$i}}">O2 (mg/L):</label>
				<input type="number" step="0.01" min="0" class="form-control" name="oxigeno_miligramos_litro{{$i}}" value="{{old('oxigeno_miligramos_litro'.$i)}}" />
				<br>
			</div>

			<div class="col-lg-1">
				<label for="oxigeno_porcentaje{{$i}}">O2 (%):</label>
				<input type="number" step="0.01" min="0"  class="form-control" name="oxigeno_porcentaje{{$i}}" value="{{old('oxigeno_porcentaje'.$i)}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="temperatura{{$i}}">T (°C):</label>
				<input type="number" step="0.01"   class="form-control" name="temperatura{{$i}}" value="{{old('temperatura'.$i)}}"/>
				<br>
			</div>

			<div class="col-lg-1">
				<label for="ph{{$i}}">pH:</label>
				<input type="number" step="0.01" min="0" class="form-control" name="ph{{$i}}" value="{{old('ph'.$i)}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="conductividad{{$i}}">Conduct. (uS/cm):</label>
				<input type="number" step="0.01" min="0" class="form-control" name="conductividad{{$i}}" value="{{old('conductividad'.$i)}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="sst{{$i}}">SST (mg/L):</label>
				<input type="number" step="0.01" min="0" class="form-control" name="sst{{$i}}" value="{{old('sst'.$i)}}"/>
				<br>
			</div>

			<div class="col-lg-2">
				<label for="salinidad{{$i}}">Salinidad (ppm):</label>
				<input type="number" step="0.01" min="0"  class="form-control" name="salinidad{{$i}}" value="{{old('salinidad'.$i)}}"/>
				<br>
			</div>

		</div>
		<!-- fin row -->
		<hr>
		@endfor

	</div>
	<!-- Fin body -->
</div>
<!-- fin panel 4 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseObservaciones" aria-expanded="false" aria-controls="collapseObservaciones"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Observaciones:</div>

	<div class="panel-body collapse" id="collapseObservaciones">

		<div class="row">
			<div class="col-lg-4">
				<label for="coliformes">¿Presencia de coliformes?</label>&nbsp &nbsp 
				Sí 
				@if(old('coliformes') == "Si")
				<input type="radio" name="coliformes" value="Si"  checked/>
				No <input type="radio" name="coliformes" value="No" />
				@else
				<input type="radio" name="coliformes" value="Si"  />
				No <input type="radio" name="coliformes" value="No" checked/>
				@endif
				
				
			</div>

			<div class="col-lg-8">
				<label for="observaciones"><strong>Observaciones:</strong></label>
				<textarea name="observaciones" class="form-control" rows="5">{{old('observaciones')}}</textarea>
			</div>
		</div>

	</div>
	<!-- fin body -->
</div>
<!-- fin panel 5 -->



<!-- Submit button -->
<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Guardar Toma' , ['class' => 'btn btn-success form-control' , 'data-dismiss' => 'modal']) !!}
	</div>
</div>


{!!Form::close()!!}

<br><br><br><br><br><br><br>

<script>
	$(document).ready(function(){
		getLocation();
	});

</script>

<script>
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			alert("La Geolocalización no es soportada en este buscador.");
		}
	}

	function showPosition(position) {
		$('#lat').val(position.coords.latitude);
		$('#lng').val(position.coords.longitude);
	}
</script>

<script>
	$('#getHoraInicial').click(function(){
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$('#horaInicial').val(time);
	});
	$('#getHoraFinal').click(function(){
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$('#horaFinal').val(time);
	});
</script>