<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use Excel;

use App\Models\TomaAgua;

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
		    $excel->setTitle('Reporte de ...');

		    // Chain the setters
		    $excel->setCreator(Auth::user()->name)
		          ->setCompany('Proyecto Río Torres');

		    // Call them separately
		    $excel->setDescription('Reporte de toma de tomas de aguas');

		    $excel->sheet('Tomas de Aguas', function($sheet){
		    	 

		    	$sheet->fromArray(TomaAgua::all());
		    });
		    

        //})->store('xlsx' , storage_path('reportesGenerados') , true)->export('xlsx');
		})->export('xlsx');
		
	}

}
