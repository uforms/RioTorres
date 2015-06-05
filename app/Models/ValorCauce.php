<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValorCauce extends Model {

	protected $table = 'valores_cauces';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tipoCauce()
	{
		return $this->belongsTo('App\Models\TipoCauce');
	}

	public function generalidad()
	{
		return $this->belongsTo('App\Models\Generalidad');
	}

}