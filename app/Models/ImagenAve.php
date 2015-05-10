<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagenAve extends Model {

	protected $table = 'imagenes_aves';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('nombre', 'url', 'toma_ave_id');

	public function tomaAgua()
	{
		return $this->belongsTo('App\Models\TomaAve');
	}

}