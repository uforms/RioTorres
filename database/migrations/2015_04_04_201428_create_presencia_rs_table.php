<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresenciaRsTable extends Migration {

	public function up()
	{
		Schema::create('presencia_rs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('presencia_rs');
	}
}