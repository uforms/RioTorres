<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMuestrasSuelosLabTable extends Migration {

	public function up()
	{
		Schema::create('muestras_suelos_lab', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('muestra_suelo_id')->unsigned();
			$table->integer('numero_repeticion');
			$table->float('peso_humedo');
			$table->float('peso_tarro');
			$table->float('peso_seco');
		});
	}

	public function down()
	{
		Schema::drop('muestras_suelos_lab');
	}
}