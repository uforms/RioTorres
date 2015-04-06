<div class="row">
	<div class="col-lg-12 text-center pagination-custom">
		{!!$tomasAves->render() !!}
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<ul>
			@foreach($tomasAves as $tomaAve)
				<li>{{$tomaAve}}</li>
				<br>
			@endforeach
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 text-center">
		{!!$tomasAves->render() !!}
	</div>
</div>