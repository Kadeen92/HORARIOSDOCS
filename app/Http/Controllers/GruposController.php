<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Grupos as Grupos;
use App\Carreras as Carrera;
use App\Agnosestudio as Agnoestudio;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $grupos = new Grupos;
		$parametros['ruta'] 				= ['route' => 'grupos.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['codgrupo'] 			=  '';
		$parametros['idtipogrupo'] 			=  '';
		$parametros['idagnoestudio'] 		=  '';
		$parametros['idnumgrup'] 			=  '';
		$parametros['idcarrera'] 			=  '';
		$parametros['idsemestre'] 			=  '';
		
		if($request->input('idgrup') != ""){
			
			$grup = Grupos::grupo($request->get('idgrup'))->paginate(15);
			
		}
		else{
			$grup = Grupos::paginate(15);
		}
		
		
		return view('grupos', compact('grup'))->with('parametros', $parametros)->with('grupos', $grupos);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $grupos = new Grupos;
		
		$a = $request->input('codgrupo');
		$b = $request->input('idtipogrupo');
		$c = $request->input('idagnoestudio');
		$d = $request->input('idnumgrup');
		$s = $request->input('idsemestre');
		$g = Carrera::where('codgrupo', $a)->where('inactivo','<>',0)->pluck('id');
		$ag = Agnoestudio::where('valor', $c)->pluck('id');
		
		$grupos->grupo = "2".$a.$b.$c.$d;
		
		if($s == 1 and $ag == 2 and $b == 1){
			
			$grupos->grupo = "2".$a."7"."0".$d;
		}
		if($s == 1 and $ag == 2 and $b == 2){
			$grupos->grupo = "2".$a."9"."0".$d;
		}
		
		$sqlgrup = \DB::table('grupos')->where('grupo','=', $grupos->grupo)->pluck('grupo');
		$grupos->idcarrera = $g;
		$grupos->idagnoestudio   = $c;
		
		$grupos->codgrupo        = $request->input('codgrupo');
		$grupos->idtipogrupo     = $request->input('idtipogrupo');
		$grupos->idnumgrup       = $request->input('idnumgrup');
		echo $sqlgrup;
		if($sqlgrup == $grupos->grupo){
			\Session::flash('alerta1','ERROR: Este grupo ya esta creado. Genere uno nuevo');
    		return \Redirect::route('grupos.index');
		}
		else{
			$grupos->save();
			return redirect()->back();
		}
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
        
        $grupos = Grupos::find($id);
        $grup = Grupos::find($id)->paginate(15);
		$parametros['ruta'] 		 	= ['route' => ['grupos.update', $id], 'method' => 'patch'];
		
		$parametros['grupo']  		= $grupos->grupo;
		$parametros['codgrupo']  	= $grupos->codgrupo;
		$parametros['idtipogrupo'] 			=  $grupos->idtipogrupo;
		$parametros['idagnoestudio'] 		=  $grupos->idagnoestudio;
		$parametros['idnumgrup'] 			=  $grupos->idnumgrup;
		$parametros['inactivo'] 			=  $grupos->inactivo;
		//return 'entre al edit';
		return view('grupos',compact('grup'))->with('parametros', $parametros)->with('grupos', $grupos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       // return 'entre al update';
        $grupos = Grupos::find($id);
        if($request->input('inactivo') <> $grupos->inactivo){
        		$grupos->inactivo      = $request->input('inactivo');
        }else{
        		$a = $request->input('codgrupo');
				$b = $request->input('idtipogrupo');
				$c = $request->input('idagnoestudio');
				$d = $request->input('idnumgrup');
				$s = $request->input('idsemestre');
				$g = Carrera::where('codgrupo', $a)->where('inactivo','<>',0)->pluck('id');
				$ag = Agnoestudio::where('valor', $c)->pluck('id');
				
				$grupos->grupo = "2".$a.$b.$c.$d;
				
				if($s == 1 and $ag == 2 and $b == 1){
					$grupos->grupo = "2".$a."7"."0".$d;
				}
				if($s == 1 and $ag == 2 and $b == 2){
					$grupos->grupo = "2".$a."9"."0".$d;
				}
				
					
				
				$sqlgrup = \DB::table('grupos')->where('grupo','=', $grupos->grupo)->pluck('grupo');
				$grupos->idcarrera = $g;
				$grupos->idagnoestudio   = $c;
				//$grupos->grupo 		     = $request->input('grupo');
				$grupos->codgrupo        = $request->input('codgrupo');
				$grupos->idtipogrupo     = $request->input('idtipogrupo');
				$grupos->idnumgrup       = $request->input('idnumgrup');				
        }
        if($sqlgrup == $grupos->grupo){
			\Session::flash('alerta1','ERROR: Este grupo ya esta creado. Genere uno nuevo');
    		return \Redirect::route('grupos.index');
		}
		else{
			$grupos->save();
			return redirect()->back();
		}
        
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
       	Grupos::destroy($id);
		return \Redirect::route('grupos.index');
    }
}
