<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposAmbientesAsociadosTable extends Migration {

	public function up()
	{
		Schema::create('tipos_ambientes_asociados', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('tipos_ambientes_asociados');
	}
}