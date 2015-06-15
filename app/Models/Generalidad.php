<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generalidad extends Model {

	protected $table = 'generalidades';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
				'clima_id',
				'curso_id',
				'parametro_nivel_id',
				'estructura_banco_id',
				'observacion_estructura_banco',
				'mo_id',
				'trabajo_ingenieril_id',
				'toma_agua_id'

	];

	public function valoresCauces()
	{
		return $this->hasMany('App\Models\ValorCauce', 'generalidad_id');
	}

	public function curso()
	{
		return $this->belongsTo('App\Models\Curso');
	}

	public function clima()
	{
		return $this->belongsTo('App\Models\Clima');
	}

	public function parametroNivel()
	{
		return $this->belongsTo('App\Models\ParametroNivel');
	}

	public function estructuraBanco()
	{
		return $this->belongsTo('App\Models\EstructuraBanco');
	}

	public function porcentajesComposicionSustrato()
	{
		return $this->hasMany('App\Models\PorcentajeComposicionSustrato', 'generalidad_id');
	}

	public function porcentajesCondicionesSustratos()
	{
		return $this->hasMany('App\Models\PorcentajeCondicionSustrato', 'generalidad_id');
	}

	public function mo()
	{
		return $this->belongsTo('App\Models\Mo');
	}

	public function trabajoIngenieril()
	{
		return $this->belongsTo('App\Models\TrabajoIngenieril');
	}

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAgua');
	}

}