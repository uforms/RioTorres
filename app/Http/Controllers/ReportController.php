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
	
	public function generate(){
		Excel::create('Prueba de excel2', function ($excel){
			
			// Set the title
		    $excel->setTitle('Reporte de ...');

		    // Chain the setters
		    $excel->setCreator(Auth::user()->name)
		          ->setCompany('Proyecto Río Torres');

		    // Call them separately
		    $excel->setDescription('Reporte de toma de ...');

		    $excel->sheet('Reporte de Tomas', function($sheet){
		    	$sheet->setPageMargin([
		    		1.25 , 5.30 , 5.25 , 5.30
		    	]);
		        $sheet->protect('password');  

		    	$sheet->fromArray(TomaAgua::all());
		    });
		    

        //})->store('xlsx' , storage_path('reportesGenerados') , true)->export('xlsx');
		})->export('xlsx');
		
	}

}
