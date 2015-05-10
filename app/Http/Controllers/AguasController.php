<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Sitio;
use App\Models\Epoca;
use App\Models\Clima;
use App\Models\Curso;
use App\Models\TipoCauce;
use App\Models\ParametroNivel;
use App\Models\Mo;
use App\Models\TrabajoIngenieril;
use App\Models\TipoSustrato;
use App\Models\TipoCondicionSustrato;

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
		return view('tomas.index',compact('type'));
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
											'tiposCondicionesSustratos'
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
		//
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
