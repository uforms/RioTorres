<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamenesGeneralesTable extends Migration {

	public function up()
	{
		Schema::create('examenes_generales', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('red');
			$table->integer('ol');
			$table->integer('cao');
			$table->integer('q');
			$table->integer('ab');
			$table->integer('cl');
			$table->integer('pa');
			$table->integer('al');
		});
	}

	public function down()
	{
		Schema::drop('examenes_generales');
	}
}