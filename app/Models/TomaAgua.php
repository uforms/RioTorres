<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TomaAgua extends Model {

	protected $table = 'tomas_aguas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
				'sitio_id',
				'user_id',
				'hora_inicial',
				'hora_final',
				'humedad',
				'temperatura',
				'viento',
				'observaciones',
				'coliformes',
	];

	public function generalidad()
	{
		return $this->hasOne('App\Models\Generalidad', 'toma_agua_id');
	}

	public function sitio()
	{
		return $this->belongsTo('App\Models\Sitio');
	}

	public function vegetaciones()
	{
		return $this->hasMany('App\Models\Vegetacion', 'toma_agua_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function caracterizacionVisual()
	{
		return $this->hasOne('App\Models\CaracterizacionVisual', 'toma_agua_id');
	}

	public function medidasDensiometro()
	{
		return $this->hasMany('App\Models\MedidaDensiometro', 'toma_agua_id');
	}

	public function fisicoQuimico()
	{
		return $this->hasMany('App\Models\FisicoQuimico', 'toma_agua_id');
	}

}