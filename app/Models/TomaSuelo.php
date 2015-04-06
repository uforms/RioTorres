<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TomaSuelo extends Model {

	protected $table = 'tomas_suelos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function parcela()
	{
		return $this->belongsTo('App\Models\Parcela');
	}

	public function sitio()
	{
		return $this->belongsTo('App\Models\Sitio');
	}

	public function muestrasSuelos()
	{
		return $this->hasMany('App\Models\MuestraSuelo', 'toma_suelo_id');
	}

	public function medidasEstacas()
	{
		return $this->hasMany('App\Models\MedidaEstaca', 'toma_suelo_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}