<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

//Models to use
use App\Models\Sitio;
use App\Models\Epoca;
use App\Models\Ave;

//custom functions
use Publico\Custom\createAve;


class TomasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($type)
	{

		return view('tomas.index',compact('type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($type)
	{
		if($type == 'Aves'){
			$sitios = Sitio::all();
			$epocas = Epoca::all();
			return view('tomas.create',compact('type','sitios','epocas'));
		}
		else if($type == 'Aguas'){

		}
		else if($type == 'Suelos'){

		}
		else return "Error, no hay ninguna actividad con el nombre de \"".$type."\"";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

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
