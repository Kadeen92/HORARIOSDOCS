<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Edificios as Edificios;
class EdificiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function index()
    {
        $edificios = new Edificios;
        $parametros['ruta'] 			= ['route' => 'edificios.store'];
		$parametros['metodo'] 		= 'POST';
		$parametros['edificio'] 		=  '';
        // llama al for del mantenimiento de roles
        return view('edificios')->with('parametros', $parametros)->with('edificios', $edificios);
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
		$edificios = new Edificios;
		$edificios->edificio 					= $request->input('edificio');
		$edificios->save();
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
        $edificios = Edificios::find($id);
		$parametros['ruta'] 		 	= ['route' => ['edificios.update', $id], 'method' => 'patch'];
		$parametros['edificio'] 		 	= $edificios->edificio;
		return view('edificios')->with('parametros', $parametros)->with('edificios', $edificios);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        
        $edificios = Edificios::find($id);
        $edificios->edificio					= $request->input('edificio');
		$edificios->save();
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
        
        Edificios::destroy($id);
		return \Redirect::route('edificios.index');
    }
}
