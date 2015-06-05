<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clima extends Model {

	protected $table = 'climas';
	public $timestamps = true;

	public function generalidades()
	{
		return $this->hasMany('App\Models\Generalidad', 'clima_id');
	}

}