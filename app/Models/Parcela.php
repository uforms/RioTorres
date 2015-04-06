<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model {

	protected $table = 'parcelas';
	public $timestamps = true;

	public function sitio()
	{
		return $this->belongsTo('App\Models\Sitio');
	}

	public function tomasSuelos()
	{
		return $this->hasMany('App\Models\TomaSuelo', 'parcela_id');
	}

}