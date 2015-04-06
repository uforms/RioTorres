<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FisicoQuimico extends Model {

	protected $table = 'fisico_quimicos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAgua');
	}

}