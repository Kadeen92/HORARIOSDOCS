<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rgral as Rgral;

class RgralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        
		$rgral = new Rgral;
		$parametros['ruta'] 			= ['route' => 'rgral.store'];
		$parametros['metodo'] 			= 'POST';
		$parametros['solicitud'] 		=  '';
		$parametros['efectuado_por'] 	=  '';
		$parametros['lugar'] 			=  '';
		$parametros['idestado'] 		=  '';
		$parametros['idtiposol'] 	    =  '';
		$parametros['atendido_por'] 	=  '';
		$parametros['comentarios'] 	    =  '';
		//edificios
		$parametros['idedificios'] 	    =  '';
		//lamamos al form de registro personas
		return view('rgral')->with('parametros', $parametros)->with('rgral', $rgral);
        
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        
         $parametros = ['idtiposol' => DB::table('tiposolicitud')->lists('tipo', 'id')];
		return View::make('rgral.create', $parametros);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $rgral = new Rgral;
        $rgral->solicitud 		= $request->input('solicitud');
		$rgral->efectuado_por	= $request->input('efectuado-por');
		$rgral->lugar 			= $request->input('lugar');
		$rgral->idestado 		= $request->input('idestado');
		$rgral->idtiposol 	= $request->input('idtiposol');
		$rgral->atendido_por 		= $request->input('atendido_por');
		$rgral->comentarios 	= $request->input('comentarios');
		$rgral->idedificios 	= $request->input('idedificios');
		
        $rgral->save();
		return redirect()->back();
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
        
        $rgral = Rgral::find($id);
		//$parametros['ruta'] 		 	= route('persona.update', $id);
		$parametros['ruta'] 		 	= ['route' => ['rgral.update', $id], 'method' => 'patch'];
		//$parametros['metodo'] 		= 'PATCH';
		$parametros['solicitud'] 		= $rgral->solicitud;
		$parametros['efectuado_por'] 	= $rgral->efectuado_por;
		$parametros['lugar']	 		= $rgral->lugar;
		$parametros['idestado']  		= $rgral->idestado;
		$parametros['idtiposol']  	    = $rgral->idtiposol;
		$parametros['atendido_por']  		= $rgral->atendido_por;
		$parametros['comentarios']  	    = $rgral->comentarios;
		$parametros['idedificios']  	    = $rgral->idedificios;
		
		
		
		return view('rgral')->with('parametros', $parametros)->with('rgral', $rgral);  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
		$rgral = Rgral::find($id);
		
		$rgral->solicitud 			= $request->input('solicitud');
		$rgral->efectuado_por 		= $request->input('efectuado_por');
		$rgral->lugar 				= $request->input('lugar');
		$rgral->idestado 			= $request->input('idestado');
		$rgral->idtiposol 		= $request->input('idtiposol');
		$rgral->atendido_por 			= $request->input('atendido_por');
		$rgral->comentarios 		= $request->input('comentarios');
		$rgral->idedificios 		= $request->input('idedificios');
		
		
		$rgral->save();
		return redirect()->back();   
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
        Rgral::destroy($id);
		return \Redirect::route('rgral.index');
    }
}
