<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracterizacionVisual extends Model {

	protected $table = 'caracterizaciones_visuales';
	public $timestamps = true;

	protected $fillable = [
			'presencia_rs_id',
			'cont_puntual_id',
			'color_agua_id',
			'olor_agua_id',
			'toma_agua_id'
	];

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