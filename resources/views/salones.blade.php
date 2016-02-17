@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Salones</div>
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
								{!! Form::model($salones, $parametros['ruta']) !!}
									<div class="form-group">
										<label class="col-md-4 control-label">NUEVO SALON</label>
										<div class="col-md-6">
											{!! Form::text('salon', null, array('class' => 'form-control', 'placeholder' => 'Nueva Salón')) !!}
										</div>
									</div>			
									<br><br>
									<div class="form-group">
										<label class="col-md-4 control-label">FACULTAD</label>
										<div class="col-md-6">
											{!! Form::select('idfacultad', App\Facultad::lists('facultad', 'id'), null, array('class' => 'form-control')) !!}
											{!! Form::hidden('inactivo', 1, array('class' => 'form-control', 'placeholder' => 'Créditos')) !!}
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
							</div>
							<div class="table-responsive">
								<h4 class="text-center">Lista de Salones</h4>
								{!! Form::open(['method' => 'GET','route' => 'salones.index']) !!}
									<div class="form-group bg-warning">
									<br>
										<div class="col-md-6">
											<label class="col-md-8">{!! Form::text('salon1', null, array('class' => 'form-control', 'placeholder' => 'Escriba el plan')) !!}</label>
												<button type="submit" class="btn btn-success">Buscar</button>		
										</div>
										<br><br><br>
									</div>	
								{!! Form::close() !!}
								{{--TABLA QUE AGRUPA A LOS SALONES ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS--}}
								<table class="table2">
									<tr class="strong text-center bg-info tr2"><td>SALON</td><td>FACULTAD</td><td>ESTADO</td>
										@if(Auth::user()->idrol == 1)
											<td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td><td>ELIMINAR</td>
										@endif
										@if(Auth::user()->idrol == 5)
											<td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td>
										@else
										@endif
									</tr>
									@foreach($salon as $salones)
										@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
											<tr class="text-center tr2">
												<td>{{$salones->salon}}</td>
												<td>{{$fac = DB::table('facultades')->where('id', $salones->idfacultad)->pluck('facultad')}}</td>
												@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
													@if($salones->inactivo == 1)
														<td class="text-success">ACTIVO</td>
													@else
														<td class="text-danger">INACTIVO</td>
													@endif
													<td>
														@if($salones->inactivo == 1)
															{!! Form::open(['method' => 'PATCH','route' => ['salones.update', $salones->id]]) !!}
																{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
																{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
															{!! Form::close() !!}
														@endif
														@if($salones->inactivo == 0)
															{!! Form::open(['method' => 'PATCH','route' => ['salones.update', $salones->id]]) !!}
																{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
																{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
															{!! Form::close() !!}
														@endif
													</td>		
													<td>{!! Form::open(['method' => 'GET','route' => ['salones.edit', $salones->id]]) !!}
															{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
														{!! Form::close() !!}</td>
													@if(Auth::user()->idrol == 1)
														<td>{!! Form::open(['method' => 'DELETE','route' => ['salones.destroy', $salones->id]]) !!}
																{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
															{!! Form::close() !!}</td>
													@endif
												@endif
										@endif
										@if(Auth::user()->idrol == 4)
											@if($salones->inactivo == 1)
												<tr class="text-center tr2">
													<td>{{$salones->salon}}</td>
													<td>{{$fac = DB::table('facultades')->where('id', $salones->idfacultad)->pluck('facultad')}}</td>
													<td class="text-success">ACTIVO</td>
											@else
												<tr class="text-center tr2 text-muted">
													<td>{{$salones->salon}}</td>
													<td>{{$fac = DB::table('facultades')->where('id', $salones->idfacultad)->pluck('facultad')}}</td>
													<td class="text-danger">INACTIVO</td>
											@endif
										@endif
											</tr>
									@endforeach
								</table>
								<div class="text-center">
									{!!str_replace('/?','?',$salon->appends(Input::except('page'))->render())!!}
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
