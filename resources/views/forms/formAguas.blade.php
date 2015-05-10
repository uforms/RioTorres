{!!Form::open(['url' => '/tomas/crear/Aguas' , 'files'=>true]) !!}

<div class="panel panel-primary">
	<div class="panel-heading">Generalidades del Ave:</div>

	<div class="panel-body">
		<div class="row">

			<div class="col-lg-2">
				{!!Form::label('clima_id','Clima:')!!}
				<select name="clima_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($climas as $clima)
						<option value="{{$clima->id}}" >{{$clima->nombre}}</option>
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('curso_id','Curso:')!!}
				<select name="curso_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($cursos as $curso)
						<option value="{{$curso->id}}" >{{$curso->nombre}}</option>
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('parametro_nivel_id','Nivel agua en función de:')!!}
				<select name="parametro_nivel_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($parametrosNivel as $parametroNivel)
						<option value="{{$parametroNivel->id}}" >{{$parametroNivel->nombre}}</option>
					@endforeach
				</select>
				<br>
			</div>
			

			<div class="col-lg-2">
				{!!Form::label('mo_id','Mos:')!!}
				<select name="mo_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($mos as $mo)
						<option value="{{$mo->id}}">{{$mo->nombre}}</option>
					@endforeach
				</select>
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('trabajo_ingenieril_id','Trabajos Ingenieriles:')!!}
				<select name="trabajo_ingenieril_id" class="form-control" required>
					<option selected disabled  value=''></option>
					@foreach($trabajosIngenieriles as $trabajoIngenieril)
						<option value="{{$trabajoIngenieril->id}}">{{$trabajoIngenieril->nombre}}</option>
					@endforeach
				</select>
				<br>
			</div>
		</div>
			<!-- End Row -->
		<hr>
		<h4>Valores del cauce</h4>
		<div class="row">
			@foreach($tiposCauces as $tipoCauce)
				<div class="col-lg-2">
					{!!Form::label("cauce".$tipoCauce->id,$tipoCauce->nombre)!!}
					<input type="number" step="0.01" name="cauce{{$tipoCauce->id}}" class="form-control" value="" required>
				</div>
			@endforeach
		</div>

			<!-- End Row -->
		<hr>
		<h4>Composición del sustrato(%):</h4>
		<div class="row">
			@foreach($tiposSustratos as $tipoSustrato)
				<div class="col-lg-2">
					{!!Form::label('composicionSustrato'.$tipoSustrato->id,$tipoSustrato->nombre)!!}
					<input type="number" step="0.01" name="composicionSustrato{{$tipoSustrato->id}}" class="form-control" value="" required>
				</div>
			@endforeach
		</div>

		<!-- End Row -->
		<hr>
		<h4>Condición del sustrato(%):</h4>
		<div class="row">
			@foreach($tiposCondicionesSustratos as $tipoCondicionSustrato)
				<div class="col-lg-2">
					{!!Form::label('condicionSustrato'.$tipoCondicionSustrato->id,$tipoCondicionSustrato->nombre)!!}
					<input type="number" step="0.01" name="condicionSustrato{{$tipoCondicionSustrato->id}}" class="form-control" value="" required>
				</div>
			@endforeach
		</div>


	</div>
</div>
<!-- Fin panel1 -->

<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Guardar Toma' , ['class' => 'btn btn-success form-control']) !!}
	</div>
</div>


{!!Form::close()!!}