<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposCaucesTable extends Migration {

	public function up()
	{
		Schema::create('tipos_cauces', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 20);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tipos_cauces');
	}
}