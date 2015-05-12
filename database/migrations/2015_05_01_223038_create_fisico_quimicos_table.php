<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFisicoQuimicosTable extends Migration {

	public function up()
	{
		Schema::create('fisico_quimicos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('toma_agua_id')->unsigned();
			$table->integer('numero_repeticion');
			$table->float('oxigeno_miligramos_litro');
			$table->float('oxigeno_porcentaje');
			$table->float('temperatura');
			$table->float('ph');
			$table->float('conductividad');
			$table->float('sst');
			$table->float('salinidad');
		});
	}

	public function down()
	{
		Schema::drop('fisico_quimicos');
	}
}