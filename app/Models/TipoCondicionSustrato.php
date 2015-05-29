<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCondicionSustrato extends Model {

	protected $table = 'tipos_condiciones_sustratos';
	public $timestamps = true;

	public function porcentajeCondicionSustrato()
	{
		return $this->hasMany('App\Models\PorcentajeCondicionSustrato', 'tipo_condicion_sustrato_id');
	}

}