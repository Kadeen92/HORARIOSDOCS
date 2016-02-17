<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Horarios as Horarios;
use App\Detalleshorarios as Detalleshorarios;
use App\User as User;
class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $Horarios = new Horarios;
		$parametros['ruta'] 				= ['url' => 'almacenar'];
		$parametros['metodo'] 				= 'POST';
		$parametros['idagno'] 				=  '';
		$parametros['idfacultad'] 			=  '';
		$parametros['idcarrera'] 			=  '';
		$parametros['idplan'] 				=  '';
		$parametros['idagnoestudio'] 		=  '';
		$parametros['idsemestre'] 			=  '';
		$parametros['idjornada'] 			=  '';
		$parametros['idgrupo'] 				=  '';
//--------------------------------------------------
		$parametros['iddia'] 				=  '';
		$parametros['idhora'] 				=  '';
		$parametros['idmateria'] 			=  '';
		$parametros['iduser'] 				=  '';
		$parametros['idlab'] 				=  '';
		$parametros['idsalon'] 				=  '';
		$parametros['idtipoclass'] 			=  '';
		$parametros['idsemestre2'] 			=  '';
		$parametros['id'] 					=  0;
		
//-----------------------------------------------------------------------------------------------
		
		return view('horarios')->with('parametros', $parametros)->with('Horarios', $Horarios)->with('sw', '0');  
        
        
        
        
        
        
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
    public function almacenar(Request $request){
		
		
		$data = $request->all();
		$grupo=\DB::table('horarioss')
					->where('idgrupo','=', $data['idgrupo'])
					->where('idagno','=', $data['idagno'])
					->where('idsemestre','=', $data['idsemestre'])
					->pluck('idgrupo');
		
		
//si el grupo ya a sido a signado anteriormente
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if($grupo==$data['idgrupo']){
			$bloquerh=1;
				\Session::flash('alert4','Este grupo ya posee un horario asignado para este año y semestre');
			}else{
				$bloquerh=2;
		
		
		
		
		
		
		
		
			
//filtros para evitar ingresar tipo indefinido-----------------------------------------------------------------
	if($data['idfacultad']==8 or $data['idfacultad']==0){
			$bloquerh1=1;
				\Session::flash('alert4','No ha seleccionado una facultad valida');
			}else{
				$bloquerh1=2;
			}
			
	if($data['idcarrera']==1 or $data['idcarrera']==0){
			$bloquerh2=1;
				\Session::flash('alert4','No ha seleccionado una carrera valida ');
			}else{
				$bloquerh2=2;
			}	
			
	if($data['idplan']==1 or $data['idplan']==0){
			$bloquerh3=1;
				\Session::flash('alert4','No ha seleccionado un plan valido ');
			}else{
				$bloquerh3=2;
			}		
//-------------------------------------------------------------------------------------------------------------
	}	
		
	if($bloquerh==2){	
		if($bloquerh1==2){
			if($bloquerh2==2){
				if($bloquerh3==2){
							//Almacenar la data del grupo
							$horarios = new Horarios;
							$horarios->idagno 			= $data['idagno'];
							$horarios->idagnoestudio 	= $data['idagnoestudio'];
							$horarios->idfacultad 		= $data['idfacultad'];
							$horarios->idcarrera		= $data['idcarrera'];
							$horarios->idgrupo 			= $data['idgrupo'];
							$horarios->idsemestre 		= $data['idsemestre'];
							$horarios->idjornada 		= $data['idjornada'];
							$horarios->idplan 			= $data['idplan'];
							$horarios->save();
							\Session::flash('alert3','Datos guardados con éxito');
							return $this->show($horarios->id);//Llamo la funcion Show
			}else{return $this->index();}
			}else{return $this->index();}
		}else{return $this->index();}
	}else{return $this->index();}
				

	}
     
    public function store(Request $request)
    {
		$data = $request->all();
//------------------------------------------------------------------------------
		
		
		//recuperacion de data para ser prosezada en la base de datos
		$plancpm=\DB::table('horarioss')
					->where('id','=', $data['id'])
					->pluck('idplan');
		
		
		//-------------------------------------------
		$idsemestre=\DB::table('horarioss')
					->where('id','=', $data['id'])
					->pluck('idsemestre');
		//-------------------------------------------
		
		
		
		$idagno=\DB::table('horarioss')
					->where('id','=', $data['id'])
					->pluck('idagno');
		
		$hcpm=\DB::table('cxpxm')
                     ->where('idmateria','=', $data['idmateria'])
                     ->where('idplan'	,'=', $plancpm)
                     ->get();
		
		$horasl=\DB::table('cxpxm')
                     ->where('idmateria','=', $data['idmateria'])
                     ->where('idplan'	,'=', $plancpm)
                     ->pluck('horaslab');
                     
         $horast=\DB::table('cxpxm')
                     ->where('idmateria','=', $data['idmateria'])
                     ->where('idplan'	,'=', $plancpm)
                     ->pluck('horasteoricas');
		
		
		$countlap=\DB::table('detalleshorarios')
                     ->where('idhorarioss'	,'=', $data['id'])
                     ->where('idmateria'	,'=', $data['idmateria'])
                     //->where('idlab'		,'=', $data['idlab'])
                     ->count();
			
		$countsalon=\DB::table('detalleshorarios')
                     ->where('idhorarioss'	,'=', $data['id'])
                     ->where('idmateria'	,'=', $data['idmateria'])
                     //->where('idsalon'		,'=', $data['idsalon'])
                     ->count();
		
		
		$iduser=\DB::table('detalleshorarios')
					->where('iduser'	,'=', $data['iduser'])
                    ->where('idhora'	,'=', $data['idhora'])
                    ->where('iddia'		,'=', $data['iddia'])
                     ->pluck('iduser');	
		
		
		$idhora=\DB::table('detalleshorarios')
					->where('iduser'	,'=', $data['iduser'])
                    ->where('idhora'	,'=', $data['idhora'])
                    ->where('iddia'		,'=', $data['iddia'])
                     ->pluck('idhora');	
		
		
		$iddia=\DB::table('detalleshorarios')
					->where('iduser'	,'=', $data['iduser'])
                    ->where('idhora'	,'=', $data['idhora'])
                    ->where('iddia'		,'=', $data['iddia'])
                     ->pluck('iddia');	
	
		$user2=\DB::table('detalleshorarios')
					->where('idmateria','=',$data['idmateria'])
					->where('idhorarioss','=',$data['id'])
					->where('idtipoclass','=',$data['idtipoclass'])
					->pluck('iduser');
	
$salonesi=\DB::table('detalleshorarios')		
				->where('idmateria','=',$data['idmateria'])
				->where('idhorarioss','=',$data['id'])
				->where('idtipoclass','=',$data['idtipoclass'])
				->where('idsemestre','=',$idsemestre)
				->where('idagno','=',$idagno)
				->pluck('idsalon');
		
		
	$labi=\DB::table('detalleshorarios')		
				->where('idmateria','=',$data['idmateria'])
				->where('idhorarioss','=',$data['id'])
				->where('idtipoclass','=',$data['idtipoclass'])
				->where('idsemestre','=',$idsemestre)
				->where('idagno','=',$idagno)
				->pluck('idlab');
		
				
				
		$salon=\DB::table('detalleshorarios')
					->where('idsalon','=',$data['idsalon'])
					->where('idtipoclass','=',$data['idtipoclass'])
					->where('idhora'	,'=', $data['idhora'])
                    ->where('iddia'		,'=', $data['iddia'])
					->where('idagno','=',$idagno)
					->where('idsemestre','=',$idsemestre)
                    ->count();
                    
                    
         $lab=\DB::table('detalleshorarios')
					->where('idlab','=',$data['idlab'])
					->where('idtipoclass','=',$data['idtipoclass'])
					->where('idhora'	,'=', $data['idhora'])
                    ->where('iddia'		,'=', $data['iddia'])
					->where('idagno','=',$idagno)
					->where('idsemestre','=',$idsemestre)
                    ->count();
                    
         $iddetalles=\DB::table('detalleshorarios')
						
						
						->where('idagno','=',$idagno)
						->where('idsemestre','=',$idsemestre)
						->where('iduser','=',$data['iduser'])
						->where('idhora','=',$data['idhora'])
						->where('iddia','=',$data['iddia'])
						->count();
		
		
		
		
		
		$blockmateria=\DB::table('detalleshorarios')
						->where('idhorarioss','=',$data['id'])
						->where('idagno','=',$idagno)
						->where('idsemestre','=',$idsemestre)
						->where('iddia','=',$data['iddia'])
						->where('idmateria','=',$data['idmateria'])
						->count();
//---------------------------------------------------------------------------------------------

//filtrado de profesores y coliciones 
	if($data['iduser']==0){							
		$b1=1;
		
		
		\Session::flash('alert1','Usted no a ingresado a un profesor para esta materia');
	}
if($iddetalles==0){
		$b1=2;
	}else{
		$b1=1;
		\Session::flash('alert1','Usted a tratado de ingresar un profesor que a ya a sido asignado a esta hora y día  en otra facultad o carrera');
	}
				
					
//---------------------------------------------------------------------------------------------------------------					

//filtrado para evitar insertar o sobrepasar el limite de horas teoricas y lab

											if($data['idtipoclass'] == 3){
										
										if($horasl== 0){
												$bloquear=1;
												\Session::flash('alert1','usted a seleccionado una materia que no tiene horas de laboratorio');
										}else{
												
												if($horasl==$countlap ){
													if($data['iddivin']==1){
													$bloquear=1;
													\Session::flash('alert1','usted a llegado al limite de horas de laboratorio de esta materia ');
													}else{
															$bloquear=2;
															\Session::flash('alert2','aun no a completado la cantidad de horas de laboratorio de esta materia la cantidad limite es '.$horasl.'' );
															\Session::flash('alert3','Este grupo a sido dividido para esta hora y materia. ' );
														}
												
												}else{		
													
										$bloquear=2;
										\Session::flash('alert2','aun no a completado la cantidad de horas de laboratorio de esta materia la cantidad limite es '.$horasl.'' );

										}
									}
										
								}			
									
									if($data['idtipoclass'] == 2){
										if($horast== 0){
												$bloquear=1;
												\Session::flash('alert1','usted a seleccionado una materia que no tiene horas de teoria');
										}else{
												if($horast==$countsalon ){
													if($data['iddivin']==1){
													
													$bloquear=1;
													\Session::flash('alert1','usted a llegado al limite de horas de laboratorio de esta materia ');
													
													}else{
														$bloquear=2;
														\Session::flash('alert2','aun no a completado la cantidad de horas de teoria de esta materia la cantidad limite es '.$horast.'' );
														\Session::flash('alert3','Este grupo a sido dividido para esta hora y materia. ' );
														}
												
												
												
												}else{$bloquear=2;
													\Session::flash('alert2','aun no a completado la cantidad de horas de teoria de esta materia la cantidad limite es '.$horast.'' );}
											
											}
									}	
	
	
	
	
	
	
	if($salon==0 or $lab==0){
			$bloquear3=2;
	}else{
			$bloquear3=1;
			\Session::flash('alert1','El salón o laboratorio seleccionado ya esta en uso a esta hora ');
			
			}

//-----------------------------------------------------------------------------
	//filtrado para mantener el mismo profesor	mientras sea una materia teorica 		
				if($data['idtipoclass'] ==2){
					if($user2==$data['iduser'] or $data['iddivin']<>1 or $user2==0){
							$bloquear2=2;
						}else{
							$bloquear2=1;
							\Session::flash('alert1','usted ha seleccionado un profesor diferente al seleccionado  para esta  materia teórica ');
						}
				}else{
						$bloquear2=2;
					}
//--------------------------------------------------------------------------------------------------------------------
				if($blockmateria==3 and $data['iddivin']==1 ){
					$bloquear4=1;
					\Session::flash('alert1','Usted a tratado de ingresar mas de 3 horas de esta misma materia en este día.
									Recuerde que debe distribuir las horas de clase de esta materia en los demás días de esta semana. ');
					}else{
							$bloquear4=2;
						}
					
					
						
			
						
//bloquea el insert si las horas de la boratorio o clases no coinsiden o has llegado al limite de horas de esa materia

	if($b1==2){
			if($bloquear == 2){
					if($bloquear2==2){
						
										if($bloquear3==2){
												if($bloquear4==2){
														$Detalleshorarios = new Detalleshorarios;
														$Detalleshorarios->iddia 			= $data['iddia'];
														$Detalleshorarios->idhora 			= $data['idhora'];
														$Detalleshorarios->idmateria 		= $data['idmateria'];
														$Detalleshorarios->iduser 			= $data['iduser'];
														$Detalleshorarios->idsalon 			= $data['idsalon'];
														$Detalleshorarios->idlab 			= $data['idlab'];
														$Detalleshorarios->idhorarioss 		= $data['id'];
														$Detalleshorarios->idtipoclass 		= $data['idtipoclass'];
											//---------------------------------------------------------------------------------			
														$Detalleshorarios->iddivin 			= $data['iddivin'];
														$Detalleshorarios->iddivgrupo		= $data['iddivgrupo'];
											//---------------------------------------------------------------------------------
														$Detalleshorarios->idagno 			= $idagno;
														$Detalleshorarios->idsemestre 		= $idsemestre;
														$Detalleshorarios->save();
														\Session::flash('alert3','Datos guardados con éxito');
														return $this->show($Detalleshorarios->idhorarioss);
				//---------------------------------------------------------------------------------
											}{return $this->show($data['id']); }
										}{return $this->show($data['id']); }
				}{return $this->show($data['id']); }
		}{return $this->show($data['id']); }
//---------------------------------------------------------------------------------
	}{return $this->show($data['id']); }
//---------------------------------------------------------------------------------
	
		
		
	
		
		
		
		
	}  
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$Detalleshorarios = Detalleshorarios::find($id);
		$parametros['ruta'] 				= ['route' => 'horarios.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['idagno'] 				= '';
		$parametros['id'] 					= $id;
		$parametros['idfacultad'] 			= '';
		$parametros['idcarrera'] 			=  '';
		$parametros['idplan'] 				=  '';
		$parametros['idagnoestudio'] 		=  '';
		$parametros['idsemestre'] 			= '';
		$parametros['idjornada'] 			= '';
		$parametros['idgrupo'] 				=  '';
//--------------------------------------------------
		$parametros['iddia'] 				=  '';
		$parametros['idhora'] 				=  '';
		$parametros['idmateria'] 			=  '';
		$parametros['iduser'] 				=  '';
		$parametros['idtipoclass'] 			=  '';
//-----------------------------------------------------------------------------------------------
	
	
		
	
		return view('horarios')->with('parametros', $parametros)->with('Detalleshorarios', $Detalleshorarios)->with('sw', '1');  
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
		
		
		
		
		
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
			//recuperacion de data para ser prosezada en la base de datos
		$plancpm=\DB::table('horarioss')
					->where('id','=', $request->input('id'))
					->pluck('idplan');
		
		
		//-------------------------------------------
		$idsemestre=\DB::table('horarioss')
					->where('id','=', $request->input('id'))
					->pluck('idsemestre');
		//-------------------------------------------
		
		
		
		$idagno=\DB::table('horarioss')
					->where('id','=', $request->input('id'))
					->pluck('idagno');
		
		$hcpm=\DB::table('cxpxm')
                     ->where('idmateria','=', $request->input('idmateria'))
                     ->where('idplan'	,'=', $plancpm)
                     ->get();
		
		$horasl=\DB::table('cxpxm')
                     ->where('idmateria','=', $request->input('idmateria'))
                     ->where('idplan'	,'=', $plancpm)
                     ->pluck('horaslab');
                     
         $horast=\DB::table('cxpxm')
                     ->where('idmateria','=', $request->input('idmateria'))
                     ->where('idplan'	,'=', $plancpm)
                     ->pluck('horasteoricas');
		
		
		$countlap=\DB::table('detalleshorarios')
                     ->where('idhorarioss'	,'=', $request->input('id'))
                     ->where('idmateria'	,'=', $request->input('idmateria'))
                     //->where('idlab'		,'=', $data['idlab'])
                     ->count();
			
		$countsalon=\DB::table('detalleshorarios')
                     ->where('idhorarioss'	,'=', $request->input('id'))
                     ->where('idmateria'	,'=', $request->input('idmateria'))
                     //->where('idsalon'		,'=', $data['idsalon'])
                     ->count();
		
		
		$iduser=\DB::table('detalleshorarios')
					->where('iduser'	,'=',$request->input('iduser'))
                    ->where('idhora'	,'=',$request->input('idhora'))
                    ->where('iddia'		,'=', $request->input('iddia'))
                     ->pluck('iduser');	
		
		
		$idhora=\DB::table('detalleshorarios')
					->where('iduser'	,'=', $request->input('iduser'))
                    ->where('idhora'	,'=', $request->input('idhora'))
                    ->where('iddia'		,'=', $request->input('iddia'))
                     ->pluck('idhora');	
		
		
		$iddia=\DB::table('detalleshorarios')
					->where('iduser'	,'=', $request->input('iduser'))
                    ->where('idhora'	,'=', $request->input('idhora'))
                    ->where('iddia'		,'=', $request->input('iddia'))
                     ->pluck('iddia');	
	
		$user2=\DB::table('detalleshorarios')
					->where('idmateria','=',$request->input('idmateria'))
					->where('idhorarioss','=',$request->input('id'))
					->where('idtipoclass','=',$request->input('idtipoclass'))
					->pluck('iduser');
	
		$salon=\DB::table('detalleshorarios')
					->where('idsalon','=',$request->input('idsalon'))
					->where('idtipoclass','=',$request->input('idtipoclass'))
					->where('idhora'	,'=', $request->input('idhora'))
                    ->where('iddia'		,'=', $request->input('iddia'))
					->where('idagno','=',$idagno)
					->where('idsemestre','=',$idsemestre)
                    ->count();
                    
                    
         $lab=\DB::table('detalleshorarios')
					->where('idlab','=',$request->input('idlab'))
					->where('idtipoclass','=',$request->input('idtipoclass'))
					->where('idhora'	,'=',$request->input('idhora'))
                    ->where('iddia'		,'=', $request->input('iddia'))
					->where('idagno','=',$idagno)
					->where('idsemestre','=',$idsemestre)
                    ->count();
                    
         $iddetalles=\DB::table('detalleshorarios')
						
						
						->where('idagno','=',$idagno)
						->where('idsemestre','=',$idsemestre)
						->where('iduser','=',$request->input('iduser'))
						->where('idhora','=',$request->input('idhora'))
						->where('iddia','=',$request->input('iddia'))
						->count();
		
		
		
		
		
		$blockmateria=\DB::table('detalleshorarios')
						->where('idhorarioss','=',$request->input('id'))
						->where('idagno','=',$idagno)
						->where('idsemestre','=',$idsemestre)
						->where('iddia','=',$request->input('iddia'))
						->where('idmateria','=',$request->input('idmateria'))
						->count();
//---------------------------------------------------------------------------------------------

//filtrado de profesores y coliciones 
	if($request->input('iduser')==0){							
		$b1=1;
		
		
		\Session::flash('alert1','Usted no a ingresado a un profesor para esta materia');
	}
if($iddetalles==0){
		$b1=2;
	}else{
		$b1=1;
		\Session::flash('alert1','Usted a tratado de ingresar un profesor que a ya a sido asignado a esta hora y día  en otra facultad o carrera');
	}
				
					
//---------------------------------------------------------------------------------------------------------------					

//filtrado para evitar insertar o sobrepasar el limite de horas teoricas y lab

											if($request->input('idtipoclass') == 3){
										
										if($horasl== 0){
												$bloquear=1;
												\Session::flash('alert1','usted a seleccionado una materia que no tiene horas de laboratorio');
										}else{
												
												if($horasl==$countlap ){
													if($request->input('iddivin')==1){
													$bloquear=1;
													\Session::flash('alert1','usted a llegado al limite de horas de laboratorio de esta materia ');
													}else{
															$bloquear=2;
															\Session::flash('alert2','aun no a completado la cantidad de horas de laboratorio de esta materia la cantidad limite es '.$horasl.'' );
															\Session::flash('alert3','Este grupo a sido dividido para esta hora y materia. ' );
														}
												
												}else{		
													
										$bloquear=2;
										\Session::flash('alert2','aun no a completado la cantidad de horas de laboratorio de esta materia la cantidad limite es '.$horasl.'' );

										}
									}
										
								}			
									
									if($request->input('idtipoclass') == 2){
										if($horast== 0){
												$bloquear=1;
												\Session::flash('alert1','usted a seleccionado una materia que no tiene horas de teoria');
										}else{
												if($horast==$countsalon ){
													if($request->input('iddivin')==1){
													
													$bloquear=1;
													\Session::flash('alert1','usted a llegado al limite de horas de laboratorio de esta materia ');
													
													}else{
														$bloquear=2;
														\Session::flash('alert2','aun no a completado la cantidad de horas de teoria de esta materia la cantidad limite es '.$horast.'' );
														\Session::flash('alert3','Este grupo a sido dividido para esta hora y materia. ' );
														}
												
												
												
												}else{$bloquear=2;
													\Session::flash('alert2','aun no a completado la cantidad de horas de teoria de esta materia la cantidad limite es '.$horast.'' );}
											
											}
									}	
	
	
	
	
	
	
	if($salon==0 or $lab==0){
			$bloquear3=2;
	}else{
			$bloquear3=1;
			\Session::flash('alert1','El salón o laboratorio seleccionado ya esta en uso a esta hora ');
			
			}

//-----------------------------------------------------------------------------
	//filtrado para mantener el mismo profesor	mientras sea una materia teorica 		
				if($request->input('idtipoclass') ==2){
					if($user2==$request->input('iduser') or $user2==0){
							$bloquear2=2;
						}else{
							$bloquear2=1;
							\Session::flash('alert1','usted ha seleccionado un profesor diferente al seleccionado  para esta  materia teórica ');
						}
				}else{
						$bloquear2=2;
					}
//--------------------------------------------------------------------------------------------------------------------
				if($blockmateria==3 and $request->input('iddivin')==1 ){
					$bloquear4=1;
					\Session::flash('alert1','Usted a tratado de ingresar mas de 3 horas de esta misma materia en este día.
									Recuerde que debe distribuir las horas de clase de esta materia en los demás días de esta semana. ');
					}else{
							$bloquear4=2;
						}
						
						
						
//bloquea el insert si las horas de la boratorio o clases no coinsiden o has llegado al limite de horas de esa materia

	if($b1==2){
			if($bloquear == 2){
					if($bloquear2==2){
						if($bloquear3==2){
								if($bloquear4==2){
		$Detalleshorarios = Detalleshorarios::find($id);
		 $Detalleshorarios->iddia		= $request->input('iddia');
		 $Detalleshorarios->idhorarioss	= $request->input('id');
		 $Detalleshorarios->idhora		= $request->input('idhora');
		 $Detalleshorarios->iduser		= $request->input('iduser');
		 $Detalleshorarios->idtipoclass		= $request->input('idtipoclass');
		 $Detalleshorarios->idmateria		= $request->input('idmateria');
		 $Detalleshorarios->idlab		= $request->input('idlab');
		 $Detalleshorarios->idsalon		= $request->input('idsalon');
		 $Detalleshorarios->save();
		\Session::flash('alert3','Datos actualizados  con éxito');
		return $this->show($Detalleshorarios->idhorarioss);

    
  }{return $this->show($request->input('id')); }
						}{return $this->show($request->input('id')); }
				}{return $this->show($request->input('id')); }
		}{return $this->show($request->input('id')); }
//---------------------------------------------------------------------------------
	}{return $this->show($request->input('id')); }  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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
    }
    
    
    
    
    
    
    
}
