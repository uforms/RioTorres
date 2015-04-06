<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuestraSuelo extends Model {

	protected $table = 'muestras_suelos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function muestrasSuelosLad()
	{
		return $this->hasMany('App\Models\MuestraSueloLab', 'muestra_suelo_id');
	}

	public function tomaSuelo()
	{
		return $this->belongsTo('App\Models\TomaSuelo');
	}

}