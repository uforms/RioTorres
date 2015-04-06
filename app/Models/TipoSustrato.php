<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSustrato extends Model {

	protected $table = 'tipos_sustratos';
	public $timestamps = true;

	public function porcentajesComposicionSustrato()
	{
		return $this->hasMany('App\Models\PorcentajeComposicionSustrato', 'tipo_sustrato_id');
	}

}