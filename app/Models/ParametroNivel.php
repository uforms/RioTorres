<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParametroNivel extends Model {

	protected $table = 'parametros_nivel';
	public $timestamps = true;

	public function generalidades()
	{
		return $this->hasMany('App\Models\Generalidad', 'parametro_nivel_id');
	}

}