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
use App\Models\TipoAmbienteAsociado;
use App\Models\PresenciaRs;
use App\Models\ContPuntual;
use App\Models\ColorAgua;
use App\Models\OlorAgua;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('SitioTableSeeder');
		$this->call('EpocasTableSeeder');
		$this->call('ParcelasTableSeeder');
		$this->call('ClimasTableSedder');
		$this->call('CursoTableSedder');
		$this->call('TipoCauceTableSedder');
		$this->call('EstructuraBancoTableSeeder');
		$this->call('TipoSustratoTableSeeder');
		$this->call('TipoCondicionSustratoTableSeeder');
		$this->call('MoTableSeeder');
		$this->call('TrabajoIngenierilTableSeeder');
		$this->call('TipoExposicionCauceTableSeeder');
		$this->call('TipoRiberaTableSeeder');
		$this->call('ParametroNivelTableSeeder');
		$this->call('TipoAmbienteAsociadoTableSeeder');
		$this->call('PresenciaRSTableSeeder');
		$this->call('ContPuntualTableSeeder');
		$this->call('ColorAguaTableSeeder');
		$this->call('OlorAguaTableSeeder');
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

class TipoAmbienteAsociadoTableSeeder extends Seeder
{
	public function run(){
		DB::table('tipos_ambientes_asociados');

		TipoAmbienteAsociado::create(['nombre' => 'Naturales']);
		TipoAmbienteAsociado::create(['nombre' => 'Agrícola']);
		TipoAmbienteAsociado::create(['nombre' => 'Industrial']);
		TipoAmbienteAsociado::create(['nombre' => 'Residencial']);
	}
}

class PresenciaRSTableSeeder extends Seeder
{
	public function run(){
		DB::table('presencia_rs');

		PresenciaRs::create(['nombre' => 'Espumas']);
		PresenciaRs::create(['nombre' => 'Aceites']);
		PresenciaRs::create(['nombre' => 'Organismos muertos']);
		PresenciaRs::create(['nombre' => 'Residuos  sólidos']);
		PresenciaRs::create(['nombre' => 'Otro']);
	}
}

class ContPuntualTableSeeder extends Seeder
{
	public function run(){
		DB::table('cont_puntual');

		ContPuntual::create(['nombre' => 'Doméstica']);
		ContPuntual::create(['nombre' => 'Industrial']);
		ContPuntual::create(['nombre' => 'Agrícola']);
		ContPuntual::create(['nombre' => 'Desagües']);
		ContPuntual::create(['nombre' => 'Otro']);
	}
}

class ColorAguaTableSeeder extends Seeder
{
	public function run(){
		DB::table('colores_agua');

		ColorAgua::create(['nombre' => 'Transparente']);
		ColorAgua::create(['nombre' => 'Grisácea']);
		ColorAgua::create(['nombre' => 'Celeste']);
		ColorAgua::create(['nombre' => 'Negra']);
		ColorAgua::create(['nombre' => 'Otro']);
	}
}

class OlorAguaTableSeeder extends Seeder
{
	public function run(){
		DB::table('olores_agua');

		OlorAgua::create(['nombre' => 'Natural']);
		OlorAgua::create(['nombre' => 'Aguas grises']);
		OlorAgua::create(['nombre' => 'Aguas negras']);
		OlorAgua::create(['nombre' => 'In. Det.']);
		OlorAgua::create(['nombre' => 'Otro']);
	}
}