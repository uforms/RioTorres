<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValoresCaucesTable extends Migration {

	public function up()
	{
		Schema::create('valores_cauces', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('generalidad_id')->unsigned();
			$table->integer('tipo_cauce_id')->unsigned();
			$table->float('valor');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('valores_cauces');
	}
}