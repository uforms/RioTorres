<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
use Excel;

use App\Models\TomaAgua;
use App\Models\ReporteAguas;
use App\Models\TipoCauce;

class AguasReporteController extends Controller {

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
		//return array_values($this->getFisicoQuimicos());

		Excel::create( $date."_Reporte_Toma_de_Aguas", function ($excel) use ($input) {
			

			$generalidades 	= array();
			$vegetacion		= array();

			//Array donde se guarda toda la info
			$data 			= array();
			
			// Obtener datos deseados por el usuario
			// Las generalidades siempre se cargan por default
			if(array_key_exists("generalidades", $input)){
				$generalidades = $this->getGeneralidades();
				array_push($data, $generalidades);
			}
			
			if(array_key_exists("vegetacion" , $input)){
				$vegetacion = $this->getVegetacion();
				array_push($data , $vegetacion);
			}
			if(array_key_exists("caracterizacionVisual" , $input)){
				$caracterizacionVisual = $this->getCaracterizacionVisual();
				array_push($data , $caracterizacionVisual);
			}
			if(array_key_exists("densiometro" , $input)){
				$densiometro = $this->getDensiometro();
				array_push($data , $densiometro);
			}
			if(array_key_exists("fisicoQuimicos", $input)){
				$fisicoQuimicos = $this->getFisicoQuimicos();
				array_push($data, $fisicoQuimicos);
			}

		    // Chain the setters
		    $excel->setCreator(Auth::user()->name)
		          ->setCompany('Proyecto Río Torres');

		    // Call them separately
		    $excel->setDescription('Reporte de toma de tomas de aguas');

		    $excel->sheet('Tomas de Aguas', function($sheet) use ($data) {

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
				$tomasAguas = TomaAgua::all();
				foreach($tomasAguas as $tomaAgua){ // Para cada linea del archivo
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
				
	    		

		    	//$sheet->fromArray(TomaAgua::all(), null, 'A1', false, true);
		    });
		    

        //})->store('xlsx' , storage_path('reportesGenerados') , true)->export('xlsx');
		})->export($input['format']);
	
	}

	public function getGeneralidades(){
		$tomasAguas 	= TomaAgua::all();
		$tiposCauces	= TipoCauce::all();

		//Setting titles
		$id[] 					= "id";
		$fecha[]				= "fecha";
		$horaInicial[]			= "hora inicial";
		$horaFinal[]			= "hora final";
		$sitio[]				= "sitio";
		$autor[]				= "Realizada por";
		$clima[]				= "Clima";
		$curso[]				= "Curso";
		$nivelAgua[]			= "Nivel Agua en función de";
		$mo[]					= "mo";
		$trabajoIngenieril[] 	= 'Trabajo Ingenieril';
		$coliformes[]			= 'Presencia Coliformes';
		$estructuraBanco[]		= 'Estructura del Banco';
		$obsEstructuraBanco[]	= "Observación Estructura del Banco";

		//Setting Data
		foreach($tomasAguas as $tomaAgua){
			$id[] 			= $tomaAgua->id;
			$fecha[]		= substr($tomaAgua->created_at,0,11);
			$horaInicial[]	= $tomaAgua->hora_inicial;
			$horaFinal[]	= $tomaAgua->hora_final;
			$sitio[]		= $tomaAgua->sitio->name;
			$autor[]		= $tomaAgua->user->name;
			$clima[]		= $tomaAgua->generalidad->clima->nombre;
			$curso[]		= $tomaAgua->generalidad->curso->nombre;
			$nivelAgua[]	= $tomaAgua->generalidad->parametroNivel->nombre;
			$mo[]			= $tomaAgua->generalidad->mo->nombre;
			$trabajoIngenieril[]	= $tomaAgua->generalidad->trabajoIngenieril->nombre;
			$coliformes[]			= $tomaAgua->coliformes;
			$estructuraBanco[] 		= $tomaAgua->generalidad->estructuraBanco->nombre;
			$obsEstructuraBanco[]	= $tomaAgua->generalidad->observacion_estructura_banco;			
		}

		//To Fix --- Aca se podria diferenciar entre que desplegar y que no
		$misGeneralidades = [
			'id',
			'fecha' , 
			'horaInicial' ,
			'horaFinal',
			'sitio',
			'autor',
			'clima',
			'curso',
			'nivelAgua',
			'mo',
			'trabajoIngenieril',
			'coliformes',
			'estructuraBanco',
			'obsEstructuraBanco',
		];

		$generalidades = compact($misGeneralidades);


		//Obteniendo datos de las variables con multiples valores
		$cauces = array ();
		$composicionSustrato = array();
		$porcentajeComposicionSustrato = array();

		foreach($tomasAguas as $tomaAgua){

			$count = 0;
			foreach($tomaAgua->generalidad->valoresCauces as $valorCauce){
				$cauces[$count][0] = $valorCauce->tipoCauce->nombre ;
				$cauces[$count][] = $valorCauce->valor;
				$count++;
			}

			$count = 0;
			foreach($tomaAgua->generalidad->porcentajesComposicionSustrato as $porcentajeCompSus){
				$composicionSustrato[$count][0] = "Composición del sustrato ".$porcentajeCompSus->tipoSustrato->nombre." (%)";
				$composicionSustrato[$count][]  = $porcentajeCompSus->porcentaje;
				$count++;
			}

			$count = 0;
			foreach($tomaAgua->generalidad->porcentajesCondicionesSustratos as $porcentajeCondSus){
				$porcentajeComposicionSustrato[$count][0] 		= "Condición del sustrato ".$porcentajeCondSus->tipoCondicionSustrato->nombre." (%)";
				$porcentajeComposicionSustrato[$count][] 		= $porcentajeCondSus->porcentaje;
				$count++;
			}
		}//end foreach

		foreach($cauces as $cauce){
			array_push($generalidades, $cauce);
		}
		foreach($composicionSustrato as $compoSus){
			array_push($generalidades, $compoSus);
		}
		foreach($porcentajeComposicionSustrato as $porComSus){
			array_push($generalidades, $porComSus);
		}
		

		return $generalidades;
	}

	public function getVegetacion(){
		$tomasAguas 	= TomaAgua::all();

		//Setting titles
		$vegetacionBanco[]	= "Vegetación en el Banco (%)";

		foreach($tomasAguas as $tomaAgua){
			$vegetacionBanco[]	= $tomaAgua->vegetaciones->porcentaje_vegetacion_banco;
		}

		//Obteniendo valores con multiples variables
		foreach($tomasAguas as $tomaAgua){
			$count = 0;

			foreach($tomaAgua->vegetaciones->porcentajesExposicionCauce as $porcentajeExpoCauce){
				$porExpoCauce[$count][0]	= "Exposicón del cauce ".$porcentajeExpoCauce->tipoExposicionCauce->nombre." (%)";
				$porExpoCauce[$count][]		= $porcentajeExpoCauce->porcentaje;
				$count++;
			}

			$count = 0;
			foreach($tomaAgua->vegetaciones->porcentajesTipoRibera as $porcentajeTipoRibera){
				$porTipoRibera[$count][0]		= "Tipo en la Ribera ".$porcentajeTipoRibera->tipoRibera->nombre." (%)";
				$porTipoRibera[$count][]		= $porcentajeTipoRibera->porcentaje;
				$count++;
			}

			$count = 0;
			foreach($tomaAgua->vegetaciones->porcentajesAmbientesAsociados as $porcentajeAmbienteAso){
				$porAmbienteAso[$count][0]		= "Ambiente Asociado ".$porcentajeAmbienteAso->tipoAmbienteAsociado->nombre." (%)";
				$porAmbienteAso[$count][]		= $porcentajeAmbienteAso->porcentaje;
				$count++;
			}

		}//end foreach

		//Cargando arrays para devolverlo
		$vegetaciones = array();
		array_push($vegetaciones ,$vegetacionBanco);

		foreach($porExpoCauce as $item){
			array_push($vegetaciones, $item);
		}
		foreach($porTipoRibera as $item){
			array_push($vegetaciones, $item);
		}
		foreach($porAmbienteAso as $item){
			array_push($vegetaciones, $item);
		}

		return $vegetaciones;
	}


	public function getCaracterizacionVisual(){
		$tomasAguas 	= TomaAgua::all();

		//Setting titles
		$presenciaRS[]				= "Presencia RS";
		$contaminacionPuntual[]		= "Contaminación Puntual";
		$colorAgua[]				= "Color del Agua";
		$olorAgua[]					= "Olor del Agua";

		foreach($tomasAguas as $tomaAgua){
			$presenciaRS[]			= $tomaAgua->caracterizacionVisual->presenciaRs->nombre;
			$contaminacionPuntual[]	= $tomaAgua->caracterizacionVisual->contPuntual->nombre;
			$colorAgua[]			= $tomaAgua->caracterizacionVisual->colorAgua->nombre;
			$olorAgua[]				= $tomaAgua->caracterizacionVisual->olorAgua->nombre;
		}

		//Cargando array para devolver
		return $caracterizacionVisual = compact("presenciaRS" , "contaminacionPuntual" , "colorAgua" , "olorAgua");
	}

	public function getDensiometro(){
		$tomasAguas 	= TomaAgua::all();

		$norte[]	= "Porcentaje Cobertura Norte";
		$sur[]		= "Porcentaje Cobertura Sur";
		$este[]		= "Porcentaje Cobertura Este";
		$oeste[]	= "Porcentaje Cobertura Oeste";

		foreach($tomasAguas as $tomaAgua){
			$norte[]	= 100 - ($tomaAgua->medidasDensiometro->norte * $tomaAgua->medidasDensiometro->factor_cobertura);
			$sur[]		= 100 - ($tomaAgua->medidasDensiometro->sur * $tomaAgua->medidasDensiometro->factor_cobertura);
			$este[]		= 100 - ($tomaAgua->medidasDensiometro->este * $tomaAgua->medidasDensiometro->factor_cobertura);
			$oeste[]	= 100 - ($tomaAgua->medidasDensiometro->oeste * $tomaAgua->medidasDensiometro->factor_cobertura);
		}

		return $densiometro = compact("norte", "sur","este","oeste");
	}

	public function getFisicoQuimicos(){
		$tomasAguas	= TomaAgua::all();

		foreach($tomasAguas as $tomaAgua){
			$count = 0;
			foreach($tomaAgua->fisicoQuimico as $fisicoQuimico){
				$oxigenoMiligramosLitro[$count][0] 	= "O2 (mg/L) - Toma # ".$fisicoQuimico->numero_repeticion; 
				$oxigenoMiligramosLitro[$count][] 	= $fisicoQuimico->oxigeno_miligramos_litro;

				$oxigenoPorcentaje[$count][0]		= "O2 (%) - Toma # ".$fisicoQuimico->numero_repeticion; 
				$oxigenoPorcentaje[$count][]		= $fisicoQuimico->oxigeno_porcentaje;

				$temperatura[$count][0]		= "Temperatura - Toma # ".$fisicoQuimico->numero_repeticion; 
				$temperatura[$count][]		= $fisicoQuimico->temperatura;

				$ph[$count][0]		= "pH - Toma # ".$fisicoQuimico->numero_repeticion; 
				$ph[$count][]		= $fisicoQuimico->ph;

				$conductividad[$count][0]		= "Conductividad (uS/cm) - Toma # ".$fisicoQuimico->numero_repeticion; 
				$conductividad[$count][]		= $fisicoQuimico->conductividad;

				$sst[$count][0]		= "SST (mg/L) - Toma # ".$fisicoQuimico->numero_repeticion; 
				$sst[$count][]		= $fisicoQuimico->sst;

				$count++; 
			}//end foreach
		}//end foreach


		//datos en el array a devolver
		$fisicoQuimicos = array();
		foreach($oxigenoMiligramosLitro as $item){
			array_push($fisicoQuimicos, $item);
		}
		foreach($oxigenoPorcentaje as $item){
			array_push($fisicoQuimicos, $item);
		}
		foreach($temperatura as $item){
			array_push($fisicoQuimicos, $item);
		}
		foreach($ph as $item){
			array_push($fisicoQuimicos, $item);
		}
		foreach($conductividad as $item){
			array_push($fisicoQuimicos, $item);
		}
		foreach($sst as $item){
			array_push($fisicoQuimicos, $item);
		}

		return $fisicoQuimicos;
	}//end getFisicoQuimicos

}




