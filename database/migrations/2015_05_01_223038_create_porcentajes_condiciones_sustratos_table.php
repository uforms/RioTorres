<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesCondicionesSustratosTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_condiciones_sustratos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('tipo_condicion_sustrato_id')->unsigned();
			$table->float('porcentaje');
			$table->integer('generalidad_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_condiciones_sustratos');
	}
}