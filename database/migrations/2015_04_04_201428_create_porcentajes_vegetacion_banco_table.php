<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorcentajesVegetacionBancoTable extends Migration {

	public function up()
	{
		Schema::create('porcentajes_vegetacion_banco', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('vegetacion_id')->unsigned();
			$table->float('porcentaje');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('porcentajes_vegetacion_banco');
	}
}