<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrabajoIngenieril extends Model {

	protected $table = 'trabajos_ingenieriles';
	public $timestamps = true;

	public function generalidades()
	{
		return $this->hasMany('App\Models\Generalidad', 'trabajo_ingenieril_id');
	}

}