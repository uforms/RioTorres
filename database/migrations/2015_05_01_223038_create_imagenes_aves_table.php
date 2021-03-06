<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagenesAvesTable extends Migration {

	public function up()
	{
		Schema::create('imagenes_aves', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nombre', 50);
			$table->text('url');
			$table->integer('ave_id')->unsigned();
			$table->integer('toma_ave_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('imagenes_aves');
	}
}