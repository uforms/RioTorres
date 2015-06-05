<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use Excel;

use App\Models\TomaAgua;
use App\Models\ReporteAguas;

class ReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function generateAguasReport(){

		$date = date('Y-m-d_H:i:s');
		Excel::create( $date."_Reporte_Toma_de_Aguas", function ($excel){
			
			// Set the title
		    $excel->setTitle('Reporte de Aguas');

		    // Chain the setters
		    $excel->setCreator(Auth::user()->name)
		          ->setCompany('Proyecto Río Torres');

		    // Call them separately
		    $excel->setDescription('Reporte de toma de tomas de aguas');

		    $excel->sheet('Tomas de Aguas', function($sheet){
		    	 

		    	//$sheet->fromArray(TomaAgua::all());
		    	$tomasAguas = TomaAgua::all();
				$reporteAguas = array();

				//Titles
				$sheet->row(1 , array(
					'id',
					'fecha',
					'Hora Inicial',
					'Hora Final',
					'Sitio',
					'Realizado por',
					'Clima',
					'Curso',
					'Nivel del agua',
					'Mo',
					'Trabajo Ingenieril',
					'Presencia de coliformes',
					'Estructura del banco',
					
					'Observacion de la estructura del banco',
					'Cauce Ancho',
					'Realizado',

				));

				$rowNum = 2;
		    	foreach($tomasAguas as $tomaAgua){
		    		$sheet->row($rowNum, array(
					     $tomaAgua->id, 
					     $tomaAgua->created_at, 
					     $tomaAgua->hora_inicial, 
					     $tomaAgua->hora_final,
					     $tomaAgua->sitio->name,
					     Auth::user()->name,
					     $tomaAgua->generalidad->clima->nombre,
					     $tomaAgua->generalidad->curso->nombre,
					     $tomaAgua->generalidad->parametroNivel->nombre,
					     $tomaAgua->generalidad->mo->nombre,
					     $tomaAgua->generalidad->trabajoIngenieril->nombre,
					     $tomaAgua->coliformes,
					     $tomaAgua->generalidad->estructuraBanco->nombre,

					));

		    		$rowNum++;
		    	}//end foreach

		    	//$sheet->fromArray(TomaAgua::all(), null, 'A1', false, true);
		    });
		    

        //})->store('xlsx' , storage_path('reportesGenerados') , true)->export('xlsx');
		})->export('xlsx');
	
	}

	

}
