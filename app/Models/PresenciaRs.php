<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresenciaRs extends Model {

	protected $table = 'presencia_rs';
	public $timestamps = true;

	public function caracterizacionesVisuales()
	{
		return $this->hasMany('App\Models\CaracterizacionVisual', 'presencia_rs_id');
	}

}