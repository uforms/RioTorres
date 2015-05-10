<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sitio;
use App\Models\Epoca;
use App\Models\Parcela;
use App\Models\Clima;
use App\Models\Curso;
use App\Models\TipoCauce;
use App\Models\EstructuraBanco;
use App\Models\TipoSustrato;
use App\Models\TipoCondicionSustrato;
use App\Models\Mo;
use App\Models\TrabajoIngenieril;
use App\Models\TipoExposicionCauce;
use App\Models\TipoRibera;
use App\Models\ParametroNivel;

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
		//$this->call('EpocasTableSeeder');
		//$this->call('ParcelasTableSeeder');
		//$this->call('ClimasTableSedder');
		//$this->call('CursoTableSedder');
		//$this->call('TipoCauceTableSedder');
		//$this->call('EstructuraBancoTableSeeder');
		//$this->call('TipoSustratoTableSeeder');
		//$this->call('TipoCondicionSustratoTableSeeder');
		//$this->call('MoTableSeeder');
		//$this->call('TrabajoIngenierilTableSeeder');
		//$this->call('TipoExposicionCauceTableSeeder');
		//$this->call('TipoRiberaTableSeeder');
		$this->call('ParametroNivelTableSeeder');
	}

}

/**
* 
*/
//No info provided by Biologas yet
class ParcelasTableSeeder extends Seeder
{
	public function run(){
		DB::table('parcelas');

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


class ClimasTableSedder extends Seeder
{
	
	public function run(){
		DB::table('climas');

		Clima::create(['nombre' => 'Despejado']);
		Clima::create(['nombre' => 'Soleado']);
		Clima::create(['nombre' => 'Neblina']);
		Clima::create(['nombre' => 'Lluvioso']);
		Clima::create(['nombre' => 'Llovizna']);
	}

}


class CursoTableSedder extends Seeder
{
	
	public function run(){
		DB::table('cursos');

		Curso::create(['nombre' => 'Inicial']);
		Curso::create(['nombre' => 'Medio']);
		Curso::create(['nombre' => 'Bajo']);
	}
}

class TipoCauceTableSedder extends Seeder
{
	
	public function run(){
		DB::table('tipos_cauces');

		TipoCauce::create(['nombre' => 'Ancho']);
		TipoCauce::create(['nombre' => 'Profundidad']);
		TipoCauce::create(['nombre' => 'Pendiente']);
	}
}

class EstructuraBancoTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('estructuras_banco');

		EstructuraBanco::create(['nombre' => 'Natural']);
		EstructuraBanco::create(['nombre' => 'Con estructuras']);
	}
}

class TipoSustratoTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('tipos_sustratos');

		TipoSustrato::create(['nombre' => 'Piedras grandes']);
		TipoSustrato::create(['nombre' => 'Arena gruesa']);
		TipoSustrato::create(['nombre' => 'Arcilloso']);
		TipoSustrato::create(['nombre' => 'Piedras medias']);
		TipoSustrato::create(['nombre' => 'Arena fina']);
		TipoSustrato::create(['nombre' => 'Lodoso']);
	}
}

class TipoCondicionSustratoTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('tipos_condiciones_sustratos');

		TipoCondicionSustrato::create(['nombre' => 'Limpio']);
		TipoCondicionSustrato::create(['nombre' => 'Cubierto']);
	}
}

class MoTableSeeder extends Seeder
{
	
	public function run(){
		DB::table('mos');

		Mo::create(['nombre' => 'Hojarasca']);
		Mo::create(['nombre' => 'Gruesa']);
		Mo::create(['nombre' => 'Fina']);
		Mo::create(['nombre' => 'No']);
	}
}

class TrabajoIngenierilTableSeeder extends Seeder
{
	public function run(){
		DB::table('trabajos_ingenieriles');

		TrabajoIngenieril::create(['nombre' => 'Canalizado']);
		TrabajoIngenieril::create(['nombre' => 'Regulado']);
		TrabajoIngenieril::create(['nombre' => 'Extracción']);
		TrabajoIngenieril::create(['nombre' => 'Estructurales']);
	}
}

class TipoExposicionCauceTableSeeder extends Seeder
{
	public function run(){
		DB::table('tipos_exposicion_cauce');

		TipoExposicionCauce::create(['nombre' => 'Expuesta']);
		TipoExposicionCauce::create(['nombre' => 'Semiabierta']);
		TipoExposicionCauce::create(['nombre' => 'Cruce de copas']);
	}
}

class TipoRiberaTableSeeder extends Seeder
{
	public function run(){
		DB::table('tipos_riberas');

		TipoRibera::create(['nombre' => 'Natural del sitio']);
		TipoRibera::create(['nombre' => 'Agrícola']);
		TipoRibera::create(['nombre' => 'Jardín']);
		TipoRibera::create(['nombre' => 'Desnudo']);
	}
}

class ParametroNivelTableSeeder extends Seeder
{
	public function run(){
		DB::table('parametros_nivel');

		ParametroNivel::create(['nombre' => 'Marea']);
		ParametroNivel::create(['nombre' => 'Precipitación']);
		ParametroNivel::create(['nombre' => 'Bombeo']);
		ParametroNivel::create(['nombre' => 'Inundación']);
	}
}