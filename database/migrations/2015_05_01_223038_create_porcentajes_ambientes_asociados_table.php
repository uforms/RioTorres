<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesAmbientesAsociadosTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_ambientes_asociados', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tipo_ambiente_asociado_id')->unsigned();
			$table->integer('vegetacion_id')->unsigned();
			$table->float('porcentaje');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_ambientes_asociados');
	}
}