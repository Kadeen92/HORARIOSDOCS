<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cpm as Cpm;

class CpmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $cpm = new Cpm;
		$parametros['ruta'] 				= ['route' => 'cpm.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['idcarrera'] 		=  '';
		$parametros['idplan'] 			=  '';
		$parametros['idmateria'] 			=  '';
		$parametros['idagnoestudio'] 			=  '';
		$parametros['idsemestre'] 			=  '';
		$parametros['horasteoricas'] 			=  '';
		$parametros['horaslab'] 			=  '';
		$parametros['creditos'] 			=  '';
		
		$cmp = Cpm::/*cmp($request->get('cmp1'))->*/paginate(30);
		
		return view('cpm', compact('cmp'))->with('parametros', $parametros)->with('cpm', $cpm);  
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
        $cpm = new Cpm;
		
		$cpm->idcarrera		= $request->input('idcarrera');
		$cpm->idplan		= $request->input('idplan');
		$cpm->idmateria		= $request->input('idmateria');
		$cpm->idagnoestudio	= $request->input('idagnoestudio');
		$cpm->idsemestre	= $request->input('idsemestre');
		$cpm->horasteoricas	= $request->input('horasteoricas');
		$cpm->horaslab		= $request->input('horaslab');
		$cpm->creditos		= $request->input('creditos');
		$cpm->save();
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
        
        $cpm = Cpm::find($id);
        $cmp = Cpm::find($id)->paginate(30);
		$parametros['ruta'] 		 	= ['route' => ['cpm.update', $id], 'method' => 'patch'];
		
		$parametros['idcarrera']  	    = $cpm->idcarrera;
		$parametros['idplan']  	        = $cpm->idplan;
		$parametros['idmateria']  	    = $cpm->idmateria;
		$parametros['idagnoestudio']  	= $cpm->idagnoestudio;
		$parametros['idsemestre']  	    = $cpm->idsemestre;
		$parametros['horasteoricas']  	= $cpm->horasteoricas;
		$parametros['horaslab']  	    = $cpm->horaslab;
		$parametros['creditos']  	    = $cpm->creditos;
		$parametros['inactivo']  	    = $cpm->inactivo;
		
		//return 'entre al edit';
		return view('cpm', compact('cmp'))->with('parametros', $parametros)->with('cpm', $cpm);
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
        $cpm = Cpm::find($id);
		if($request->input('inactivo') <> $cpm->inactivo){
        		$cpm->inactivo      = $request->input('inactivo');
        }else{
        		$cpm->idcarrera		= $request->input('idcarrera');
				$cpm->idplan		= $request->input('idplan');
				$cpm->idmateria		= $request->input('idmateria');
				$cpm->idagnoestudio	= $request->input('idagnoestudio');
				$cpm->idsemestre	= $request->input('idsemestre');
				$cpm->horasteoricas	= $request->input('horasteoricas');
				$cpm->horaslab		= $request->input('horaslab');
				$cpm->creditos		= $request->input('creditos');
				$cpm->inactivo		= $request->input('inactivo');
			
		}
		
		
		$cpm->save();
		
		return \Redirect::route('cpm.index');
        
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
        Cpm::destroy($id);
		return \Redirect::route('cpm.index');
    }
}
