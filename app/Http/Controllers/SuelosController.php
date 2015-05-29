<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Models
use App\Models\Sitio;
use App\Models\Parcela;

class SuelosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $type;

	public function __construct()
	{
		$this->type = 'Suelos';
		$this->middleware('auth');
	}
	
	public function index()
	{
		$type = 'Suelos';
		return view('tomas.index',compact('type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sitios = Sitio::all();
		return view('tomas.create',compact('sitios'))->with('type',$this->type);
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

	public function getParcelas($sitio_id){
		$parcelas = Parcela::where('sitio_id' , '=' , $sitio_id)->get();
		return $parcelas;
	}

	public function getParcela($parcela_id){
		$parcela = Parcela::Find($parcela_id);
		return $parcela;
	}

}
