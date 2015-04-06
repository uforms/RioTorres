<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PorcentajeCondicionSustrato extends Model {

	protected $table = 'porcentajes_condiciones_sustratos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoCondicionSustrato()
	{
		return $this->belongsTo('App\Models\TipoCondicionSustrato');
	}

	public function generalidad()
	{
		return $this->belongsTo('App\Models\Generalidad');
	}

}