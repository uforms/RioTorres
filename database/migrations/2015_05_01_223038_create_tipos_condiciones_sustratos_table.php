<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposCondicionesSustratosTable extends Migration {

	public function up()
	{
		Schema::create('tipos_condiciones_sustratos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('tipos_condiciones_sustratos');
	}
}