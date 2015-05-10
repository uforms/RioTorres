<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposPlantasTable extends Migration {

	public function up()
	{
		Schema::create('tipos_plantas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 50);
			$table->text('comentario');
		});
	}

	public function down()
	{
		Schema::drop('tipos_plantas');
	}
}