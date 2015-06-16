<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
use Excel;

use App\Models\TomaAve;

class AvesReporteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function generarReporte(){
		$input = Request::all();
		$date = date('Y-m-d_H:i:s');
		//return array_values($this->getGeneralidades());

		Excel::create( $date."_Reporte_Toma_de_Aves", function ($excel) use ($input) {

			//Array donde se guarda toda la info
			$data 			= array();
			
			// Obtener datos deseados por el usuario
			// Las generalidades siempre se cargan por default
			if(array_key_exists("generalidades", $input)){
				$generalidades = $this->getGeneralidades();
				array_push($data, $generalidades);
			}
			if(array_key_exists("medidasBiometricas", $input)){
				$medidasBiometricas = $this->getMedidasBiometricas();
				array_push($data, $medidasBiometricas);
			}
			if(array_key_exists("examenGeneral", $input)){
				$examenGeneral = $this->getExamenGeneral();
				array_push($data, $examenGeneral);
			}

			// Chain the setters
		    $excel->setCreator(Auth::user()->name)
		          ->setCompany('Proyecto Río Torres');

		    // Call them separately
		    $excel->setDescription('Reporte de toma de Aves');

		    $excel->sheet('Tomas de Aves', function($sheet) use ($data) {

		    	$titles = array();
		    	$count = 1 ;
		    	foreach($data as $items){
		    		foreach($items as $item){
		    			$titles[]	= $item[0];
		    			$count++;
		    		}
		    	}

		    	$sheet->row(1 , $titles);

		    	$ExcelRow=2;//Inicia en segunda fila del archivo de Excel
				$itemRow =1;
				$tomasAves = TomaAve::all();
				foreach($tomasAves as $tomaAve){ // Para cada linea del archivo
					$row = array(); //Inicializa una nueva fila
					foreach($data as $items){
						foreach($items as $item){
							$row[] = $item[$itemRow];
						}
					}//end foreach
					$sheet->row($ExcelRow , $row);
					$ExcelRow++;
					$itemRow++;
				}//end foreach

		    });//End excel->sheet

		})->export($input['format']);
	}

	public function getGeneralidades(){
		$tomasAves = TomaAve::all();

		$id[]			= "id";
		$especie[]		= "Especie";
		$genero[]		= "Género";
		$anillo[]		= "Número de Anillo";
		$observaciones[]= "Observaciones";

		foreach($tomasAves as $tomaAve){
			$id[]				= $tomaAve->id;
			$especie[]			= $tomaAve->ave->especie;
			$genero[]			= $tomaAve->ave->genero;
			$anillo[]			= $tomaAve->ave->numero_anillo;
			$observaciones[] 	= $tomaAve->observaciones;
		}

		$misGeneralidades = [
			'id',
			'especie',
			'genero',
			'anillo',
			'observaciones'
		];

		return compact($misGeneralidades);

	}

	public function getMedidasBiometricas(){
		$tomasAves = TomaAve::all();

		$peso[]						= "Peso (g)";
		$ala[]						= "Ala (cm)";
		$plumaje[]					= "Plumaje";
		$edad[]						= "Edad";
		$sexo[]						= "Sexo";
		$muestraEndoparasito[]		= "Muestra Endoparásito";
		$muestraEctoparasito[]		= "Muestra Ectoparásito";

		foreach($tomasAves as $tomaAve){
			$peso[]						= $tomaAve->medidaBiometrica->peso;
			$ala[]						= $tomaAve->medidaBiometrica->ala;
			$plumaje[]					= $tomaAve->medidaBiometrica->plumaje;
			$edad[]						= $tomaAve->medidaBiometrica->edad;
			$sexo[]						= $tomaAve->medidaBiometrica->sexo;
			$muestraEndoparasito[]		= $tomaAve->medidaBiometrica->muestra_endoparasito;
			$muestraEctoparasito[]		= $tomaAve->medidaBiometrica->muestra_ectoparasito;
		}

		return compact(
						"peso",
						"ala",
						"plumaje",
						"edad",
						"sexo",
						"muestraEndoparasito",
						"muestraEctoparasito"
);

	}

	public function getExamenGeneral(){
		$tomasAves = TomaAve::all();

		$red[]		= "Red";
		$ol[]		= "Ol";
		$cao[]		= "CaO";
		$q[]		= "Q";
		$ab[]		= "Ab";
		$cl[]		= "Cl";
		$pa[]		= "Pa";
		$al[]		= "Al";

		foreach($tomasAves as $tomaAve){
			$red[]		= $tomaAve->examenGeneral->red;
			$ol[]		= $tomaAve->examenGeneral->ol;
			$cao[]		= $tomaAve->examenGeneral->cao;
			$q[]		= $tomaAve->examenGeneral->q;
			$ab[]		= $tomaAve->examenGeneral->ab;
			$cl[]		= $tomaAve->examenGeneral->cl;
			$pa[]		= $tomaAve->examenGeneral->pa;
			$al[]		= $tomaAve->examenGeneral->al;
		}//end foreach

		return compact("red" , "ol" , "cao" , "q" , "ab" , "cl" , "pa" , "al");

	}


}