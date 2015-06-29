{!!Form::open(['url' => '/tomas/editar/Aves' , 'files'=>true]) !!}

<input type="hidden" name="tomaId" value="{{$tomaAve->id}}">
<input type="hidden" name="ave_id" id="ave_id" value="{{$ave->id}}">

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseEspecificoAve" aria-expanded="false" aria-controls="collapseEspecificoAve"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Específicos del Ave:</div>

	<div class="panel-body" id="collapseEspecificoAve">
		<div class="row">
			<div class="col-lg-4">
				<strong>Id Ave: </strong> <span id="idAve">{{$ave->id}} </span> <br>
				@if($ave->migratoria == "Si")
				<strong>Ave migratoria</strong> <br>
				@else
				<strong>Anillo #: </strong><span id="anilloAve">{{$ave->numero_anillo}}</span> <br>
				@endif
				<strong>Especie: </strong> <span id="especieAve">{{$ave->especie}}</span> <br>
				<strong>Género: </strong> <span id="generoAve">{{$ave->genero}}</span> <br>

				<br>
			</div>

			<div id="nuevaAve"></div>

			<div class="col-lg-2">
				<input type="button" class="btn btn-block btn-success" value="Cambiar ave" data-toggle="modal" data-target="#cambiarAve">
			</div>
		</div>
	</div>
</div>
<!-- Fin panel1 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseEspecificosToma" aria-expanded="false" aria-controls="collapseEspecificosToma"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Específicos de la toma:</div>

	<div class="panel-body " id="collapseEspecificosToma">
		<div class="row">
			<div class="col-lg-4">
				{!!Form::label('fecha','Fecha:')!!}
				<input type="text" name="fecha" id="datepicker" class="form-control datepicker" required value="{{$tomaAve->fecha}}">
				<br>
			</div>

			<div class="col-lg-4">
				{!!Form::label('epoca_id','Época:')!!}
				<select name="epoca_id" class="form-control" required>
					<option selected disabled  value=''>Seleccione época</option>
					@foreach($epocas as $epoca)
					@if($epoca->id == $tomaAve->epoca_id) 
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
					@if($sitio->id == $tomaAve->sitio_id )
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

	<div class="panel-body " id="collapseExamenGeneral">
		<div class="row">
			<div class="col-lg-1 col-lg-offset-2">
				{!!Form::label('red','Red:')!!}
				<select name="red" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 1; $i<= 10 ; $i++)
					@if($i == $examenGeneral->red)
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
					@if($i == $examenGeneral->oj)
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
					@if($i == $examenGeneral->cao)
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
					@if($i == $examenGeneral->q)
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
					@if($i == $examenGeneral->ab)
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
					@if($i == $examenGeneral->cl)
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
					@if($i == $examenGeneral->pa )
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
					@if($i == $examenGeneral->al)
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

	<div class="panel-body " id="collapseMedidaBiometrica">
		<div class="row">
			<div class="col-lg-2">
				{!!Form::label('peso','Peso:')!!}
				<input type="number" step="0.01" min="0" class="form-control" name="peso" placeholder="g" value="{{$medidasBiometricas->peso}}">
				<br>
			</div>

			<div class="col-lg-2">
				{!!Form::label('ala','Ala:')!!}
				<input type="number" step="0.01" min="0" class="form-control" name="ala" placeholder="cm" value="{{$medidasBiometricas->ala}}">
				<br>
			</div>

			<div class="col-lg-1">
				{!!Form::label('plumaje','Plumaje:')!!}
				<select name="plumaje" class="form-control" required>
					<option selected disabled  value=''></option>
					@for($i = 0; $i<= 3 ; $i++)
					@if($i == $medidasBiometricas->plumaje)
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
					@if($medidasBiometricas->edad == "I")
					<option selected value="I" >Inmaduro</option>
					@else
					<option value="I" >Inmaduro</option>
					@endif

					@if($medidasBiometricas->edad == "NV")
					<option selected value="NV" >No Volador</option>
					@else
					<option  value="NV" >No Volador</option>
					@endif

					@if($medidasBiometricas->edad == "J")
					<option selected value="J" >Joven</option>
					@else
					<option value="J" >Joven</option>
					@endif

					@if($medidasBiometricas->edad == "A")
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
					@if($medidasBiometricas->sexo == "H")
					<option selected value="H" >H</option>
					@else
					<option value="H" >H</option>
					@endif

					@if($medidasBiometricas->sexo == "M")
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
					@if($medidasBiometricas->muestra_endoparasito == "No")
					<option selected value="No" >No</option>
					@else
					<option value="No" >No</option>
					@endif

					@if($medidasBiometricas->muestra_endoparasito == "Si")
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
					@if($medidasBiometricas->muestra_ectoparasito == "No")
					<option selected value="No" >No</option>
					@else
					<option value="No" >No</option>
					@endif

					@if($medidasBiometricas->muestra_ectoparasito == "Si")
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

	<div class="panel-body " id="collapseObservaciones">
		<div class="row">
			<div class="col-lg-12 ">
				<textarea class="form-control" rows="5" name="observaciones"> {{$tomaAve->observaciones}} </textarea> 
			</div>
		</div>
	</div>
</div>
<!-- Fin panel5 -->

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseImagen" aria-expanded="false" aria-controls="collapseImagen"><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp Imágenes: </div>

	<div class="panel-body" id="collapseImagen">
		<div class="row">
			@foreach($tomaAve->imagenesAves as $imagenAve)
			<div class="col-xs-6 col-md-3">
				<a  class="thumbnail thumbnail-aves-custom">
					<p class="text-right p-aves-custom; " style="float:right;"> Eliminar 
						{!! Form::checkbox("deleteImg_$imagenAve->id", true, false, ['class'=>'eliminarAveCheckBox'])!!}
					</p>
					<img src="/avesPics/{{$imagenAve->url}}" alt="{{$imagenAve->nombre}}">
				</a>
			</div>		    
			@endforeach

		</div>

		<hr>
		<p>Agregar nueva imagen</p>
		<div class="row">
			<input type="hidden" value="1" name="cantidadImagenesPost" id="cantidadImagenesPost" />
			<div class="col-lg-4 ">
				<input type="file" accept="image/*" capture="camera" name="img1" >
				<br>
			</div>

			<div class="col-lg-8">
				<input type="text" class="form-control" name="imgNombre1" placeholder="Nombre de la imagen" />
				<br>
			</div>
		</div>

		<div id="appendImgs"></div>
		
		<div class="row">
			<div class="col-lg-2">
				<a class="btn btn-success" id="addImg" title="Agregar nueva imagen"><i class="glyphicon glyphicon-plus"></i></a>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel6 -->


<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Actualizar Toma' , ['class' => 'btn btn-success form-control']) !!}
	</div>
</div>

{!!Form::close()!!}



<!-- Modal Cambiar Ave-->
<div class="modal fade" id="cambiarAve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-xs-7">
						<h4 class="modal-title" id="myModalLabel">Seleccione Ave</h4>
					</div>
					<div class="col-xs-3">

					</div>
					<div class="col-xs-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
				</div>

			</div>
			<div class="modal-body">

				<!-- Toogle panel -->
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-pills" role="tablist">
						<li role="presentation" class="active "><a href="#cambiaAve" aria-controls="cambiaAve" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-sort"></i> Cambiar Ave</a></li>
						<li role="presentation" class=""><a href="#creaAve" aria-controls="creaAve" role="tab" data-toggle="tab"><i class="fa fa-twitter glyphicon">++</i> Nueva Ave</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="cambiaAve">
							<div class="row">
								<div class="col-lg-12">
									<br>
									@foreach($aves as $ave)
									{!! Form::radio("aveActual", true, false ,[	'class'=>'aveActual' ,
										'id'=>"$ave->id" , 
										'anillo'=>"$ave->numero_anillo",
										'especie'=>"$ave->especie",
										'genero'=>"$ave->genero",
										])!!} 
										<strong>Id: </strong> {{$ave->id}} , 
										@if($ave->migratoria == "Si")
										<strong>Ave migratoria</strong>,
										@else
										<strong>Anillo #:</strong> {{$ave->numero_anillo}} ,
										@endif
										<strong>Especie: </strong>{{$ave->especie}},
										<strong>Género: </strong>{{$ave->genero}}.

										<br>
										@endforeach
									</div>
								</div>
								<hr>

							<!-- seudo footer-->
							<div class="row">
								<div class="col-lg-12">
									<div class="col-xs-2">

									</div>
									<div class="col-xs-5">

									</div>
									<div class="col-xs-5">
										<button type="button" class="btn btn-primary btn-block" id="actualizarAve" data-dismiss="modal" >Actualizar</button>
										<br>
									</div>
								</div>
							</div>
						</div>

							<div role="tabpanel" class="tab-pane" id="creaAve">
								<br>
								<div class="row">
									<div class="col-lg-12" id="info-Remuestreo">
										
									</div>
								</div>
								<br>

								<div class="row">
									<div class="col-lg-4 col-lg-offset-2">
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

									<div class="col-lg-3">
										{!!Form::label('numero_anillo','Número de anillo:')!!}
										<input id="numero_anillo" type="number" step="1" min="0" class="form-control" name="numero_anillo" value="{{old('numero_anillo')}}" min="0">
										<br>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4 col-lg-offset-2">
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

								<!-- seudo footer-->
								<div class="row">
									<div class="col-lg-12">
										<div class="col-xs-2">

										</div>
										<div class="col-xs-5">

										</div>
										<div class="col-xs-5">
											<button type="button" class="btn btn-primary btn-block" id="crearAve"  >Crear</button>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- end Toggle panel -->


				</div>
				<!-- End mdoal body -->

      <!-- footer
      <div class="modal-footer">
      	<div class="row">
      		
      	</div>
      </div>
  -->
</div>
</div>
</div>


<br><br><br><br><br>

<script>
	//variables globales del ave seleccionada
	var idAve;
	var anilloAve;
	var especieAve;
	var generoAve;

	$('.aveActual').click(function(){
		idAve 		= $(this).attr('id');
		anilloAve	= $(this).attr('anillo');
		especieAve 	= $(this).attr('especie');
		generoAve 	= $(this).attr('genero');
	});

	$('#actualizarAve').click(function(){
		$('#idAve').text(idAve);
		if(anilloAve == 0) $('#anilloAve').text("Ave Migratoria.");
		else $('#anilloAve').text(anilloAve);
		$('#especieAve').text(especieAve);
		$('#generoAve').text(generoAve);

		$('#ave_id').val(idAve);
	});

	$('#crearAve').click(function(){
		var numAnillo 	= $('#numero_anillo').val();
		var especie 	= $('#especie').val();
		var genero 		= $('#genero').val();
		var migratoria;
		
		if($('#btnMigraSi').is(":checked")) migratoria = "Si";
		else migratoria = "No";

		if(migratoria == "No"){
			if(numAnillo!= null && especie != null && genero!= null){

			}
		}else{

		}


		$('nuevaAve').append();
	});
	

</script>

<script>
	$('#numero_anillo').blur(function () {
		var numeroAnillo = $('#numero_anillo').val();
		$.ajax({
			type:'GET',
			url: '/remuestreo/'+ numeroAnillo,
			success: function(data){
				console.log(data['ave']);
				if(data['ave']!=null)
				{
					var msg = "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Ya existe un ave registrada con el número de anillo "+numeroAnillo+".<div>";

					$('#info-Remuestreo').text("");
					$('#info-Remuestreo').append(msg);
					$('#numero_anillo').val("");
					$('#numero_anillo').focus();
				/*
				$("#especie").prop('disabled', true);
				$("#genero").prop('disabled', true);
				*/
			}else{
				$('#info-Remuestreo').text('');
				/*
				$("#especie").prop('disabled', false);
				$("#genero").prop('disabled', false);
				*/
			}
		}
	});
});
</script>

<script>
	$('#btnMigraSi').click(function(){
		$('#numero_anillo').val("");
		$('#info-Remuestreo').text("");
		$("#numero_anillo").prop('disabled', true);
		$("#especie").prop('disabled', false);
		$("#genero").prop('disabled', false);
	});
	$('#btnMigraNo').click(function(){
		$('#numero_anillo').val("");
		$("#numero_anillo").prop('disabled', false);
	});

	//Agregar Imagen
	$('#addImg').click(function(){
		var canImg = $('#cantidadImagenesPost').val()*1+1;
		$('#cantidadImagenesPost').val((canImg) );

		$('#appendImgs').append('<div class="row"><div class="col-lg-4 "><input type="file" accept="image/*" capture="camera" name="img'+canImg+'" ><br></div><div class="col-lg-8"><input type="text" class="form-control" name="imgNombre'+canImg+'" placeholder="Nombre de la imagen" /><br></div></div>');

	});
</script>