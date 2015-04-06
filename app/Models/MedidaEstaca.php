<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedidaEstaca extends Model {

	protected $table = 'medidas_estacas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tomaSuelo()
	{
		return $this->belongsTo('App\Models\TomaSuelo');
	}

}