<div class="row">
	<div class="col-lg-12 text-center pagination-custom">
		{!!$tomasAves->render() !!}
	</div>
</div>



@foreach($tomasAves as $tomaAve)
<div class="panel panel-primary">
	<div class="panel-heading panel-heading-custom" data-toggle="collapse" href="#collapseToma{{$tomaAve->id}}" aria-expanded="false" aria-controls="collapseToma{{$tomaAve->id}}">

		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<strong><strong class="glyphicon glyphicon-resize-full"></strong>&nbsp &nbsp Toma #: {{$tomaAve->id}} </strong>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Fecha: </strong>  {{$tomaAve->fecha}}</p>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
				<p><strong>Sitio: </strong>  {{$tomaAve->sitio->name}}</p>
			</div>

			<div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Época: </strong>  {{$tomaAve->epoca->nombre}}</p>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<p><strong>Por: </strong>  {{$tomaAve->user->name}}</p>
			</div>

		</div>
		<!-- fin row -->
	</div>
	<!-- fin panel heading -->

	<div class="panel-body collapse" id="collapseToma{{$tomaAve->id}}">


		<div class="row">
			<div class="col-lg-12  text-right ">
				<a href="/tomas/editar/Aves/{{$tomaAve->id}}" title="Editar" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				&nbsp &nbsp
				<button href="#" title="Eliminar" class="btn btn-danger btn-xs btn-confirmarEliminarToma" data-toggle="modal" data-target="#confirmarEliminacion" value="{{$tomaAve->id}}"><i class="glyphicon glyphicon-remove" ></i></button>
			</div>	
		</div>

		<div class="row">
			<div class="col-lg-2" >

			@if($tomaAve->imagenesAves->count() > 0)
				
				{{$tomaAve->imagenesAves->count()}}
				@if($tomaAve->imagenesAves->count() == 1)
					 imagen.
				@else
					imágenes.
				@endif
				<!-- Inicio carousel -->
				<div id="myCarousel{{$tomaAve->id}}" class="carousel slide" data-ride="carousel">
				  <!-- Indicators 
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				    <li data-target="#myCarousel" data-slide-to="3"></li>
				  </ol>
					-->

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">


				  	<?php 
				  		$imageCounter = 0; //Para activar primera imagen
				  	 ?>
				  	@foreach($tomaAve->imagenesAves as $imagenAve)
				  		@if($imageCounter == 0)
				  			<div class="item active">
				  				<img src="/avesPics/{{$imagenAve->url}}" alt="{{$imagenAve->nombre}}">
				  				<?php $imageCounter++; ?>  	
				   		 	</div>
				   		@else
				   			<div class="item">
						      <img src="/avesPics/{{$imagenAve->url}}" alt="{{$imagenAve->nombre}}">
						    </div>
			  			@endif			    
				  	@endforeach
				  </div>

				  <!-- Left and right controls -->
				  @if($tomaAve->imagenesAves->count() == 1)

				  @else
				  	<a class="left carousel-control" href="#myCarousel{{$tomaAve->id}}" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel{{$tomaAve->id}}" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				  @endif
				  
				</div>
					<!-- fin carousel -->
			@else
				No hay imagenes 
			@endif
			</div>
				<!-- Fin col carousel -->

			<div class="col-lg-3">
				<h4>Ave: </h4>
				<strong>Id Ave: </strong> {{$tomaAve->ave->id}}
				<br>
				@if($tomaAve->ave->migratoria == "Si")
					<strong>Ave Migratoria</strong>
				@else
					<strong>Número de Anillo: </strong> {{$tomaAve->ave->numero_anillo}}
				@endif
				<br>
				<strong>Especie: </strong> {{$tomaAve->ave->especie}}
				<br>
				<strong>Género: </strong> {{$tomaAve->ave->genero}}
				<br>
			</div>

			<div class="col-lg-3">
				<h4>Exámen General: </h4>
				<strong>Red: </strong> {{$tomaAve->examenGeneral->red}}
				<br>
				<strong>OJ: </strong> {{$tomaAve->examenGeneral->oj}}
				<br>
				<strong>Cao: </strong> {{$tomaAve->examenGeneral->cao}}
				<br>
				<strong>Q: </strong> {{$tomaAve->examenGeneral->q}}
				<br>
				<strong>Ab: </strong> {{$tomaAve->examenGeneral->ab}}
				<br>
				<strong>Cl: </strong> {{$tomaAve->examenGeneral->cl}}
				<br>
				<strong>Pa: </strong> {{$tomaAve->examenGeneral->pa}}
				<br>
				<strong>Al: </strong> {{$tomaAve->examenGeneral->al}}
				<br>
			</div>

			<div class="col-lg-4">
				<h4>Medidas Biométricas: </h4>
				<strong>Peso: </strong> {{$tomaAve->medidaBiometrica->peso}}
				<br>
				<strong>Ala: </strong> {{$tomaAve->medidaBiometrica->ala}}
				<br>
				<strong>Plumaje: </strong> {{$tomaAve->medidaBiometrica->plumaje}}
				<br>
				<strong>Edad: </strong> {{$tomaAve->medidaBiometrica->edad}}
				<br>
				<strong>Sexo: </strong> {{$tomaAve->medidaBiometrica->sexo}}
				<br>
				<strong>Muestra Endoparásito: </strong> {{$tomaAve->medidaBiometrica->muestra_endoparasito}}
				<br>
				<strong>Muestra Ectoparásito: </strong> {{$tomaAve->medidaBiometrica->muestra_ectoparasito}}
				<br>
			</div>

		</div>
		<!-- fin row -->

		<div class="row">
			<div class="col-lg-12">
				<strong>Observaciones: </strong><br>
				{{$tomaAve->observaciones}}
			</div>
		</div>
	</div>
		<!-- fin panel body -->
</div>
<!-- fin panel -->


@endforeach
</div>


<div class="row">
	<div class="col-lg-12 text-center">
		{!!$tomasAves->render() !!}
	</div>
</div>

<script>
	$('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

 <!-- Modal para confirmar Eliminar una toma!>
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
		$(".btn-EliminarToma").attr("href","/tomas/eliminar/Aves/"+ tomaId);
		$("#msg-Eliminar").text("¿Seguro que desea eliminar la toma de aves #"+tomaId+" y toda la información relacionada?");
	});
</script>