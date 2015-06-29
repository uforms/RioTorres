<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Request;
use Auth;
use DB;

//Models to use
use App\Models\Ave;
use App\Models\MedidaBiometrica;
use App\Models\ExamenGeneral;
use App\Models\TomaAve;
use App\Models\Sitio;
use App\Models\Epoca;
use App\Models\ImagenAve;

class AvesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $type;

	public function __construct()
	{
		$this->type = 'Aves';
		$this->middleware('auth');
	}

	public function index()
	{
		$tomasAves = TomaAve::orderBy('created_at', 'desc')->paginate(5);
		return view('tomas.index',compact('tomasAves'))->with('type',$this->type);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sitios = Sitio::all();
		$epocas = Epoca::all();
		return view('tomas.create',compact('sitios','epocas'))->with('type',$this->type);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$input = Request::all();
		
		//Validacion de los datos
		$validator = Validator::make($input, [
	        'especie' 				=> 	'required | string',
	        'genero'				=> 	'required | string',
	        'fecha'					=>	'required | string',
	        'epoca_id'				=>	'required',
	        'sitio_id'				=>	'required',
	        'red'					=>	'integer',
	        'oj'					=>	'integer',
	        'cao'					=>	'integer',
	        'q'						=>	'integer',
	        'ab'					=>	'integer',
	        'cl'					=>	'integer',
	        'pa'					=>	'integer',
	        'al'					=>	'integer',
	        'peso'					=>	'numeric',
	        'ala'					=>	'numeric',
	        'plumaje'				=>	'numeric',
	        'edad'					=>	'alpha',
	        'sexo'					=>	'alpha',
	        'numero_anillo'			=>	'integer',
	        'muestra_endoparasito' 	=> 'string',
	        'muestra_ectoparasito' 	=> 'string',
	        'observaciones' 		=>	'string',
    	]);
		
    	if ($validator->fails())
	    {
	    	$errors = $validator->errors();
	        return Redirect::back()
	        						->with('errors',$errors)
	        						->withInput();
	    }

	    // Identifica si es una re-muestreo para NO duplicar el Ave
	    if(Request::get('numero_anillo') ) {
	    	$numeroAnillo = Request::get('numero_anillo');
	    	//Ave no migratoria
	    	if(Ave::where('numero_anillo' , '=' , $numeroAnillo)->exists() ){
				$ave = Ave::where('numero_anillo' , '=' , $numeroAnillo)->firstOrFail();
			}else{
				$ave = Ave::create($input);
			}
	    }else {
	    	//Ave migratoria
	    	/*
	    	| To fix
	    	| El problema que existe acá es que no hay forma de saber
	    	| si el ave migratoria es recurrente o no, esto se 
	    	| debería de conversar y tratar de resolver
	    	*/
	    	$ave = Ave::create($input);
	    }
	    
	    

		$medidaBiometrica 	= MedidaBiometrica::create($input);
		$examenGeneral 		= ExamenGeneral::create($input); 

		//Add new variables to $input array
		$input['ave_id'] 				= $ave->id;
		$input['medida_biometrica_id']	= $medidaBiometrica->id;
		$input['examen_general_id']		= $examenGeneral->id;
		$input['user_id']				= Auth::user()->id;

		$tomaAve = TomaAve::create($input);

		//get and save image
		$cantidadImagenesPost = Request::get('cantidadImagenesPost');
		for ($instanciaAve=1; $instanciaAve <=$cantidadImagenesPost ; $instanciaAve++) { 

			$image 			= Request::file('img'.$instanciaAve);
			if($image != null)
			{
				$imageInfo 		= new ImagenAve();
				$imgCount		= count($tomaAve->imagenesAves->count());
				//Getting date to add to pictures url
				$date = date('Y-m-d_H-i-s');

				//To Fix, nombres de las aves para que NUNCA queden igual

				//Si se ingresa un nombre especifico para el ave
				if($input['imgNombre'.$instanciaAve] != null)
				{
					$imageInfo->nombre 		= $input['imgNombre'.$instanciaAve];
					$imageInfo->url 		= $date."_"."ave".$instanciaAve."_"."toma".$tomaAve->id."_".$imageInfo->nombre.".jpg"; 
				}else //Si no se ingresa algun nombre especifico para el ave
				{
					$imageInfo->nombre 	= $image->getClientOriginalName();
					$imageInfo->url 	= $date."_"."ave".$instanciaAve."_"."toma".$tomaAve->id."_".$imageInfo->nombre;
				}

				$imageInfo->ave_id 		= $ave->id;
				$imageInfo->toma_ave_id = $tomaAve->id;
				$imageInfo->save();

				$image->move('avesPics',$imageInfo->url);
			}
		}//end for
		
		

		$tomasAves = TomaAve::paginate(5);
		$successMessage = " La toma de ave ha sido creada con éxito.";

		return Redirect::to('/tomas/Aves')
										->with('type',$this->type)
										->with('successMessage',$successMessage);

		

	}

	public function Remuestra($numeroAnillo){
		if(Ave::where('numero_anillo' , '=' , $numeroAnillo)->exists()){
			$ave = Ave::where('numero_anillo' , '=' , $numeroAnillo)->first();
			
			$cantidadTomas = TomaAve::where('ave_id' , '=' , $ave->id)->count();
			
			return compact('ave','cantidadTomas');
		}else{
			return "";
		}

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

		$sitios  				= Sitio::all();
		$epocas  				= Epoca::all();
		$tomaAve 				= TomaAve::find($id); 		
		$examenGeneral 			= ExamenGeneral::where('id' , '=' , $tomaAve->examen_general_id)->first();
		$medidasBiometricas 	= MedidaBiometrica::where('id' , '=' , $tomaAve->medida_biometrica_id)->first();
		$ave 					= Ave::where('id' ,'=' , $tomaAve->ave_id)->first();
		$aves 					= Ave::all();

		return view('tomas.update',compact(
											'sitios',
											'epocas',
											'id',
											'tomaAve',
											'examenGeneral',
											'medidasBiometricas',
											'ave',
											'aves'
											))->with('type',$this->type);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input 					= Request::all();
		$tomaAve 				= TomaAve::find($input['tomaId']);
		$examenGeneral 			= ExamenGeneral::find($tomaAve->examen_general_id);
		$medidaBiometrica 		= MedidaBiometrica::find($tomaAve->medida_biometrica_id);
		$ave 					= Ave::find($tomaAve->ave_id);
		$imagenesAves 			= ImagenAve::where('toma_ave_id','=', $tomaAve->id)->get();

		$tomaAve-> fill($input);
		$examenGeneral->fill($input);
		$medidaBiometrica->fill($input);

		$tomaAve->save();
		$examenGeneral->save();
		$medidaBiometrica->save();

		//Delete old Aves
		foreach ($imagenesAves as $imagenAve) {
			if(isset($input['deleteImg_'.$imagenAve->id])){
				$imagenAve->delete();
			}
		}


		//Add new Ave
		$cantidadImagenesPost = Request::get('cantidadImagenesPost');
		for ($instanciaAve=1; $instanciaAve <=$cantidadImagenesPost ; $instanciaAve++) { 

			$image 			= Request::file('img'.$instanciaAve);
			if($image != null)
			{
				$imageInfo 		= new ImagenAve();
				$imgCount		= count($tomaAve->imagenesAves->count());
				//Getting date to add to pictures url
				$date = date('Y-m-d_H-i-s');

				//To Fix, nombres de las aves para que NUNCA queden igual

				//Si se ingresa un nombre especifico para el ave
				if($input['imgNombre'.$instanciaAve] != null)
				{
					$imageInfo->nombre 		= $input['imgNombre'.$instanciaAve];
					$imageInfo->url 		= $date."_"."ave".$instanciaAve."_"."toma".$tomaAve->id."_".$imageInfo->nombre.".jpg"; 
				}else //Si no se ingresa algun nombre especifico para el ave
				{
					$imageInfo->nombre 	= $image->getClientOriginalName();
					$imageInfo->url 	= $date."_"."ave".$instanciaAve."_"."toma".$tomaAve->id."_".$imageInfo->nombre;
				}

				$imageInfo->ave_id 		= $ave->id;
				$imageInfo->toma_ave_id = $tomaAve->id;
				$imageInfo->save();

				$image->move('avesPics',$imageInfo->url);
			}
		}//end for



		$successMessage = "La toma de Ave #".$tomaAve->id." ha sido actualizada con éxito.";
		return Redirect::to('/tomas/Aves')
										->with('type',$this->type)
										->with('successMessage',$successMessage);
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
			$tomaAve 			= TomaAve::find($id);
			$medidaBiometrica 	= MedidaBiometrica::find($tomaAve->medida_biometrica_id);
			$examenGeneral 		= ExamenGeneral::find($tomaAve->examen_general_id);

			$tomaAve->delete();
			$medidaBiometrica->delete();
			$examenGeneral->delete();
		});

		$successMessage = "La toma de Ave #".$id." ha sido eliminada con éxito.";
		return Redirect::back()->with('successMessage',$successMessage);
	}


}
