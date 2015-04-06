<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sitio;
use App\Models\Epoca;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//$this->call('SitioTableSeeder');
		$this->call('EpocasTableSeeder');
	}

}

class SitioTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('sitios');

		Sitio::create(['name' => 'MP4']);
		Sitio::create(['name' => 'MS3']);
		Sitio::create(['name' => 'CJ2']);
		Sitio::create(['name' => 'PE1']);

		Sitio::create(['name' => 'Mata de Plátano']);
		Sitio::create(['name' => 'Spirogyra']);
		Sitio::create(['name' => 'Conejos']);
		Sitio::create(['name' => 'Electronia']);
	}
}

class EpocasTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('epocas');

		Epoca::create(['nombre' => 'Seca' 		, 'codigo' => 'S']);
		Epoca::create(['nombre' => 'Transición' , 'codigo' => 'T']);
		Epoca::create(['nombre' => 'Lluviosa' 	, 'codigo' => 'LL']);
	}
}
