<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralidadesTable extends Migration {

	public function up()
	{
		Schema::create('generalidades', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('clima_id')->unsigned();
			$table->integer('curso_id')->unsigned();
			$table->integer('parametro_nivel_id')->unsigned();
			$table->integer('estructura_banco_id')->unsigned();
			$table->string('observacion_estructura_banco',200);
			$table->integer('mo_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('trabajo_ingenieril_id')->unsigned();
			$table->integer('toma_agua_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('generalidades');
	}
}