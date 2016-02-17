<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Solicitud as Solicitud;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        
		$solicitud = new Solicitud;
		$parametros['ruta'] 			= ['route' => 'solicitud.store'];
		$parametros['metodo'] 			= 'POST';
		$parametros['solicitud'] 		=  '';
		$parametros['efectuado_por'] 	=  '';
		$parametros['idestado'] 		=  '';
		$parametros['idtiposol'] 	    =  '';
		$parametros['atendido_por'] 	=  '';
		$parametros['comentarios'] 	    =  '';
		
		return view('solicitud')->with('parametros', $parametros)->with('solicitud', $solicitud);
        
        
        
        
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
		return View::make('solucitud.create', $parametros);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $solicitud = new Solicitud;
        $solicitud->solicitud 		= $request->input('solicitud');
		$solicitud->efectuado_por	= $request->input('efectuado-por');
		$solicitud->idestado 		= $request->input('idestado');
		$solicitud->idtiposol 	= $request->input('idtiposol');
		$solicitud->atendido_por 		= $request->input('atendido_por');
		$solicitud->comentarios 	= $request->input('comentarios');
	
        $solicitud->save();
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
        
        $solicitud = Solicitud::find($id);
		//$parametros['ruta'] 		 	= route('persona.update', $id);
		$parametros['ruta'] 		 	= ['route' => ['solucitud.update', $id], 'method' => 'patch'];
		//$parametros['metodo'] 		= 'PATCH';
		$parametros['solicitud'] 		= $solicitud->solicitud;
		$parametros['efectuado_por'] 	= $solicitud->efectuado_por;
		$parametros['idestado']  		= $solicitud->idestado;
		$parametros['idtiposol']  	    = $solicitud->idtiposol;
		$parametros['atendido_por']  		= $solicitud->atendido_por;
		$parametros['comentarios']  	    = $solicitud->comentarios;
	
		
		
		
		return view('solicitud')->with('parametros', $parametros)->with('solicitud', $solicitud);  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
		$solicitud = Solicitud::find($id);
		
		$solicitud->solicitud 			= $request->input('solicitud');
		$solicitud->efectuado_por 		= $request->input('efectuado_por');
		$solicitud->idestado 			= $request->input('idestado');
		$solicitud->idtiposol 		= $request->input('idtiposol');
		$solicitud->atendido_por 			= $request->input('atendido_por');
		$solicitud->comentarios 		= $request->input('comentarios');
	
		
		$solicitud->save();
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
        Solicitud::destroy($id);
		return \Redirect::route('solicitud.index');
    }
}
