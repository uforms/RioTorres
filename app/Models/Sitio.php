<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sitio extends Model {

	protected $table = 'sitios';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('address');

	public function tomasAves()
	{
		return $this->hasOne('App\Models\TomaAve', 'sitio_id');
	}

	public function parcelas()
	{
		return $this->hasMany('App\Models\Parcela', 'sitio_id');
	}

	public function tomasSuelos()
	{
		return $this->hasMany('App\Models\TomaSuelo', 'sitio_id');
	}

	public function tomasAguas()
	{
		return $this->hasMany('App\Models\TomaAgua', 'sitio_id');
	}

}