<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracterizacionVisual extends Model {

	protected $table = 'caracterizaciones_visuales';
	public $timestamps = true;

	public function presenciaRs()
	{
		return $this->belongsTo('App\Models\PresenciaRs');
	}

	public function contPuntual()
	{
		return $this->belongsTo('App\Models\ContPuntual');
	}

	public function colorAgua()
	{
		return $this->belongsTo('App\Models\ColorAgua');
	}

	public function olorAgua()
	{
		return $this->belongsTo('App\Models\OlorAgua');
	}

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAgua');
	}

}