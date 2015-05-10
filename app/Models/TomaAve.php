<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TomaAve extends Model {

	protected $table = 'tomas_aves';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = 
	[
		'ave_id',
		'medida_biometrica_id',
		'examen_general_id',
		'sitio_id',
		'user_id',
		'epoca_id',
		'observaciones',
	];

	public function ave()
	{
		return $this->belongsTo('App\Models\Ave');
	}

	public function sitio()
	{
		return $this->belongsTo('App\Models\Sitio');
	}

	public function medidaBiometrica()
	{
		return $this->belongsTo('App\Models\MedidaBiometrica');
	}

	public function examenGeneral()
	{
		return $this->belongsTo('App\Models\ExamenGeneral');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function epoca()
	{
		return $this->belongsTo('App\Models\Epoca');
	}

	public function imagenesAves()
	{
		return $this->hasMany('App\Models\ImagenAve', 'toma_ave_id');
	}

}