<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContPuntual extends Model {

	protected $table = 'cont_puntual';
	public $timestamps = true;

	public function caracterizacionesVisuales()
	{
		return $this->hasMany('App\Models\CaracterizacionVisual', 'cont_puntual_id');
	}

}