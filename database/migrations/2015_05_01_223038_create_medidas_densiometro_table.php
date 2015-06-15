<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedidasDensiometroTable extends Migration {

	public function up()
	{
		Schema::create('medidas_densiometro', function(Blueprint $table) {
			$table->increments('id');
			$table->float('norte');
			$table->float('sur');
			$table->float('este');
			$table->float('oeste');
			$table->float('factor_cobertura');
			$table->integer('toma_agua_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('medidas_densiometro');
	}
}