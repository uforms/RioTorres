{!!Form::open() !!}

<div class="panel panel-primary">
	<div class="panel-heading">Específicos de la toma: </div>

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				{!!Form::label('sitio_id','Sitio:')!!}
				<select name="sitio_id" class="form-control" id="sitio_id" required>
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
				<select name="parcela_id" class="form-control" id="parcela_id" disabled="disabled" required>
					<option selected disabled  value=''>Seleccione Parcela:</option>
					
				</select> 
				<br>
			</div>

			<div class="col-lg-2">
				<br>
				<p id="infoEstaca"></p>
			</div>
		</div>
	</div>
</div>
<!-- Fin panel1 -->

<div class="panel panel-primary">
	<div class="panel-heading">Tomas de Estacas: </div>

	<div class="panel-body">
		<div class="row" id="divEstacas">
			<div class="col-lg-2"></div>
		</div>
	</div>
</div>
<!-- Fin panel2 -->

<div class="row" >
	<div class="col-lg-2">
		{!!Form::submit('Guardar Toma' , ['class' => 'btn btn-success form-control']) !!}
	</div>
</div>


{!!Form::close()!!}

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
	});//fin change function

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
					$('#divEstacas').append('<div class="col-lg-1" ><label for="estaca'+i+'">Estaca '+i+' </label>  <input type="text" name="estaca'+i+'" class="form-control" id="estaca'+i+'" placeholder="cm" > <br> </div> ');
				}
				

			}
		});
	});
</script>