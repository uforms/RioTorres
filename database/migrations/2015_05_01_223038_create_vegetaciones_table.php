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
			$table->text('comentario');
			$table->integer('toma_agua_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vegetaciones');
	}
}