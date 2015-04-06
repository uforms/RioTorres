<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametrosNivelTable extends Migration {

	public function up()
	{
		Schema::create('parametros_nivel', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('parametros_nivel');
	}
}