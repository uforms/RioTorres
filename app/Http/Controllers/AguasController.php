<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Request;
use Auth;

use App\Models\Sitio;
use App\Models\Epoca;
use App\Models\CaracterizacionVisual;
use App\Models\Clima;
use App\Models\Curso;
use App\Models\ParametroNivel;
use App\Models\Mo;
use App\Models\TrabajoIngenieril;
use App\Models\EstructuraBanco;
use App\Models\MedidaDensiometro;
use App\Models\FisicoQuimico;
use App\Models\PorcentajeAmbienteAsociado;
use App\Models\PorcentajeVegetacionBanco;
use App\Models\PorcentajeComposicionSustrato;
use App\Models\PorcentajeCondicionSustrato;
use App\Models\PorcentajeExposicionCauce;
use App\Models\PorcentajeTipoRibera;
use App\Models\PresenciaRs;
use App\Models\ContPuntual;
use App\Models\ColorAgua;
use App\Models\OlorAgua;
use App\Models\TomaAgua;
use App\Models\Generalidad;
use App\Models\TipoCauce;
use App\Models\TipoExposicionCauce;
use App\Models\TipoRibera;
use App\Models\TipoAmbienteAsociado;
use App\Models\TipoSustrato;
use App\Models\TipoCondicionSustrato;
use App\Models\Vegetacion;

class AguasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->type = 'Aguas';
		$this->middleware('auth');
	}
	
	public function index()
	{
		$type = 'Aguas';
		$tomasAguas = TomaAgua::orderBy('created_at', 'desc')->paginate(5);
		return view('tomas.index',compact('type','tomasAguas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sitios 					= Sitio::all();
		$epocas 					= Epoca::all();
		$climas 					= Clima::all();
		$cursos 					= Curso::all();
		$tiposCauces 				= TipoCauce::all();
		$parametrosNivel 			= ParametroNivel::all();
		$mos 						= Mo::all();
		$trabajosIngenieriles		= TrabajoIngenieril::all();
		$tiposSustratos				= TipoSustrato::all();
		$tiposCondicionesSustratos 	= TipoCondicionSustrato::all();
		$estructurasBanco			= EstructuraBanco::all();
		$tiposExposicionCauce		= TipoExposicionCauce::all();
		$tiposRiberas				= TipoRibera::all();
		$tiposAmbientesAsociados	= TipoAmbienteAsociado::all();
		$presenciasRs				= PresenciaRs::all();
		$contPuntuales				= ContPuntual::all();
		$coloresAgua				= ColorAgua::all();
		$oloresAgua					= OlorAgua::all();

		return view('tomas.create',compact(
											'sitios',
											'epocas',
											'climas',
											'cursos',
											'tiposCauces',
											'parametrosNivel',
											'mos',
											'trabajosIngenieriles',
											'tiposSustratos',
											'tiposCondicionesSustratos',
											'estructurasBanco',
											'tiposExposicionCauce',
											'tiposRiberas',
											'tiposAmbientesAsociados',
											'contPuntuales',
											'presenciasRs',
											'coloresAgua',
											'oloresAgua'
											))
									->with('type',$this->type);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();

		//validar datos

		//Add variable to input
		$input['user_id']				= Auth::user()->id;

		$tomaAgua = TomaAgua::create($input);

		//Add variable to input
		$input['toma_agua_id']			= $tomaAgua->id;

		$generalidad = Generalidad::create($input);

		//Agregar los datos de composicion del sustrato
		$tiposSustratos = TipoSustrato::all();
		foreach ($tiposSustratos as $tipoSustrato) {
			if(isset($input['composicionSustrato'.$tipoSustrato->id])){
				$porcentajeComposicionSustrato = new PorcentajeComposicionSustrato();

				$porcentajeComposicionSustrato->tipo_sustrato_id 	= $tipoSustrato->id;
				$porcentajeComposicionSustrato->porcentaje 			= $input['composicionSustrato'.$tipoSustrato->id];
				$porcentajeComposicionSustrato->generalidad_id		= $generalidad->id;

				$porcentajeComposicionSustrato->save();
			}
		}

		//Agregar los datos de las condiciones de sustratos
		$tiposCondicionesSustratos 	= TipoCondicionSustrato::all();
		foreach ($tiposCondicionesSustratos as $tipoCondSus) { 
			if(isset($input['condicionSustrato'.$tipoCondSus->id])){
				$porcentajeCondicionSustrato = new PorcentajeCondicionSustrato();

				$porcentajeCondicionSustrato->tipo_condicion_sustrato_id 	= $tipoCondSus->id;
				$porcentajeCondicionSustrato->porcentaje 					= $input['condicionSustrato'.$tipoCondSus->id];
				$porcentajeCondicionSustrato->generalidad_id				= $generalidad->id; 

				$porcentajeCondicionSustrato->save();

			}//end if
		}//end foreach

		//Crea y guarda datos de Vegetacion
		$vegetacion = Vegetacion::create($input);

		//Guardar datos Vegetacion
		$porcentajeVegetacionBanco = new PorcentajeVegetacionBanco();
		$porcentajeVegetacionBanco->vegetacion_id = $vegetacion->id;
		$porcentajeVegetacionBanco->porcentaje    = $input['porcentajeVegetacionBanco'];
		$porcentajeVegetacionBanco->save();

		//Guardar datos porcentajes de exposicion de cauce
		$tiposExposicionCauce = TipoExposicionCauce::all();
		foreach($tiposExposicionCauce as $tipoExpoCauce){
			if(isset($input['tipoExposicionCauce'.$tipoExpoCauce->id])){
				$porcentajeExposicionCauce = new PorcentajeExposicionCauce();

				$porcentajeExposicionCauce->tipo_exposicion_cauce_id 	= $tipoExpoCauce->id;
				$porcentajeExposicionCauce->porcentaje 					= $input['tipoExposicionCauce'.$tipoExpoCauce->id];  
				$porcentajeExposicionCauce->vegetacion_id				= $vegetacion->id;

				$porcentajeExposicionCauce->save();
			}// fin if
		}//fin foreach

		//Guardar datos Tipo en la Ribera
		$tiposRibera = TipoRibera::all();
		foreach($tiposRibera as $tipoRibera){
			if(isset($input['tipoRibera'.$tipoRibera->id])){
				$porcentajeTipoRibera = new PorcentajeTipoRibera();

				$porcentajeTipoRibera->tipo_ribera_id	= $tipoRibera->id;
				$porcentajeTipoRibera->vegetacion_id	= $vegetacion->id;
				$porcentajeTipoRibera->porcentaje 		= $input['tipoRibera'.$tipoRibera->id];

				$porcentajeTipoRibera->save();
			}// fin if
		}// fin foreach

		//Guardar datos ambientes asociados
		$tiposAmbientesAsociados = TipoAmbienteAsociado::all();
		foreach($tiposAmbientesAsociados as $tipoAmbienteAsociado){
			if(isset($input['tipoAmbienteAsociado'.$tipoAmbienteAsociado->id])){
				$porcentajeAmbienteAsociado = new PorcentajeAmbienteAsociado();

				$porcentajeAmbienteAsociado->tipo_ambiente_asociado_id	= $tipoAmbienteAsociado->id;
				$porcentajeAmbienteAsociado->vegetacion_id				= $vegetacion->id;
				$porcentajeAmbienteAsociado->porcentaje 				= $input['tipoAmbienteAsociado'.$tipoAmbienteAsociado->id];

				$porcentajeAmbienteAsociado->save();
			}
		}

		//Guardar Datos Caracterizacion Visual
		$caracterizacionVisual = CaracterizacionVisual::create($input);

		//Datos FisicoQuimicos
		for ($i=1; $i <=3 ; $i++) { 
			$fisicoQuimico = new FisicoQuimico();

			$fisicoQuimico->numero_repeticion 			= $i;
			$fisicoQuimico->toma_agua_id				= $tomaAgua->id;
			$fisicoQuimico->oxigeno_miligramos_litro 	= $input['oxigeno_miligramos_litro'.$i]; 
			$fisicoQuimico->oxigeno_porcentaje			= $input['oxigeno_porcentaje'.$i];
			$fisicoQuimico->temperatura					= $input['temperatura'.$i];
			$fisicoQuimico->ph 							= $input['ph'.$i];
			$fisicoQuimico->conductividad 				= $input['conductividad'.$i];
			$fisicoQuimico->sst 						= $input['sst'.$i];
			$fisicoQuimico->salinidad 					= $input['salinidad'.$i];

			$fisicoQuimico->save();

		}

		//Guardar datos densiometros
		$medidaDensiometro = MedidaDensiometro::create($input);

		return var_dump($generalidad);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
