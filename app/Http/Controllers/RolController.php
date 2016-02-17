<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rol as Rol;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rol = new Rol;
        $parametros['ruta'] 			= ['route' => 'rol.store'];
		$parametros['metodo'] 		= 'POST';
		$parametros['rol'] 		=  '';
        // llama al for del mantenimiento de roles
        return view('rol')->with('parametros', $parametros)->with('rol', $rol);
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
        $rol = new Rol;
		$rol->rol 					= $request->input('rol');
		$rol->save();
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
        $rol = Rol::find($id);
		$parametros['ruta'] 		 	= ['route' => ['rol.update', $id], 'method' => 'patch'];
		$parametros['rol'] 		 	= $rol->rol;
		return view('rol')->with('parametros', $parametros)->with('rol', $rol);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        
        $rol = Rol::find($id);
        $rol->rol					= $request->input('rol');
		$rol->save();
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
        
        Rol::destroy($id);
		return \Redirect::route('rol.index');
    }
}
