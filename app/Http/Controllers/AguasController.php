<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Request;
use Auth;
use DB;

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
use App\Models\ValorCauce;
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
		return view('tomas.index',compact('type','tomasAguas' ));
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
		$validator = Validator::make($input, [

				'hora_inicial'					=>	'required | string',
				'hora_final'					=>	'required | string',
				'fecha'							=>	'required | string',
				'sitio_id'						=>	'required',
				'lat'							=>	'required',
				'lng'							=>	'required',
				'temperatura'					=>	'numeric',
				'viento'						=>	'numeric',
				'humedad'						=>	'numeric',
				'clima_id'						=>	'integer',
				'curso_id'						=>	'integer',
				'parametro_nivel_id'			=>	'integer',
				'mo_id'							=>	'integer',
				'trabajo_ingenieril_id'			=>	'integer',
				'estructura_banco_id'			=>	'integer',
				'observacion_estructura_banco'	=>	'string',
    	]);

    	if ($validator->fails())
	    {
	    	$errors = $validator->errors();
	        return Redirect::back()
	        						->with('errors',$errors)
	        						->withInput();
	    }


		//Add variable to input
		$input['user_id']				= Auth::user()->id;

		$tomaAgua = TomaAgua::create($input);

		//Add variable to input
		$input['toma_agua_id']			= $tomaAgua->id;

		$generalidad = Generalidad::create($input);

		//Agrega los datos de los valores del cauce
		$tiposCauces = TipoCauce::all();
		foreach($tiposCauces as $tipoCauce){
			if(isset($input['cauce'.$tipoCauce->id])){
				$valorCauce = new ValorCauce();

				$valorCauce->generalidad_id	=	$generalidad->id;
				$valorCauce->tipo_cauce_id 	=	$tipoCauce->id;
				$valorCauce->valor 			= 	$input['cauce'.$tipoCauce->id];

				$valorCauce->save();
			}
		}

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
		$cantTomasFisicoQuimico = $input['cantTomasFisicoQuimicos'];
		for ($i=1; $i <=$cantTomasFisicoQuimico ; $i++) { 
			$fisicoQuimico = new FisicoQuimico();

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

		$successMessage = " La toma de aguas ha sido creada con éxito.";
		return Redirect::to('/tomas/Aguas')
										->with('type',$this->type)
										->with('successMessage',$successMessage);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$type 						= 'Aguas';
		$tomaAgua 					= TomaAgua::find($id);
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

		return view('tomas.update',compact(
											'type',
											'tomaAgua',
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		//ToFix not catching Exceptions
		try {
			$input 							= Request::all();
			$tiposCauces 					= TipoCauce::all();
			$tiposSustratos 				= TipoSustrato::all();
			$tiposCondicionesSustratos 		= TipoCondicionSustrato::all();
			$tiposExposicionesCauce			= TipoExposicionCauce::all();
			$tiposAmbientesAsociados 		= TipoAmbienteAsociado::all();
			$tiposRiberas 					= TipoRibera::all();

			// Obteniendo modelos a modificar
			$tomaAgua 						= TomaAgua::find($input['tomaId']);
			$generalidades 					= Generalidad::where('toma_agua_id' , '=' ,$tomaAgua->id  )->firstOrFail();
			$vegetacion 					= Vegetacion::where('toma_agua_id' , '=' , $tomaAgua->id  )->firstOrFail();
			$caracterizacionVisual			= CaracterizacionVisual::where('toma_agua_id' , '=' , $tomaAgua->id)->firstOrFail();
			$medidaDensiometro 				= MedidaDensiometro::where('toma_agua_id' , '=' , $tomaAgua->id)->firstOrFail();
			$fisicoQuimicos 				= FisicoQuimico::where('toma_agua_id' , '=' , $tomaAgua->id)->get();

		} catch (Exception $e) {
			return "Error";
		}

		
		/*
		|	Modificacion de Modelos con valores multiples
		*/

		//Obteniendo valores de los tipos de cauces
		foreach($tiposCauces as $tipoCauce){
			if(isset($input['cauce'.$tipoCauce->id])){
				//Cargar
				$valorCauce = ValorCauce::where('tipo_cauce_id'  , '=' , $tipoCauce->id)
										->where('generalidad_id' , '=' , $tomaAgua->generalidad->id)
										->firstOrFail();
				//Actualiza
				$valorCauce->valor 			= 	$input['cauce'.$tipoCauce->id];
				//Acumula cambios
				$valoresCauces[] = $valorCauce;

			}
		}//end foreach

		//Obteniendo valores de Composicion del sustrato
		foreach($tiposSustratos as $tipoSustrato){
			if(isset($input['composicionSustrato'.$tipoSustrato->id])){
				//Carga
				$porcentajeComposicionSustrato = PorcentajeComposicionSustrato::where('tipo_sustrato_id' , '=' , $tipoSustrato->id)
												->where('generalidad_id' , '=' , $tomaAgua->generalidad->id)
												->firstOrFail();

				//Actualizar el modelo
				$porcentajeComposicionSustrato->porcentaje 			= $input['composicionSustrato'.$tipoSustrato->id];
				//Acumula cambios
				$porcentajesComposicionesSustratos[] = $porcentajeComposicionSustrato;
			}
		}//end foreach

		//Obteniendo valores Condicion sustrato
		foreach($tiposCondicionesSustratos as $TipoCondicionSustrato){
			if(isset($input['condicionSustrato'.$TipoCondicionSustrato->id])){

				$porcentajeCondicionSustrato = PorcentajeCondicionSustrato::where('tipo_condicion_sustrato_id' , '=' , $TipoCondicionSustrato->id)
																		->where('generalidad_id' , '=' ,$tomaAgua->generalidad->id)
																		->firstOrFail();

				$porcentajeCondicionSustrato->porcentaje 					= $input['condicionSustrato'.$TipoCondicionSustrato->id];

				$porcentajesCondicionesSustratos[] = $porcentajeCondicionSustrato;

			}//end if
		}

		//Obteniendo valores de los porcentajes de la exposicion del cauce
		foreach($tiposExposicionesCauce as $tipoExposicionCauce){
			if(isset($input['tipoExposicionCauce'.$tipoExposicionCauce->id])){

				$porcentajeExposicionCauce = PorcentajeExposicionCauce::where('tipo_exposicion_cauce_id' , '=' , $tipoExposicionCauce->id)
																	->where('vegetacion_id' , '=' ,$vegetacion->id)
																	->firstOrFail();

				$porcentajeExposicionCauce->porcentaje 					= $input['tipoExposicionCauce'.$tipoExposicionCauce->id];  

				$porcentajesExposicionesCauce[] = $porcentajeExposicionCauce;
			}// fin if
		}

		//Obteniendo valores de tipos de riberas
		foreach($tiposRiberas as $tipoRibera){
			if(isset($input['tipoRibera'.$tipoRibera->id])){
				$porcentajeTipoRibera = PorcentajeTipoRibera::where('tipo_ribera_id' , '=' , $tipoRibera->id)
															->where('vegetacion_id' , '=' , $vegetacion->id)
															->firstOrFail();

				$porcentajeTipoRibera->porcentaje 		= $input['tipoRibera'.$tipoRibera->id];

				$porcentajesTiposRiberas[] = $porcentajeTipoRibera;
				
			}// fin if
		}

		//Obteniendo valores de los porcentajes de los ambientes asociados
		foreach($tiposAmbientesAsociados as $tipoAmbienteAsociado){
			if(isset($input['tipoAmbienteAsociado'.$tipoAmbienteAsociado->id])){
				$porcentajeAmbienteAsociado = PorcentajeAmbienteAsociado::where('tipo_ambiente_asociado_id' ,'=' , $tipoAmbienteAsociado->id)
																		->where('vegetacion_id' , '=' , $vegetacion->id)
																		->firstOrFail();

				$porcentajeAmbienteAsociado->porcentaje 				= $input['tipoAmbienteAsociado'.$tipoAmbienteAsociado->id];

				$porcentajesAmbientesAsociados[] = $porcentajeAmbienteAsociado;
			}
		}

		//Datos FisicoQuimicos
		$cantTomasFisicoQuimico = $input['cantTomasFisicoQuimicos'];
		for ($i=1; $i <=$cantTomasFisicoQuimico ; $i++) { 
			$fisicoQuimico = FisicoQuimico::find($input['fisicoQuimico_id'.$i]);

			$fisicoQuimico->toma_agua_id				= $tomaAgua->id;
			$fisicoQuimico->oxigeno_miligramos_litro 	= $input['oxigeno_miligramos_litro'.$i]; 
			$fisicoQuimico->oxigeno_porcentaje			= $input['oxigeno_porcentaje'.$i];
			$fisicoQuimico->temperatura					= $input['temperatura'.$i];
			$fisicoQuimico->ph 							= $input['ph'.$i];
			$fisicoQuimico->conductividad 				= $input['conductividad'.$i];
			$fisicoQuimico->sst 						= $input['sst'.$i];
			$fisicoQuimico->salinidad 					= $input['salinidad'.$i];

			$fisicosQuimicos[] = $fisicoQuimico;

		}

		/*
		|	Modificacion de Modelos con valores simples (solo uno)
		*/
		$tomaAgua 				->fill($input);
		$generalidades 			->fill($input);
		$vegetacion 			->fill($input);
		$caracterizacionVisual 	->fill($input);
		$medidaDensiometro 		->fill($input);


		/*
		|	Guardando modelos
		*/
		DB::transaction(function() use (
											$tomaAgua,
											$generalidades,
											$vegetacion,
											$caracterizacionVisual,
											$medidaDensiometro,
											$valoresCauces,
											$porcentajesComposicionesSustratos,
											$porcentajesCondicionesSustratos,
											$porcentajesExposicionesCauce,
											$porcentajesTiposRiberas,
											$porcentajesAmbientesAsociados,
											$fisicosQuimicos
										) 
		{

				$tomaAgua 					->save();
				$generalidades 				->save();
				$vegetacion 				->save();
				$caracterizacionVisual 		->save();
				$medidaDensiometro 			->save();

				foreach($valoresCauces as $valorCauce){
					$valorCauce->save();
				}
				foreach($porcentajesComposicionesSustratos as $porcentajeComposicionSustrato){
					$porcentajeComposicionSustrato->save();
				}
				foreach($porcentajesCondicionesSustratos as $porcentajeCondicionSustrato){
					$porcentajeCondicionSustrato->save();
				}
				foreach($porcentajesExposicionesCauce as $porcentajeExposicionCauce){
					$porcentajeExposicionCauce->save();
				}
				foreach($porcentajesTiposRiberas as $porcentajeTipoRibera){
					$porcentajeTipoRibera->save();
				}
				foreach($porcentajesAmbientesAsociados as $porcentajeAmbienteAsociado){
						$porcentajeAmbienteAsociado->save();
				}
				foreach ($fisicosQuimicos as $fisicoQuimico) {
					$fisicoQuimico->save();
				}

		});//End DB::transaction

		



		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::transaction(function() use($id) {
		$tomaAgua 							= TomaAgua::find($id)->firstOrFail();
		$generalidad 						= Generalidad::where('toma_agua_id' , '=' ,$id  )->firstOrFail();
		$vegetacion 						= Vegetacion::where('toma_agua_id' , '=' , $id  )->firstOrFail();
		$caracterizacionVisual				= CaracterizacionVisual::where('toma_agua_id' , '=' , $id)->firstOrFail();
		$medidaDensiometro 					= MedidaDensiometro::where('toma_agua_id' , '=' , $id)->firstOrFail();

		$fisicoQuimicos 					= FisicoQuimico::where('toma_agua_id' , '=' , $id)->delete();
		$porcentajesAmbientesAsociados		= PorcentajeAmbienteAsociado::where('vegetacion_id' , '=' , $vegetacion->id)->delete();
		$porcentajesTiposRiberas			= PorcentajeTipoRibera::where('vegetacion_id' , '=' ,$vegetacion->id)->delete();
		$porcentajesExposicionCauce 		= PorcentajeExposicionCauce::where('vegetacion_id' , '=' ,$vegetacion->id)->delete();
		$valoresCauces						= ValorCauce::where('generalidad_id' ,'=' , $generalidad->id)->delete();
		$porcentajesCondicionesSustratos	= PorcentajeCondicionSustrato::where('generalidad_id' , '=' , $generalidad->id)->delete();
		$porcentajesComposicionesSustratos	= PorcentajeComposicionSustrato::where('generalidad_id' , '=' , $generalidad->id)->delete();

		$tomaAgua 							->delete();
		$generalidad 						->delete();
		$vegetacion 						->delete();
		$caracterizacionVisual				->delete();
		$medidaDensiometro 					->delete();


		});

		$successMessage = "La toma #".$id." ha sido eliminada con éxito.";
		return Redirect::back()->with('successMessage',$successMessage);
	}

}
