<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMuestrasSuelosTable extends Migration {

	public function up()
	{
		Schema::create('muestras_suelos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('toma_suelo_id')->unsigned();
			$table->string('nombre_muestra', 2);
			$table->float('peso');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('muestras_suelos');
	}
}