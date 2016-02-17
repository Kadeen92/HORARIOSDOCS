@extends('app')
	@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading strong">Planes</div>
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
						
					</div>
					<div class="table-responsive"><br><br>
						<h4 class="text-center">Lista de Planes</h4><br>
						{!! Form::open(['method' => 'GET','route' => 'pag.index']) !!}
							<div class="form-group">
										<label class="col-md-4 control-label">{!! Form::text('plan1', null, array('class' => 'form-control', 'placeholder' => 'Escriba el plan')) !!}</label>
											<div class="col-md-6">
												<button type="submit" class="btn btn-success">Buscar</button>
											</div>
									</div>	
						{!! Form::close() !!}
						<br><br>
							<table class="table2">
								<tr class="strong text-center bg-info tr2"><td>PLAN</td><td>CARRERA</td>
									@if(Auth::user()->idrol == 1)
										<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td><td>ELIMINAR</td>
									@endif
									@if(Auth::user()->idrol == 5)
										<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td>
									@else
									@endif
								</tr>
								@foreach($plan as $planes)
									@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
										<tr class="text-center tr2"><td>{{$planes->plan}}</td>
											<td>{{$carr = DB::table('carreras')->where('id', $planes->idcarrera)->pluck('carrera')}}</td>
											@if($planes->inactivo == 1)
												<td class="text-success">ACTIVO</td>
											@else
												<td class="text-danger">INACTIVO</td>
											@endif
											<td>
												@if($planes->inactivo == 1)
													{!! Form::open(['method' => 'PATCH','route' => ['planes.update', $planes->id]]) !!}
													{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
													{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
													{!! Form::close() !!}
												@endif
												@if($planes->inactivo == 0)
													{!! Form::open(['method' => 'PATCH','route' => ['planes.update', $planes->id]]) !!}
														{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
														{!! Form::submit('Activar', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}
												@endif
											</td>		
											<td>{!! Form::open(['method' => 'GET','route' => ['planes.edit', $planes->id]]) !!}
													{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
												{!! Form::close() !!}</td>
											@if(Auth::user()->idrol == 1)
												<td>{!! Form::open(['method' => 'DELETE','route' => ['planes.destroy', $planes->id]]) !!}
														{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!}</td>
											@endif
											@if(Auth::user()->idrol == 4)
												@if($planes->inactivo == 1)
													<tr class="text-center tr2"><td>{{$planes->plan}}</td>
														<td>{{$carr = DB::table('carreras')->where('id', $planes->idcarrera)->pluck('carrera')}}</td>
												@endif
											@endif
									@endif
										</tr>
									
								@endforeach
								
							</table>
							{!!str_replace('/?','?',$plan->render())!!}
						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

