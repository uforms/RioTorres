<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstructuraBanco extends Model {

	protected $table = 'estructuras_banco';
	public $timestamps = true;

	public function generalidades()
	{
		return $this->hasMany('App\Models\Generalidad', 'estructuras_banco_id');
	}

}