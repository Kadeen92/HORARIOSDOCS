@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Departementos</div>
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
								{!! Form::model($departamento, $parametros['ruta']) !!}
									<div class="form-group">
										<label class="col-md-4 control-label">NUEVO DEPARTAMETO</label>
										<div class="col-md-6">
											{!! Form::text('departamento', null, array('class' => 'form-control', 'placeholder' => 'Departamento')) !!}
										</div>
									</div>				
									<br><br>
									<div class="form-group">
										<label class="col-md-4 control-label">FACULTAD</label>
										<div class="col-md-6">
											{!! Form::select('idfacultad', App\Facultad::lists('facultad', 'id'), null, array('class' => 'form-control')) !!}
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
								<div class="table-responsive">
									<h4 class="text-center">Lista de Departamentos</h4>
									{{--TABLA QUE AGRUPA LOS DEPARTAMENTOS REGISTRADOS PARA PODER EDITARLAS O ELIMINARLAS--}}
									<center><table class="table3">
										<tr class="strong text-center bg-info tr2"><td>DEPARTAMENTO</td><td>FACULTAD</td><td>EDITAR</td><td>ELIMINAR</td>
										</tr>

										@foreach(App\Departamento::all() as $departamento)
											<tr class="text-center tr2"><td>{{$departamento->departamento}}</td>
												<td>{{$fac = DB::table('facultades')->where('id', $departamento->idfacultad)->pluck('facultad')}}</td>
												<td>{!! Form::open(['method' => 'GET','route' => ['departamento.edit', $departamento->id]]) !!}
													{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}</td>  
												<td>{!! Form::open(['method' => 'DELETE','route' => ['departamento.destroy', $departamento->id]]) !!}
													{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!}</td>  
											</tr>
										@endforeach
								</table></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
