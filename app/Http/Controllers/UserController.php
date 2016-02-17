<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use App\Persona as Persona;
use App\User as User;
class UserController extends Controller {

	
	
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$user = new User;
		$parametros['ruta'] 			= ['route' => 'user.store'];
		$parametros['metodo'] 			= 'POST';
		$parametros['nombre'] 			=  '';
		$parametros['apellido']		 	=  '';
		$parametros['cedula'] 			=  '';
		$parametros['fecha_nac'] 		=  '';
		$parametros['telefono'] 	=  '';
		$parametros['celular'] 			=  '';
		$parametros['idrol'] 			=  '';
		$parametros['idsede'] 			=  '';
		$parametros['idpais'] 			=  '';
	//	$parametros['iddepartamento'] 	=  '';
		$parametros['idcargo'] 	=  '';
		//$user = new User;
		$parametros['email']			=  '';
		$parametros['password']			=  '';
		
//secion de profesores anexada el 25 de agosto 2015
//seccion para el registro de datos de profesores
		
		$parametros['idfacultad']		=  '';
		$parametros['inactivo']			=  '';
		$parametros['idsemestre']		=  '';
		$parametros['tieneresolucion']		=  '';
		$parametros['cantidaddehoras']		=  '';
		
		if($request->input('users1') != ""){
			$users = User::users($request->get('users1'))->orderby('idfacultad','asc')->paginate(10);
		}
		else{
			$users = User::orderby('idfacultad','asc')->paginate(10);
		}
		
		
		//lamamos al form de registro personas
		return view('user', compact('users'))->with('parametros', $parametros)->with('user', $user);
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
		$user = new User;
		if($request->input('tieneresolucion') == true){$user->tieneresolucion = 1;}
		else{$user->tieneresolucion = 0;}
		$user->nombre 			= $request->input('nombre');
		$user->apellido 			= $request->input('apellido');
		$user->cedula 			= $request->input('cedula');
		$user->fecha_nac			= $request->input('fecha_nac');
		$user->telefono 		= $request->input('telefono');
		$user->celular 			= $request->input('celular');
		$user->idrol 			= $request->input('idrol');
		$user->idsede 			= $request->input('idsede');
		$user->idpais 			= $request->input('idpais');
		$user->iddepartamento 	= $request->input('iddepartamento');
		$user->idcargo	        = $request->input('idcargo');
		$user->email				= $request->input('email');
		$user->password			= \Hash::make($request->input('password'));
		$user->idfacultad       = $request->input('idfacultad');
		$user->inactivo         = $request->input('inactivo');
		$user->idsemestre      = $request->input('idsemestre');
		$user->cantidaddehoras      = $request->input('cantidaddehoras');
		
		
		$user->save();
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
	
		$user = User::find($id);
		$users = User::find($id)->orderby('idfacultad','asc')->paginate(10);
		$parametros['ruta'] 		 	= ['route' => ['user.update', $id], 'method' => 'patch'];
		$parametros['nombre'] 		 	= $user->nombre;
		$parametros['apellido'] 	 	= $user->apellido;
		$parametros['cedula'] 		 	= $user->cedula;
		$parametros['fecha_nac']	 	= $user->fecha_nac;
		$parametros['telefono']  		= $user->telefono;
		$parametros['celular'] 		 	= $user->celular;
		$parametros['idrol'] 		 	= $user->idrol;
		$parametros['idsede'] 		 	= $user->idsede;
		$parametros['idpais'] 		 	= $user->idpais;
		$parametros['iddepartamento'] 	= $user->iddepartamento;
		$parametros['idcargo'] 	        = $user->idcargo;
		$parametros['idfacultad'] 		= $user->idfacultad;
		$parametros['inactivo'] 		= $user->inactivo;
		$parametros['idsemestre'] 		= $user->idsemestre;
		$parametros['tieneresolucion'] 		= $user->tieneresolucion;
		$parametros['cantidaddehoras'] 		= $user->cantidaddehoras;
		
		return view('user', compact('users'))->with('parametros', $parametros)->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$user = User::find($id);
		
		if($request->input('inactivo') <> $user->inactivo){
        		$user->inactivo      = $request->input('inactivo');
        }else{
        		if($request->input('tieneresolucion') == true){$user->tieneresolucion = 1;}
				else{$user->tieneresolucion = 0;}
				$user->nombre 			= $request->input('nombre');
				$user->apellido 			= $request->input('apellido');
				$user->cedula 			= $request->input('cedula');
				$user->fecha_nac			= $request->input('fecha_nac');
				$user->telefono 		= $request->input('telefono');
				$user->celular 			= $request->input('celular');
				$user->idrol 			= $request->input('idrol');
				$user->idsede 			= $request->input('idsede');
				$user->idpais 			= $request->input('idpais');
				$user->iddepartamento 	= $request->input('iddepartamento');
				$user->idcargo	        = $request->input('idcargo');
				$user->email				= $request->input('email');
				if(!empty($request->input('password'))){$user->password	= \Hash::make($request->input('password'));}
				$user->idfacultad       = $request->input('idfacultad');
				$user->inactivo         = $request->input('inactivo');
				$user->idsemestre      = $request->input('idsemestre');
				$user->cantidaddehoras      = $request->input('cantidaddehoras');
		}
		$user->save();
		return \Redirect::route('user.index');
		
	}
	
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return \Redirect::route('user.index');
	}

}
