<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedidaDensiometro extends Model {

	protected $table = 'medidas_densiometro';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAgua');
	}

}