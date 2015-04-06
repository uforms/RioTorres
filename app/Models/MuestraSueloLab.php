<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuestraSueloLab extends Model {

	protected $table = 'muestras_suelos_lab';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function muestraSuelo()
	{
		return $this->belongsTo('App\Models\MuestraSuelo');
	}

}