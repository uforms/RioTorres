<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PorcentajeExposicionCauce extends Model {

	protected $table = 'porcentajes_exposicion_cauce';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoExposicionCauce()
	{
		return $this->belongsTo('App\Models\TipoExposicionCauce');
	}

	public function vegetacion()
	{
		return $this->belongsTo('App\Models\Vegetacion');
	}

}