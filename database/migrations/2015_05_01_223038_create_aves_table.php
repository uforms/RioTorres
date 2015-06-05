<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvesTable extends Migration {

	public function up()
	{
		Schema::create('aves', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('numero_anillo');
			$table->string('especie', 50);
			$table->string('genero', 50);
			$table->string('migratoria',2);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('aves');
	}
}