<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTomasSuelosTable extends Migration {

	public function up()
	{
		Schema::create('tomas_suelos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parcela_id')->unsigned();
			$table->integer('sitio_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->float('total_sedimentos_muestra');
			$table->float('total_sedimentos_seco');
			$table->text('observaciones')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tomas_suelos');
	}
}