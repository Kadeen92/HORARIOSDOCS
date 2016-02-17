<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use App\Persona as Persona;
use App\User as Passedit;
class PasseditController extends Controller {

	
	
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$passedit = new Passedit;
		$parametros['ruta'] 			= ['route' => 'passedit.store'];
		$parametros['metodo'] 			= 'POST';
		$parametros['control2'] 			=  '';
		$parametros['newpass']		 	=  '';
		$parametros['password'] 			=  '';
		$parametros['control1'] 		=  '';
		
		return view('passedit')->with('parametros', $parametros)->with('passedit', $passedit);
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
		//dd($request);
		$passedit = Passedit::find($request->input('control1'));
		//dd($useredit);
		
		if(\Hash::check($request->input('control2'), $passedit->password)){
			if($request->input('control2') == $request->input('newpass') or $request->input('control2') == $request->input('password')){
				\Session::flash('alerta4','ERROR: Su nueva contraseña es igual a la actual. Si desea modificarla utilice una distinta.');
    			return \Redirect::route('passedit.index');}
    		else{
				if($request->input('newpass') == $request->input('password')){
					
					$passedit->password			= \Hash::make($request->input('password'));
					$passedit->save();
					\Session::flash('alerta3','EXITO: Almacenado. Su contraseña ha sido cambiada exitosamente.');
					return \Redirect::route('passedit.index');
				}
				else{
					\Session::flash('alerta2','ERROR: Las contraseñas no coinciden. Al repetir contraseña debes escribirla exactamente a la anterior.');
			}		return \Redirect::route('passedit.index');}	
        }
        else{
			\Session::flash('alerta1','ERROR: Su cédula es incorrecta. Escribe correctamente tu número de cédula.');
			return \Redirect::route('passedit.index');}
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
