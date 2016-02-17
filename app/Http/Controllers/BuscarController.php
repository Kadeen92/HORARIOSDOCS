<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuscarController extends Controller
{
	//seleccion de carreras por facultad
    public function getCarreras(Request $request){
	
		if(!$request->ajax()) abort(403);
		
		
		$carreras= \App\Carreras::where('idfacultad',$request->input('facultad'))->where('inactivo','<>',0);
		return ($carreras->get(['id','carrera']) ); 
		
		
		}
	
	//seleccion de planes por facultad
    public function getPlanes(Request $request){
	
		if(!$request->ajax()) abort(403);
		
		
		$plan= \App\Planes::where('idcarrera',$request->input('carrera'))->where('inactivo','<>',0);
		return ($plan->get(['id','plan']) ); 
		
		
		}



//seleccion de planes por facultad
    public function getGrupos(Request $request){
	
		if(!$request->ajax()) abort(403);
		
		$grupo= \App\Grupos::where('idagnoestudio',$request->input('agnoestudio'))->
		where('idtipogrupo',$request->input('idjornada'))->where('idcarrera',$request->input('idcarrera'));			
		return ($grupo->get(['id','grupo']) ); 
		
		
		}
		
		
    public function getProfe(Request $request){
	
		if(!$request->ajax()) abort(403);
		
		
		
		$profe=\DB::table('users')
		->join('materiaqpdud','materiaqpdud.iduser','=','users.id')
		->where('materiaqpdud.idmateria','=',$request->input('idmateria'));
		return ($profe->get(['users.id','users.nombre','users.apellido'])); 
		
		
		
		}
		
		
		
		
		
		
		
	public function getEditarhorarios(Request $request){
		if(!$request->ajax()) abort(403);
			
	$dhorarios=\App\Detalleshorarios::select('idmateria','iduser','idtipoclass','idlab','idsalon')->where('id',$request->input('id'))->first() ;
			
			
		    return \Response::json($dhorarios);
		}		
			

}
