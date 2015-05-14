<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVegetacionesTable extends Migration {

	public function up()
	{
		Schema::create('vegetaciones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('toma_agua_id')->unsigned();
			$table->float('porcentaje_vegetacion_banco');
		});
	}

	public function down()
	{
		Schema::drop('vegetaciones');
	}
}