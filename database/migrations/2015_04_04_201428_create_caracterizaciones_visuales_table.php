<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaracterizacionesVisualesTable extends Migration {

	public function up()
	{
		Schema::create('caracterizaciones_visuales', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('presencia_rs_id')->unsigned();
			$table->integer('cont_puntual_id')->unsigned();
			$table->integer('color_agua_id')->unsigned();
			$table->integer('olor_agua_id')->unsigned();
			$table->integer('toma_agua_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('caracterizaciones_visuales');
	}
}