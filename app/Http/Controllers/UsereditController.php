<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use App\Persona as Persona;
use App\User as Useredit;
class UsereditController extends Controller {

	
	
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$useredit = new Useredit;
		$parametros['ruta'] 			= ['route' => 'useredit.store'];
		$parametros['metodo'] 			= 'POST';
		$parametros['nombre'] 			=  '';
		$parametros['apellido']		 	=  '';
		$parametros['cedula'] 			=  '';
		$parametros['fecha_nac'] 		=  '';
		$parametros['telefono'] 	=  '';
		$parametros['celular'] 			=  '';
		$parametros['control1'] 		=  '';
		
		return view('useredit')->with('parametros', $parametros)->with('useredit', $useredit);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request,$id)
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$useredit = Useredit::find($request->input('control1'));
		
		$useredit->nombre 			= $request->input('nombre');
		$useredit->apellido 			= $request->input('apellido');
		$useredit->cedula 			= $request->input('cedula');
		$useredit->fecha_nac			= $request->input('fecha_nac');
		$useredit->telefono 		= $request->input('telefono');
		$useredit->celular 			= $request->input('celular');
		
		$useredit->save();
		
		return \Redirect::route('useredit.index');
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
		
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		
		
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

}
