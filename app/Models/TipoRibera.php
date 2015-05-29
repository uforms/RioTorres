<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRibera extends Model {

	protected $table = 'tipos_riberas';
	public $timestamps = true;

	public function porcentajesTipoRibera()
	{
		return $this->hasMany('App\Models\PorcentajeTipoRibera', 'tipo_ribera_id');
	}

}