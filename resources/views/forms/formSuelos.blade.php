{!!Form::open() !!}

<div class="panel panel-primary">
	<div class="panel-heading">Específicos de la toma: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				{!!Form::label('sitio_id','Sitio:')!!}
				<select name="sitio_id" class="form-control" id="sitio_id" required autocomplete="off">
					<option selected disabled  value=''>Seleccione sitio</option>
					@foreach($sitios as $sitio) 
						<option value="{{$sitio->id}}" >{{$sitio->name}}</option>
					@endforeach 
				</select> 
				<br>
			</div>


			<div class="col-lg-2">
				<br>
				<p id="infoParcela">Seleccione Sitio para cargar Parcelas</p>
			</div>

			<div class="col-lg-2">
				{!!Form::label('parcela_id','Parcela:')!!}
				<select name="parcela_id" class="form-control" id="parcela_id" disabled="disabled" required autocomplete="off">
					<option selected disabled  value=''>Seleccione Parcela:</option>
					
				</select> 
				<br>
			</div>

			<div class="col-lg-2">
				<br>
				<p id="infoEstaca"></p>
			</div>

			<div class="col-lg-2" id="divCambiarParcela" style="display:none">
				<br>
				<a href="#" class="btn btn-danger" id="btnCambiarParcela">Cambiar Parcela</a>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel1 -->

<div class="panel panel-primary">
	<div class="panel-heading">Tomas de Estacas: </div>

	<div class="panel-body">
		<div class="row" id="divEstacas">
			<div class="col-lg-12">
				<p>Seleccione un Sitio y una Parcela para cargar las estacas</p>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel2 -->

<div class="panel panel-primary">
	<div class="panel-heading">Muestras: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				{!!Form::label('cantidad_muestras','Cantidad de Muestras:')!!}
				<input type="number" name="cantidad_muestras" class="form-control" id="cantidad_muestras">
				<br>
			</div>

			<div class="col-lg-2 ">
				{!!Form::label('','Agregar Muestras:')!!}
				<a class="btn btn-primary" id="btnAgregarMuestras">Agregar</a>
			</div>
		</div>

		<div class="row" id="ingresoMuestras">
			
		</div>
	</div>
</div>
<!-- Fin panel3 -->

<div class="panel panel-primary">
	<div class="panel-heading">Sedimentos extra: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				{!!Form::label('cantidad_sedimentos','Sedimentos Extra:')!!}
				<input type="text" name="cantidad_sedimentos" class="form-control" placeholder="gramos">
				<br>
			</div>

			<div class="col-lg-2 col-lg-offset-1">
				<p>Total de sedimentos: </p>
				<p id="total_sedimentos"> 0 gramos.</p>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel3 -->

<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Guardar Toma' , ['class' => 'btn btn-success form-control']) !!}
	</div>
</div>


{!!Form::close()!!}

<br><br><br>

<script>
	$( "#sitio_id" ).change(function() {
	  var $sitio_id = $( "#sitio_id" ).val();
	  var $parcelas_id = $('#parcela_id');
	  var $infoParcela = $('#infoParcela');
	  var $infoEstaca = $('#infoEstaca');

	  $.ajax({
	  	type:'GET',
	  	url: '/get/parcelas/'+$sitio_id,
	  	success: function(parcelas){
	  		$infoEstaca.text('');
	  		$('#divEstacas').html('<div class="col-lg-12"><p>Seleccione un Sitio y una Parcela para cargar las estacas</p>  </div>');

	  		$parcelas_id.html('<option selected disabled  value="">Seleccione Parcela:</option>');

	  		if(parcelas.length == 0) {
	  			$infoParcela.text('No hay parcelas asociadas a este sitio.');
	  			$parcelas_id.prop('disabled', 'disabled');
	  			
	  		}else{
	  			$parcelas_id.prop('disabled', false);
	  			$infoParcela.text('Este sitio contiene '+parcelas.length+' parcelas asociadas');
		  		$.each(parcelas, function(i, parcela){
		  			$parcelas_id.append('<option value='+parcela.id+'>'+parcela.numero_parcela+'</option>');
		  		});
		  	}//fin else
	  	}//fin success
	  });//fin ajax
	});//fin change parcelas function

	$( "#parcela_id" ).change(function() {
		var $parcela_id = $('#parcela_id').val();
		var $info = $('#infoEstaca');
		$.ajax({
			type:'GET',
			url: '/get/parcela/'+$parcela_id,
			success: function(parcela){
				$info.text('Esta parcela contiene '+parcela.cantidad_estacas+' estacas.');
				$('#divEstacas').html('');
				for(var i = 1 ; i<= parcela.cantidad_estacas ; i++) {
					$('#divEstacas').append('<div class="col-lg-1" ><label for="estaca'+i+'">Estaca '+i+' </label>  <input type="text" name="estaca'+i+'" class="form-control " id="estaca'+i+'" placeholder="cm" > <br> </div> ');
				}
				$( "#sitio_id" ).prop('disabled', 'disabled');
				$( "#parcela_id" ).prop('disabled', 'disabled');
				$( "#divCambiarParcela").show();

			}
		});
	});// fin change parcela function


	$('#btnCambiarParcela').click(function() {
	    location.reload();
	});

	$('#btnAgregarMuestras').click(function(){
		var $cantidad_muestras = $('#cantidad_muestras').val();
		if($cantidad_muestras != null && $cantidad_muestras > 0)
			{
				$('#ingresoMuestras').html('');
				for(var i = 1 ; i<= $cantidad_muestras ; i++){
					$('#ingresoMuestras').append('<div class="col-lg-2"><label for="muestra'+i+'">Muestra '+i+' </label> <input type="text" class="form-control" name="muestra'+i+'" placeholder="g"> </div>');
				}
			}
		else
			alert('No hay cantidad de muestras ingresadas');
	});
</script>

