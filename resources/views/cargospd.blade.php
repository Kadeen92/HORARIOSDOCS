@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Cargos por Docentes</div>
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
									{!! Form::model($cargospd, $parametros['ruta']) !!}
										<div class="form-group">
										<label class="col-md-4 control-label">PROFESOR</label>
											<div class="col-md-6">
												{{--*/$user = App\User::select('id',DB::raw('concat(cedula," ",nombre," ",apellido) as nombrec'))->where('idrol','<>',1)->lists('nombrec','id')/*--}}
												{!! Form::select('iduser', $user, null, array('class' => 'form-control')) !!}
											</div>
										</div>			
										<br><br>
										<div class="form-group">
										<label class="col-md-4 control-label">TIPO DE GRUPO</label>
											<div class="col-md-6">
												{!! Form::select('idcargos', App\Cargos::lists('cargo', 'id'), null, array('class' => 'form-control', 'id' => 'idcargos')) !!}
												{!! Form::hidden('inactivo', 1 ) !!}
											</div>
										</div>		
										<br><br>
										<div class="form-group">
											<div class="col-md-6 col-md-offset-4">
												<button type="submit" class="btn btn-success">REGISTRAR</button>
											</div>
										</div>
										<br><br>
									{!! Form::close() !!}
								@endif
								<!--inicio de la tabla -->
								<div class="table-responsive">
									<h4 class="text-center">Cargos de los Docentes</h4>	
									{!! Form::open(['method' => 'GET','route' => 'cargospd.index']) !!}
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
											@foreach($cxd as $user)
												@if($user->idrol == 1)
												@else
													<tr class="text-center tr2">
														<td>{{$user->nombre}}</td>
														<td>{{$user->apellido}}</td>
														<td>{{$user->cedula}}</td>	
														<td><button data-toggle="modal" data-target="#showModal1" class="btn btn-primary center-block mostrar1" data-id="{{$user->id}}">MOSTRAR</button></td>
													</tr>
												@endif
										@endforeach	
									</table>
									<div class="text-center">
										{!!str_replace('/?','?',$cxd->appends(Input::except('page'))->render())!!}
									</div>
								</div>
								<!-----------------------fin de la tabla---------------------->	
								@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
								<!-----------------------inicio de la tabla---------------------->	
								<div class="container" id="menu_cargos" style="display:none;">
									<div class="row">
										<div class="col-md-10 col-md-offset-1">	
											<div class="panel panel-default">
												<div class="  panel-heading">EDITAR y ELIMINAR</div>		
													<div class="panel-body ">
														<h4 class="text-center">Lista de Cargos por  Profesores</h4>
														{{--TABLA QUE AGRUPA A LOS ROLES ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS--}}
														<div class="table-responsive">
															<table class="table2">
																<tr class="strong text-center bg-info tr2"><td>PROFESORES</td><td>CARGOS</td><td>EDITAR</td>
																	@if(Auth::user()->idrol == 1)
																	<td>ELIMINAR</td>
																	@endif
																</tr>
																@foreach(App\Cargospd::all() as $especialidadpd)
																	<tr class="text-center tr2">
																		<td>{{$iduser = DB::table('users')->where('id', $especialidadpd->iduser)->pluck('cedula')}} 
																			{{$iduser = DB::table('users')->where('id', $especialidadpd->iduser)->pluck('nombre')}} 
																			{{$iduser = DB::table('users')->where('id', $especialidadpd->iduser)->pluck('apellido')}}</td>
																		<td>{{$idcargo = DB::table('cargos')->where('id', $especialidadpd->idcargos)->pluck('cargo')}}</td>
																		<td>{!! Form::open(['method' => 'GET','route' => ['cargospd.edit', $especialidadpd->id]]) !!}
																			{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
																			{!! Form::close() !!}</td>
																		@if(Auth::user()->idrol == 1)
																			<td>{!! Form::open(['method' => 'DELETE','route' => ['cargospd.destroy', $especialidadpd->id]]) !!}
																				{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
																				{!! Form::close() !!}</td>
																		@endif
																	</tr>	 
																@endforeach
															</table>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>			
								@endif	
								<!-----------------------inicio del modal box---------------------->			
								<div class="modal fade" id="showModal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<h3 class="modal-title" id="lineModalLabel">CARGOS POR DOCENTE</h3>
											</div>
											<div class="modal-body">
												{{--********************************************CONTENIDO DEL MODAL**********************************************--}}
												<div class="table-responsive">
													<table class="table2 bg-dan-ger">
														<thead>
															<tr class=" bg-info tr2 strong text-center tr2"><td>CARGOS</td></tr>
														</thead>	
														<tbody id="bodytable1">
														</tbody>
														<!-----------------------editar y eliminar---------------------->			
														<!--------------------------------------------------------------->			
													</table>
												<br><br>
												</div>
												{{--*****************************************************************************************************************--}}
												{{--footer del modal  por ahora no posee nada --}}
												<div class="modal-footer">
												</div>
												{{--*******************************************--}}
												<!-----------------------fin del modal---------------------->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
