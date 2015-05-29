<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedidasBiometricasTable extends Migration {

	public function up()
	{
		Schema::create('medidas_biometricas', function(Blueprint $table) {
			$table->increments('id');
			$table->float('peso', 8,2);
			$table->float('ala', 8,2);
			$table->integer('plumaje');
			$table->string('edad', 2);
			$table->string('sexo', 2);
			$table->string('muestra_endoparasito',4);
			$table->string('muestra_ectoparasito',4);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('medidas_biometricas');
	}
}