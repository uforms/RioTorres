<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoExposicionCauce extends Model {

	protected $table = 'tipos_exposicion_cauce';
	public $timestamps = true;

	public function porcentajeExposicionCauce()
	{
		return $this->hasMany('App\Models\PorcentajeExposicionCauce', 'tipo_exposicion_cauce_id');
	}

}