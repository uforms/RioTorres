<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAmbienteAsociado extends Model {

	protected $table = 'tipos_ambientes_asociados';
	public $timestamps = true;

	public function porcentajesAmbientesAsociados()
	{
		return $this->hasMany('App\Models\PorcentajeAmbienteAsociado', 'tipo_ambiente_asociado_id');
	}

}