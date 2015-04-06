<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mo extends Model {

	protected $table = 'mos';
	public $timestamps = true;

	public function generalidades()
	{
		return $this->hasMany('App\Models\Generalidad', 'mo_id');
	}

}