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
			$table->string('hora_inicial',10);
			$table->string('hora_final',10);
			$table->float('humedad');
			$table->float('temperatura');
			$table->float('viento');
			$table->text('observaciones');
			$table->string('fecha' , 12);
			$table->string('coliformes',4);
			$table->float('lat' ,10 , 6 );
			$table->float('lng' ,10 , 6 );
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tomas_aguas');
	}
}