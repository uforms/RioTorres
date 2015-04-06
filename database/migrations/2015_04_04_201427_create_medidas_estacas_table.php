<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedidasEstacasTable extends Migration {

	public function up()
	{
		Schema::create('medidas_estacas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('toma_suelo_id')->unsigned();
			$table->integer('numero_estaca');
			$table->float('valor_medida');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('medidas_estacas');
	}
}