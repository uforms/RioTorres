<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesTipoRiberaTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_tipo_ribera', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tipo_ribera_id')->unsigned();
			$table->integer('vegetacion_id')->unsigned();
			$table->float('porcentaje');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_tipo_ribera');
	}
}