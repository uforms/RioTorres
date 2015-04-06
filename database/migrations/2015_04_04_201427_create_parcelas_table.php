<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParcelasTable extends Migration {

	public function up()
	{
		Schema::create('parcelas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sitio_id')->unsigned();
			$table->integer('cantidad_estacas');
			$table->integer('numero_parcela');
			$table->text('comentario')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('parcelas');
	}
}