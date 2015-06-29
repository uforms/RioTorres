<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamenGeneral extends Model {

	protected $table = 'examenes_generales';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'red',
		'oj',
		'cao',
		'q',
		'ab',
		'cl',
		'pa',
		'al',
	];

	public function tomaAve()
	{
		return $this->hasOne('App\Models\TomaAve', 'examen_general_id');
	}

}