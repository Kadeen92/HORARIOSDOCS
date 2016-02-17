@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading strong">Registro de Materias que puede dar un Docente</div>
							<div class="panel-body">
								@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
									{!! Form::model($materiaqpdud, $parametros['ruta']) !!}
										<div class="form-group">
										<label class="col-md-4 control-label">MATERIA</label>
											<div class="col-md-6">
												{{--*/$mat = App\Materias::select('id',DB::raw('concat(codigomateria," ",materia) as nombrem'))->orderby('materia','asc')->lists('nombrem','id')/*--}}
												{!! Form::select('idmateria', $mat, null, array('class' => 'form-control','id' => 'idmateria')) !!}
											</div>
										</div>	
										<br><br>
										<div class="form-group">
											<label class="col-md-4 control-label">PROFESOR</label>
											<div class="col-md-6">
												{{--*/$user = App\User::select('id',DB::raw('concat(cedula," ",nombre," ",apellido) as nombrec'))->where('idrol','<>',1)->orderby('nombre','asc')->lists('nombrec','id')/*--}}
												{!! Form::select('iduser', $user, null, array('class' => 'form-control' )) !!}
												{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-md-6 col-md-offset-4">
												<button type="submit" class="btn btn-primary">REGISTRAR</button>
											</div>
										</div>
									 {!!Form::close()!!}
								@endif	
							</div>
							<br><br>
							<!--inicio de la tabla -->
							<div class="table-responsive">
							<h4 class="text-center">Materias que puede dar un Docente</h4>	
							{!! Form::open(['method' => 'GET','route' => 'materiaqpdud.index']) !!}
								<div class="form-group bg-warning">
								<br>
								<div class="col-md-6">
									<label class="col-md-8">{!! Form::text('users1', null, array('class' => 'form-control', 'placeholder' => 'Escriba el nombre')) !!}</label>
										<button type="submit" class="btn btn-success">Buscar</button>		
								</div>
								<br><br><br>
								</div>	
							{!! Form::close() !!}
								<table class="table2">
									<tr class="strong text-center bg-info tr2"><td>NOMBRE</td><td>APELLIDO</td><td>CEDULA</td><td>MOSTRAR</td></tr>
									<br>
									@foreach($mxd as $user)
										<tr class="text-center tr2">
											@if($user->idrol == 1)
											@else
												<td>{{$user->nombre}}</td>
												<td>{{$user->apellido}}</td>
												<td>{{$user->cedula}}</td>
												<td><a href="menu_ver2{{$user->id}}" class="btn btn-success  open"><i class="glyphicon  glyphicon-eye-open"></i></a></td>
											@endif
										
										
										
										</tr>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
										
										<tr id="menu_ver2{{$user->id}}" style="display:none;">
											<td colspan="8">
												
												
													<table class="table2">
															<tr class="strong text-center bg-info tr2">
																<td>MATERIAS</td>
																<td>EDITAR</td>
																	@if(Auth::user()->idrol == 1)
																		<td>ELIMINAR</td>
																	@endif
															</tr>
															
															
															{{--*/
																				$idmaterias2=DB::table('materiaqpdud')
																						->where('iduser', $user->id)																						
																						->get();																
															/*--}}
															
															@foreach($idmaterias2 as $materia3)
																<tr class="text-center tr2">
																		
																		

																	<td>{{$idmateria = DB::table('materias')
																		->where('id', $materia3->idmateria)
																		->pluck('codigomateria')}}
																		{{$idmateria = DB::table('materias')
																		->where('id', $materia3->idmateria)
																		->pluck('materia')}}</td>
																					
																	<td>{!! Form::open(['method' => 'GET','route' => ['materiaqpdud.edit', $materia3->id]]) !!}
																		{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
																		{!! Form::close() !!}</td>
																		
																	@if(Auth::user()->idrol == 1)	
																		<td>{!! Form::open(['method' => 'DELETE','route' => ['materiaqpdud.destroy', $materia3->id]]) !!}
																		{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
																		{!! Form::close() !!}</td>
																	@endif	
																
																
																</tr>	 
															@endforeach
														</table>	
													
											</td>
										</tr>
<!--------------------------------------------------------------------------------------------------------------------------------------------->			
									@endforeach	
								</table>
								<div class="text-center">
									{!!str_replace('/?','?',$mxd->appends(Input::except('page'))->render())!!}
								</div>
							</div>


	@endsection
