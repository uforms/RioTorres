<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamenesGeneralesTable extends Migration {

	public function up()
	{
		Schema::create('examenes_generales', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('red');
			$table->integer('oj');
			$table->integer('cao');
			$table->integer('q');
			$table->integer('ab');
			$table->integer('cl');
			$table->integer('pa');
			$table->integer('al');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('examenes_generales');
	}
}