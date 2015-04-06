<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClimasTable extends Migration {

	public function up()
	{
		Schema::create('climas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('climas');
	}
}