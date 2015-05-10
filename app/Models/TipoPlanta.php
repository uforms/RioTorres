<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPlanta extends Model {

	protected $table = 'tipos_plantas';
	public $timestamps = false;
	protected $fillable = array('nombre', 'comentario');

	public function parcela()
	{
		return $this->hasMany('App\Models\Parcela', 'id_planta');
	}

}