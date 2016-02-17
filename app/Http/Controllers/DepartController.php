<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento as Departamento;
class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $departamento = new Departamento;
        $parametros['ruta'] 				= ['route' => 'departamento.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['departamento'] 		=  '';
		$parametros['idfacultad'] 		=  '';
		// llama al for del mantenimiento de roles
        return view('departamento')->with('parametros', $parametros)->with('departamento', $departamento);
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
			$departamento = new Departamento;
			$departamento->departamento			= $request->input('departamento');
			$departamento->idfacultad			= $request->input('idfacultad');
			$departamento->save();
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
        $departamento = Departamento::find($id);
        $parametros['ruta'] 		 				  = ['route'=>['departamento.update', $id],'method'=>'patch'];
		$parametros['departamento'] 	= $departamento->departamento;
		$parametros['idfacultad'] 	= $departamento->idfacultad;
		return view('departamento')->with('parametros', $parametros)->with('departamento', $departamento);
		
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
        $departamento = Departamento::find($id);
		$departamento->departamento 			= $request->input('departamento');
		$departamento->idfacultad 			= $request->input('idfacultad');
		$departamento->save();
		return \Redirect::route('departamento.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
	{
		Departamento::destroy($id);
		return \Redirect::route('departamento.index');
	}
}
