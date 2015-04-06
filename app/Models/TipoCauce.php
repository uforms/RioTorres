<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCauce extends Model {

	protected $table = 'tipos_cauces';
	public $timestamps = true;

	public function valoresCauces()
	{
		return $this->hasMany('App\Models\ValorCauce', 'tipo_cauce_id');
	}

}