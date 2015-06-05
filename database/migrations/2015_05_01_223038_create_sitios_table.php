<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitiosTable extends Migration {

	public function up()
	{
		Schema::create('sitios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 60);
			$table->float('lat', 10,6)->nullable();
			$table->float('lng', 10,6)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('address', 80);
		});
	}

	public function down()
	{
		Schema::drop('sitios');
	}
}