<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorAgua extends Model {

	protected $table = 'colores_agua';
	public $timestamps = true;

	public function caracterizacionesVisuales()
	{
		return $this->hasMany('App\Models\CaracterizacionVisual', 'color_agua_id');
	}

}