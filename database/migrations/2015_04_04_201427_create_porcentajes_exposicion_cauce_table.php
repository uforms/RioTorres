<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesExposicionCauceTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_exposicion_cauce', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('tipo_exposicion_cauce_id')->unsigned();
			$table->float('porcentaje');
			$table->integer('vegetacion_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_exposicion_cauce');
	}
}