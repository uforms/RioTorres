<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vegetacion extends Model {

	protected $table = 'vegetaciones';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function porcentajesExposicionCauce()
	{
		return $this->hasMany('App\Models\PorcentajeExposicionCauce', 'vegetacion_id');
	}

	public function porcentajesTipoRibera()
	{
		return $this->hasMany('App\Models\PorcentajeTipoRibera', 'vegetacion_id');
	}

	public function porcentajeVegetacionBanco()
	{
		return $this->hasOne('App\Models\PorcentajeVegetacionBanco', 'vegetacion_id');
	}

	public function porcentajesAmbientesAsociados()
	{
		return $this->hasMany('App\Models\PorcentajeAmbienteAsociado', 'vegetacion_id');
	}

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAgua');
	}

}