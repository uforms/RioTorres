<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpocasTable extends Migration {

	public function up()
	{
		Schema::create('epocas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 20);
			$table->string('codigo', 2);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('epocas');
	}
}