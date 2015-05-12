<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTomasAguasTable extends Migration {

	public function up()
	{
		Schema::create('tomas_aguas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sitio_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->datetime('hora_inicial');
			$table->datetime('hora_final');
			$table->float('humedad');
			$table->float('temperatura');
			$table->float('viento');
			$table->text('observaciones');
			$table->tinyInteger('coliformes');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tomas_aguas');
	}
}