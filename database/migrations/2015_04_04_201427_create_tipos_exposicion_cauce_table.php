<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposExposicionCauceTable extends Migration {

	public function up()
	{
		Schema::create('tipos_exposicion_cauce', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 20);
		});
	}

	public function down()
	{
		Schema::drop('tipos_exposicion_cauce');
	}
}