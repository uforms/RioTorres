<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrabajosIngenierilesTable extends Migration {

	public function up()
	{
		Schema::create('trabajos_ingenieriles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 255);
		});
	}

	public function down()
	{
		Schema::drop('trabajos_ingenieriles');
	}
}