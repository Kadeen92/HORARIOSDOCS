<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Atender as Atender;
class AtenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $atender = new Atender;
		$parametros['ruta'] 				= ['route' => 'atender.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['solicitud'] 		=  '';
		$parametros['efectuado_por'] 	=  '';
		$parametros['lugar'] 			=  '';
		$parametros['idestado'] 		=  '';
		$parametros['idtiposol'] 	    =  '';
		$parametros['atendido_por'] 		=  '';
		$parametros['comentarios'] 	    =  '';
		//lamamos al form de registro personas
		return view('atender')->with('parametros', $parametros)->with('atender', $atender);  
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
        $atender = new Atender;
		
		$atender->idestado 		= $request->input('idestado');
		$atender->atendido_por 		= $request->input('atendido_por');
		$atender->comentarios 	= $request->input('comentarios');
		$atender->save();
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
        
        $atender = Atender::find($id);
		$parametros['ruta'] 		 	= ['route' => ['atender.update', $id], 'method' => 'patch'];
		
		$parametros['idestado']  		= $atender->idestado;
		
		$parametros['atendido_por']  		= $atender->atendido_por;
		$parametros['comentarios']  	    = $atender->comentarios;
		
		//return 'entre al edit';
		return view('atender')->with('parametros', $parametros)->with('atender', $atender);
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
        $atender = Atender::find($id);
		
		$atender->idestado 			= $request->input('idestado');
		
		$atender->atendido_por 			= $request->input('atendido_por');
		$atender->comentarios 		= $request->input('comentarios');
		
		$atender->save();
		
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
        Atender::destroy($id);
		return \Redirect::route('atender.index');
    }
}
