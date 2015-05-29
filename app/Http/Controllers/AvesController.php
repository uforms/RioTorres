<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Request;
use Auth;
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
			'id'		=>	'required | integer',
	        'especie' 	=> 	'required | string',
	        'genero'	=> 	'required | string',
	        'fecha'		=>	'required | string',
	        'epoca_id'		=>	'required',
	        'sitio_id'	=>	'required',
	        'red'		=>	'integer',
	        'oj'		=>	'integer',
	        'cao'		=>	'integer',
	        'q'			=>	'integer',
	        'ab'		=>	'integer',
	        'cl'		=>	'integer',
	        'pa'		=>	'integer',
	        'al'		=>	'integer',
	        'peso'		=>	'numeric',
	        'ala'		=>	'numeric',
	        'plumaje'	=>	'numeric',
	        'edad'		=>	'alpha',
	        'sexo'		=>	'alpha',
	        'anillo'	=>	'string',
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

		if(Ave::find(Request::get('id'))){
			$ave = Ave::find(Request::get('id'));
		}else{
			$ave = Ave::create($input);
		}

		$medidaBiometrica 	= MedidaBiometrica::create($input);
		$examenGeneral 		= ExamenGeneral::create($input); 

		//Add new variables to $input array
		$input['ave_id'] 				= Request::get('id');
		$input['medida_biometrica_id']	= $medidaBiometrica->id;
		$input['examen_general_id']		= $examenGeneral->id;
		$input['user_id']				= Auth::user()->id;

		$tomaAve = TomaAve::create($input);

		//get and save image
		$image 			= Request::file('img');
		if($image != null)
		{
			$imageInfo 		= new ImagenAve();
			$cantidadImgs 	= count($ave->imagenesAves()); 
			if($input['imgNombre'] != null)
			{
				$imageInfo->nombre = $input['imgNombre'];
				$imageInfo->url 		= $cantidadImgs."toma".$tomaAve->id."_".$imageInfo->nombre.".jpg"; 
			}else
			{
				$imageInfo->nombre 	= $image->getClientOriginalName();
				$imageInfo->url 	= "toma".$tomaAve->id."_".$imageInfo->nombre;
			}

			$imageInfo->ave_id 		= $ave->id;
			$imageInfo->toma_ave_id = $tomaAve->id;
			$imageInfo->save();

			$image->move('avesPics',$imageInfo->url);
		}
		

		$tomasAves = TomaAve::paginate(5);
		$successMessage = " La toma de ave ha sido creada con éxito.";

		return Redirect::to('/tomas/Aves')
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
