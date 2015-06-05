<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Epoca extends Model {

	protected $table = 'epocas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tomasAves()
	{
		return $this->hasMany('App\Models\TomaAve', 'epoca_id');
	}

}