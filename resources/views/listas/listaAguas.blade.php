<div class="row">
	<div class="col-lg-12 text-center pagination-custom">
		{!!$tomasAguas->render() !!}
	</div>
</div>


@foreach($tomasAguas as $tomaAgua)
<div class="row">
	<div class="col-lg-12">
		<ul>
			<li>
				<h4> Toma #: {{$tomaAgua->id}} </h4>
				<p><strong>Toma Agua:</strong>  {{$tomaAgua}}</p>
				<p><strong>Generalidades:</strong>  {{$tomaAgua->generalidad}}</p>
				<p><strong>Caracterización Visual:</strong>  {{$tomaAgua->caracterizacionVisual}}</p>
				<p><strong>Medidas Densiómetro:</strong>  {{$tomaAgua->medidasDensiometro}}</p>
				<p><strong>Físico Químicos:</strong>  {{$tomaAgua->fisicoQuimico}}</p>
				<p><strong>Vegetaciones:</strong>  {{$tomaAgua->vegetaciones}}</p>
				<p><strong>Realizada por:</strong>  {{$tomaAgua->user}}</p>
			</li>
		</ul>
	</div>

	</div>


	<hr>
	@endforeach
</div>

<div class="row">
	<div class="col-lg-12 text-center">
		{!!$tomasAguas->render() !!}
	</div>
</div>