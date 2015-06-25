<div class="row">
	<div class="col-lg-12 text-center pagination-custom">
		{!!$tomasAguas->render() !!}
	</div>
</div>

@foreach($tomasAguas as $tomaAgua)

<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseToma{{$tomaAgua->id}}" aria-expanded="false" aria-controls="collapseToma{{$tomaAgua->id}}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<strong><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp &nbsp Toma #: {{$tomaAgua->id}} </strong>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Fecha: </strong>  {{($tomaAgua->fecha)}}</p>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Hora Inicial: </strong>  {{$tomaAgua->hora_inicial}}</p>
			</div>


			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Hora Final: </strong>  {{$tomaAgua->hora_final}}</p>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">

				<p><strong>Sitio: </strong>  {{$tomaAgua->sitio->name}}</p>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Por: </strong>  {{$tomaAgua->user->name}}</p>
			</div>
		</div>
	</div>
		<!-- Fin panel heading -->

	<div class="panel-body collapse" id="collapseToma{{$tomaAgua->id}}">

		<div class="row">
			<div class="col-lg-12  text-right ">
				<a href="/tomas/editar/Aguas/{{$tomaAgua->id}}" title="Editar" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				&nbsp &nbsp
				<button href="#" title="Eliminar" class="btn btn-danger btn-xs btn-confirmarEliminarToma" data-toggle="modal" data-target="#confirmarEliminacion" value="{{$tomaAgua->id}}"><i class="glyphicon glyphicon-remove" ></i></button>
			</div>	
		</div>

		<h4>Información Básica: </h4>
		<div class="row">
			<div class="col-lg-2">
				<strong>Latitud: </strong> {{$tomaAgua->lat}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Longitud: </strong> {{$tomaAgua->lng}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Temperatura : </strong> {{$tomaAgua->temperatura}} °C
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Viento : </strong> {{$tomaAgua->viento}} (m/s)
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Humedad : </strong> {{$tomaAgua->humedad}} (%)
				<br>
			</div>

		</div>

		<hr>
		<h4>Generalidades: </h4>
		<div class="row">
			<div class="col-lg-2">
				<strong>Clima: </strong> {{$tomaAgua->generalidad->clima->nombre}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Curso: </strong> {{$tomaAgua->generalidad->curso->nombre}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Nivel agua en función de: </strong> {{$tomaAgua->generalidad->parametroNivel->nombre}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Mo: </strong> {{$tomaAgua->generalidad->mo->nombre}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Trabajo Ingenieril: </strong> {{$tomaAgua->generalidad->trabajoIngenieril->nombre}}
				<br>
			</div>

			<div class="col-lg-2">
				<strong>Presencia de coliformes: </strong> {{$tomaAgua->coliformes}}
				<br>
			</div>
		</div>
			<!-- fin row -->


		<br>
		<div class="row">
			<div class="col-lg-4">
				<strong>Estructura del Banco: </strong> {{$tomaAgua->generalidad->estructuraBanco->nombre}}
				<br>
			</div>

			<div class="col-lg-8">
				<strong>Observación de la Estructura del Banco: </strong> {{$tomaAgua->generalidad->observacion_estructura_banco}}
				<br>
			</div>
		</div>
			<!-- fin row -->

		<br>
		<div class="row">
			<div class="col-lg-4">
				<strong>Cauce: </strong> 
				<ul>
					@foreach($tomaAgua->generalidad->valoresCauces as $valorCauce)
						<li>
						{{$valorCauce->tipoCauce->nombre}} :
						{{$valorCauce->valor}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>

			<div class="col-lg-4">
				<strong>Composicón del sustrato (%): </strong> 
				<ul>
					@foreach($tomaAgua->generalidad->porcentajesComposicionSustrato as $porcentajeCompSus)
						<li>
						{{$porcentajeCompSus->tipoSustrato->nombre}} :
						{{$porcentajeCompSus->porcentaje}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>

			<div class="col-lg-4">
				<strong>Condición del sustrato (%): </strong> 
				<ul>
					@foreach($tomaAgua->generalidad->porcentajesCondicionesSustratos as $porcentajeCondSus)
						<li>
						{{$porcentajeCondSus->tipoCondicionSustrato->nombre}} :
						{{$porcentajeCondSus->porcentaje}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>

		</div>
			<!-- fin row -->

		<hr>
		<h4>Vegetación: </h4>
		<div class="row">
			<div class="col-lg-3">
				<strong>Vegetación en el Banco (%): </strong>
				<ul>
					<li>{{$tomaAgua->vegetaciones->porcentaje_vegetacion_banco}}</li>
				</ul> 
				
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Exposición del Cauce (%): </strong> 
				<ul>
					@foreach($tomaAgua->vegetaciones->porcentajesExposicionCauce as $porcentajeExpoCauce)
						<li>
							{{$porcentajeExpoCauce->tipoExposicionCauce->nombre}} :
							{{$porcentajeExpoCauce->porcentaje}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Tipo en la Ribera (%): </strong> 
				<ul>
					@foreach($tomaAgua->vegetaciones->porcentajesTipoRibera as $porcentajeTipoRibera)
						<li>
							{{$porcentajeTipoRibera->tipoRibera->nombre}} :
							{{$porcentajeTipoRibera->porcentaje}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Ambientes Asociados (%): </strong> 
				<ul>
					@foreach($tomaAgua->vegetaciones->porcentajesAmbientesAsociados as $porcentajeAmbienteAso)
						<li>
							{{$porcentajeAmbienteAso->tipoAmbienteAsociado->nombre}} :
							{{$porcentajeAmbienteAso->porcentaje}}
						</li>
					@endforeach
				</ul>
				<br>
			</div>


		</div>
			<!-- fin row -->
		<hr>
		<h4>Caracterización Visual: </h4>
		<div class="row">
			<div class="col-lg-3">
				<strong>Presencia RS: </strong> {{$tomaAgua->caracterizacionVisual->presenciaRs->nombre}}				
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Contaminación Puntual: </strong> {{$tomaAgua->caracterizacionVisual->contPuntual->nombre}}				
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Color del Agua: </strong> {{$tomaAgua->caracterizacionVisual->colorAgua->nombre}}				
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Olor del Agua: </strong> {{$tomaAgua->caracterizacionVisual->olorAgua->nombre}}				
				<br>
			</div>
		</div>
			<!-- fin row -->

		<hr>
		<h4>Densiómetro <small>(Factor de cobertura = {{$tomaAgua->medidasDensiometro->factor_cobertura}}):</small> </h4>
		<div class="row">
			<div class="col-lg-3">
				<strong>Norte: </strong> {{$tomaAgua->medidasDensiometro->norte}}				
				<br>
				<strong>Porcentaje de Cobertura Norte: </strong> {{ 100 - ($tomaAgua->medidasDensiometro->norte * $tomaAgua->medidasDensiometro->factor_cobertura)}} 
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Sur: </strong> {{$tomaAgua->medidasDensiometro->sur}}				
				<br>
				<strong>Porcentaje de Cobertura Sur: </strong> {{ 100 - ($tomaAgua->medidasDensiometro->sur * $tomaAgua->medidasDensiometro->factor_cobertura)}} 
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Este: </strong> {{$tomaAgua->medidasDensiometro->este}}				
				<br>
				<strong>Porcentaje de Cobertura Este: </strong> {{ 100 - ($tomaAgua->medidasDensiometro->este * $tomaAgua->medidasDensiometro->factor_cobertura)}} 
				<br>
			</div>

			<div class="col-lg-3">
				<strong>Oste: </strong> {{$tomaAgua->medidasDensiometro->oeste}}				
				<br>
				<strong>Porcentaje de Cobertura Oeste: </strong> {{ 100 - ($tomaAgua->medidasDensiometro->oeste * $tomaAgua->medidasDensiometro->factor_cobertura)}} 
				<br>
			</div>
		</div>
			<!-- fin row -->

		<hr>
		<h4>Físico Químicos: </h4>
		<div class="row">
			<?php $count=1;?>
			@foreach($tomaAgua->fisicoQuimico as $fisicoQuimico)
					<div class="col-lg-4">
						<strong>Toma # {{$count}}</strong>
						<ul>
							<li><strong>O2 (mg/L): </strong> {{$fisicoQuimico->oxigeno_miligramos_litro}}	</li>
							<li><strong>O2 (%): </strong> {{$fisicoQuimico->oxigeno_porcentaje}}	</li>
							<li><strong>Temperatura (°C): </strong> {{$fisicoQuimico->temperatura}}	</li>
							<li><strong>pH: </strong> {{$fisicoQuimico->ph}}	</li>
							<li><strong>Conductividad (uS/cm): </strong> {{$fisicoQuimico->conductividad}}	</li>
							<li><strong>SST (mg/L): </strong> {{$fisicoQuimico->sst}}	</li>
						</ul>
					</div>
			<?php $count++;?>
			@endforeach
		</div>
		<!-- fin row -->

		<hr>
		<h4>Observaciones Generales: </h4>
		<div class="row">
			<div class="col-lg-12">
				{{$tomaAgua->observaciones}}
			</div>
		</div>
		<!-- fin row -->


	</div>
		<!-- fin body panel -->
</div>
<!-- fin panel 1 -->



@endforeach


<div class="row">
	<div class="col-lg-12 text-center">
		{!!$tomasAguas->render() !!}
	</div>
</div>


<!-- Modal para confirmar la Eliminacion de la Toma -->

<div class="modal fade" id="confirmarEliminacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      	<br><br>
      	<div class="row">
      		<div class="col-lg-12 text-center">
      			<strong id="msg-Eliminar">¿Desea eliminar la toma de agua?</strong>
      		</div>
      	</div>
        	
        <br>
        <div class="row ">
        	<div class="col-lg-4 col-lg-offset-2">
        		<button type="button" class="btn btn-default btn-block" data-dismiss="modal">No</button>
        		<br>
        	</div>

        	<div class="col-lg-4">
        		<a href="/tomas/Aguas" class="btn btn-danger btn-block btn-EliminarToma">Eliminar</a>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Fin Modal -->

<script>
	$('.btn-confirmarEliminarToma').on('click',function(){
		var tomaId = $(this).attr("value");
		$(".btn-EliminarToma").attr("href","/tomas/eliminar/Aguas/"+ tomaId);
		$("#msg-Eliminar").text("¿Seguro que desea eliminar la toma de agua #"+tomaId+"?");
	});
</script>