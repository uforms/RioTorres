<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TomaSuelo extends Model {

	protected $table = 'tomas_suelos';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('total_sedimentos_muestra', 'total_sedimentos_seco');

	public function parcela()
	{
		return $this->belongsTo('App\Models\Parcela');
	}

	public function sitio()
	{
		return $this->belongsTo('App\Models\Sitio');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}