<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColoresAguaTable extends Migration {

	public function up()
	{
		Schema::create('colores_agua', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('colores_agua');
	}
}