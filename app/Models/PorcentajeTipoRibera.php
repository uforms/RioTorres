<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PorcentajeTipoRibera extends Model {

	protected $table = 'porcentajes_tipo_ribera';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoRibera()
	{
		return $this->belongsTo('App\Models\TipoRibera');
	}

	public function ve()
	{
		return $this->belongsTo('App\Models\Vegetacion');
	}

}