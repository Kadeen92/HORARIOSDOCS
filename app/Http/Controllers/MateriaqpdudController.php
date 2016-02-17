<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Materiaqpdud as Materiaqpdud;
use App\User as User;

class MateriaqpdudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $materiaqpdud = new Materiaqpdud;
		$parametros['ruta'] 					= ['route' => 'materiaqpdud.store'];
		$parametros['metodo'] 					= 'POST';
		$parametros['idmateria'] 				=  '';
		$parametros['iduser']					=  '';
		//$parametros['inactivo']					=  '';
		
		$mxd = User::users($request->get('users1'))->orderby('idfacultad','asc')->paginate(15);
		
		return view('materiaqpdud',compact('mxd'))->with('parametros', $parametros)->with('materiaqpdud', $materiaqpdud);
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
        $materiaqpdud = new Materiaqpdud;
		$materiaqpdud->idmateria 				= $request->input('idmateria');
		$materiaqpdud->iduser 					= $request->input('iduser');
		//$materiaqpdud->inactivo 					= $request->input('inactivo');
		$materiaqpdud->save();
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
    public function edit($id, Request $request)
    {
        //
         $materiaqpdud = Materiaqpdud::find($id);
		$mxd = User::users($request->get('users1'))->orderby('idfacultad','asc')->paginate(15);
		//dd($materiaqpdud);
		
		
		$parametros['ruta'] 		 			= ['route' => ['materiaqpdud.update', $id], 'method' => 'patch'];
		$parametros['idmateria'] 		 		= $materiaqpdud->idmateria;
		$parametros['iduser'] 					= $materiaqpdud->iduser;
		
		return view('materiaqpdud',compact('mxd'))->with('parametros', $parametros)->with('materiaqpdud', $materiaqpdud);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        //
        $materiaqpdud = new Materiaqpdud;		
	/*	if($request->input('inactivo') <> $materiaqpdud->inactivo){
        	$materiaqpdud->inactivo      = $request->input('inactivo');
        }else{*/
			$materiaqpdud->idmateria 	 = $request->input('idmateria');
			$materiaqpdud->iduser		 = $request->input('iduser');
			//$materiaqpdud->inactivo      = $request->input('inactivo');
		//}
		$materiaqpdud->save();
		return \Redirect::route('materiaqpdud.index');   
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
         Materiaqpdud::destroy($id);
		return \Redirect::route('materiaqpdud.index');
    }
    public function getMateriaqpdud(Request $request){
		$id =  $request->input('user');
		$soli = \DB::table('materiaqpdud')
							->join('materias','materias.id','=','materiaqpdud.idmateria')
							->where('materiaqpdud.iduser','=', $id)
							->select('materias.materia')
							->get();					
		return $soli;	
		
	}   
}
