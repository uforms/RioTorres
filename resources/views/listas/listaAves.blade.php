<div class="row">
	<div class="col-lg-12 text-center pagination-custom">
		{!!$tomasAves->render() !!}
	</div>
</div>


@foreach($tomasAves as $tomaAve)
<div class="row">
	<div class="col-lg-8">
		<ul>
			<li>
				<h4> Toma #: {{$tomaAve->id}} </h4>
				<p><strong>Ave:</strong> {{$tomaAve->ave}}</p>
				<p><strong>Toma Aves:</strong>  {{$tomaAve}}</p>
				<p><strong>Medida Biometrica:</strong>  {{$tomaAve->medidaBiometrica}}</p>
				<p><strong>Examen General:</strong>  {{$tomaAve->examenGeneral}}</p>
				<p><strong>Epoca</strong>  {{$tomaAve->epoca}}</p>
				<p><strong>Realizada por:</strong>  {{$tomaAve->user}}</p>
			</li>
		</ul>
	</div>

	<div class="col-lg-4">
		@foreach($tomaAve->imagenesAves as $img)
			<img src="/avesPics/{{$img->url}}" height="100" width="100">
		@endforeach
	</div>

	</div>


	<hr>
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