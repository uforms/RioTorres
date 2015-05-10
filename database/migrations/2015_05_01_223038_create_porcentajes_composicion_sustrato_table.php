<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesComposicionSustratoTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_composicion_sustrato', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('tipo_sustrato_id')->unsigned();
			$table->float('porcentaje');
			$table->integer('generalidad_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_composicion_sustrato');
	}
}