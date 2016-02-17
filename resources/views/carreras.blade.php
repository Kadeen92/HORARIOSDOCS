@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Carreras</div>
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
								{!! Form::model($carreras, $parametros['ruta']) !!}
									<div class="form-group">
										<label class="col-md-4 control-label">NUEVA CARRERA</label>
										<div class="col-md-6">
											{!! Form::text('carrera', null, array('class' => 'form-control', 'placeholder' => 'Nueva Carrera')) !!}
										</div>
									</div>	
									<br><br><br>
									<div class="form-group">
										<label class="col-md-4 control-label">CÓDIGO DE CARRERA</label>
										<div class="col-md-6">
											{!! Form::text('codcarrera', null, array('class' => 'form-control', 'placeholder' => 'Código de Carrera')) !!}
										</div>
									</div>	
									<br><br>
									<div class="form-group">
										<label class="col-md-4 control-label">CÓDIGO DE GRUPO</label>
										<div class="col-md-6">
											{!! Form::text('codgrupo', null, array('class' => 'form-control', 'placeholder' => 'Código de Carrera')) !!}
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
							<div class="table-responsive">
								<h4 class="text-center">Lista de Carreras</h4>
								{!! Form::open(['method' => 'GET','route' => 'carreras.index']) !!}
									<div class="form-group bg-warning">
									<br>
										<div class="col-md-6">
											<label class="col-md-8">{!! Form::text('carrera1', null, array('class' => 'form-control', 'placeholder' => 'Escriba la carrera')) !!}</label>
											<button type="submit" class="btn btn-success">Buscar</button>		
										</div>
									<br><br><br>
									</div>	
								{!! Form::close() !!}
								{{--TABLA QUE AGRUPA A LAS CARRERAS ALMACENADAS PARA PODER EDITARLAS O ELIMINARLAS--}}
								<table class="table2">
									<tr class="strong text-center bg-info tr2"><td>CARRERAS</td><td>CÓDIGOS</td><td>CÓD. DE GRUPO</td><td>FACULTAD</td><td>ESTADO</td>
										@if(Auth::user()->idrol == 1)
											<td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td><td>ELIMINAR</td>
										@endif
										@if(Auth::user()->idrol == 5)
											<td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td>
										@else
										@endif
									</tr>
									@foreach($carrera as $carreras)
										@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
											<tr class="text-center tr2">
												<td>{{$carreras->carrera}}</td>
												<td>{{$carreras->codcarrera}}</td>
												<td>{{$carreras->codgrupo}}</td>
												<td>{{$fac = DB::table('facultades')->where('id', $carreras->idfacultad)->pluck('facultad')}}</td>
												@if($carreras->inactivo == 1)
													<td class="text-success">ACTIVO</td>
												@else
													<td class="text-danger">INACTIVO</td>
												@endif
												<td>
													@if($carreras->inactivo == 1)
														{!! Form::open(['method' => 'PATCH','route' => ['carreras.update', $carreras->id]]) !!}
														{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
														{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
														{!! Form::close() !!}
													@endif
													@if($carreras->inactivo == 0)
														{!! Form::open(['method' => 'PATCH','route' => ['carreras.update', $carreras->id]]) !!}
														{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
														{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
														{!! Form::close() !!}
													@endif
												</td>
												<td>{!! Form::open(['method' => 'GET','route' => ['carreras.edit', $carreras->id]]) !!}
													{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}</td>
												@if(Auth::user()->idrol == 1)
													<td>{!! Form::open(['method' => 'DELETE','route' => ['carreras.destroy', $carreras->id]]) !!}
														{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
														{!! Form::close() !!}</td>
												@endif
										@endif
										@if(Auth::user()->idrol == 4)
											@if($carreras->inactivo == 1)
												<tr class="text-center tr2">
													<td>{{$carreras->carrera}}</td>
													<td>{{$carreras->codcarrera}}</td>
													<td>{{$carreras->codgrupo}}</td>
													<td>{{$fac = DB::table('facultades')->where('id', $carreras->idfacultad)->pluck('facultad')}}</td>
													<td class="text-success">ACTIVO</td>
											@else
												<tr class="text-center tr2 text-muted">
													<td >{{$carreras->carrera}}</td>
													<td>{{$carreras->codcarrera}}</td>
													<td>{{$carreras->codgrupo}}</td>
													<td>{{$fac = DB::table('facultades')->where('id', $carreras->idfacultad)->pluck('facultad')}}</td>
													<td class="text-danger">INACTIVO</td>
											@endif
										@endif
											</tr>	 
									@endforeach
								</table>
								<div class="text-center">
									{!!str_replace('/?','?',$carrera->appends(Input::except('page'))->render())!!}	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
