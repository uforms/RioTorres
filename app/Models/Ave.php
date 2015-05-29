<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ave extends Model {

	protected $table = 'aves';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('id', 'especie', 'genero');

	public function tomasAves()
	{
		return $this->hasMany('App\Models\TomaAve', 'ave_id');
	}

	public function imagenesAves(){
		return $this->hasMany('App\Models\ImagenAve', 'ave_id');
	}

}