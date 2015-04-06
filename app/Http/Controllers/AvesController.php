<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
//Models to use
use App\Models\Ave;
use App\Models\MedidaBiometrica;
use App\Models\ExamenGeneral;
use App\Models\TomaAve;
use App\Models\Sitio;
use App\Models\Epoca;

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
		$tomasAves = TomaAve::paginate(5);
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
		//validar campos

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

		TomaAve::create($input);

		return $input;

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
