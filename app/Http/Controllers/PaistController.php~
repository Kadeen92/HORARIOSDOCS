<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paist as Paist;
class PaistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paist = new Paist;
        $parametros['ruta'] 			    = ['route' => 'pais.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['pais'] 				=  '';
		$parametros['isocodigo'] 			=  '';
		$parametros['bandera'] 				=  '';
		
         return view('pais')->with('parametros', $parametros)->with('pais', $paist);
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
        //
         $paist = new Paist;
         $paist ->pais 			= $request->input('pais');
         $paist ->isocodigo 	= $request->input('isocodigo');
		 $paist ->save();
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
    public function edit(Request $request,$id)
    {
        //
        $paist = Paist::find($id);
		//$parametros['ruta'] 		 	= route('persona.update', $id);
		$parametros['ruta'] 		 	= ['route' => ['pais.update', $id], 'method' => 'patch'];
		//$parametros['metodo'] 		 	= 'PATCH';
		$parametros['pais'] 		 	= $paist->pais;
		$parametros['isocodigo'] 	 	= $paist->isocodigo;
	
		return view('pais')->with('parametros', $parametros)->with('pais', $paist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        //
        $paist = Paist::find($id);
		$paist->pais 				= $request->input('pais');
		$paist->isocodigo 			= $request->input('isocodigo');
		$paist->save();
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
        Paist::destroy($id);
		return \Redirect::route('pais.index');
    }
}
