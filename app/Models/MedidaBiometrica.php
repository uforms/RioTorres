<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedidaBiometrica extends Model {

	protected $table = 'medidas_biometricas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('peso', 'ala', 'plumaje', 'edad', 'sexo', 'muestra_endoparasito', 'muestra_ectoparasito');

	public function tomaAve()
	{
		return $this->hasOne('App\Models\TomaAve', 'medida_biometrica_id');
	}

}