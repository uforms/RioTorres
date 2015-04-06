<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PorcentajeComposicionSustrato extends Model {

	protected $table = 'porcentajes_composicion_sustrato';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoSustrato()
	{
		return $this->belongsTo('App\Models\TipoSustrato');
	}

	public function generalidad()
	{
		return $this->belongsTo('App\Models\Generalidad');
	}

}