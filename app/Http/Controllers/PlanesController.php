<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Planes as Planes;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $planes = new Planes;
		$parametros['ruta'] 				= ['route' => 'planes.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['plan'] 		=  '';
		$parametros['idcarrera'] 			=  '';
		
		if($request->input('plan1') != ""){
			$plan = Planes::plan($request->get('plan1'))->paginate(25);
		}
		else{
			$plan = Planes::paginate(25);
		}
		
		
		return view('planes', compact('plan'))->with('parametros', $parametros)->with('planes', $planes);  
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
        $planes = new Planes;
		
		$planes->plan		= $request->input('plan');
		$planes->idcarrera 	  = $request->input('idcarrera');
		$planes->save();
		return \Redirect::route('planes.index');
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
        
        $planes = Planes::find($id);
        $plan = Planes::find($id)->paginate(25);
		$parametros['ruta'] 		 	= ['route' => ['planes.update', $id], 'method' => 'patch'];
		
		$parametros['plan']  	        = $planes->plan;
		$parametros['idcarrera']  	    = $planes->idcarrera;
		$parametros['inactivo']  	    = $planes->inactivo;
		//dd($parametros);
		
		return view('planes', compact('plan'))->with('parametros', $parametros)->with('planes', $planes);  
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
        $planes = Planes::find($id);
		if($request->input('inactivo') <> $planes->inactivo){
        		$planes->inactivo      = $request->input('inactivo');
        }else{
			$planes->plan		= $request->input('plan');
			$planes->idcarrera	= $request->input('idcarrera');
			$planes->inactivo	= $request->input('inactivo');
		}
		
		$planes->save();
		
		return \Redirect::route('planes.index');
        
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
        Planes::destroy($id);
		return \Redirect::route('planes.index');
    }
}
