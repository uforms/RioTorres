<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTomasAvesTable extends Migration {

	public function up()
	{
		Schema::create('tomas_aves', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ave_id')->unsigned();
			$table->integer('medida_biometrica_id')->unsigned();
			$table->integer('examen_general_id')->unsigned();
			$table->integer('sitio_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('epoca_id')->unsigned();
			$table->text('observaciones')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tomas_aves');
	}
}