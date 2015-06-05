<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OlorAgua extends Model {

	protected $table = 'olores_agua';
	public $timestamps = true;

	public function caracterizacionesVisuales()
	{
		return $this->hasMany('App\Models\CaracterizacionVisual', 'olor_agua_id');
	}

}