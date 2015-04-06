<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMosTable extends Migration {

	public function up()
	{
		Schema::create('mos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 255);
		});
	}

	public function down()
	{
		Schema::drop('mos');
	}
}