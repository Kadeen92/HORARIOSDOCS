<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Cargos\Cargos;

use App\Versol as Versol;
class VersolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //parametros iniciales de la vista cargos
        $versol = new Versol;
		$parametros['ruta'] 				= ['route' => 'versol.store'];
		$parametros['metodo'] 				= 'POST';
		return view('versol')->with('parametros', $parametros)->with('versol', $versol);  
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
        $versol = new Versol;
		$versol->save();
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
         $versol = Versol::find($id);
		
		$parametros['ruta'] 		 	= ['route' => ['versol.update', $id], 'method' => 'patch'];
		
		return view('versol')->with('parametros', $parametros)->with('versol', $versol);
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
        $versol = Versol ::find($id);
		$versol->save();
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
        Versol::destroy($id);
		return \Redirect::route('versol.index');
    }
}
