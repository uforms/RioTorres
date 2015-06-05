<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PorcentajeAmbienteAsociado extends Model {

	protected $table = 'porcentajes_ambientes_asociados';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoAmbienteAsociado()
	{
		return $this->belongsTo('App\Models\TipoAmbienteAsociado');
	}

	public function vegetacion()
	{
		return $this->belongsTo('App\Models\Vegetacion');
	}

}