@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Sedes</div>
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
							{!! Form::model($sede, $parametros['ruta']) !!}
								<div class="form-group">
								<label class="col-md-4 control-label">NUEVA SEDE</label>
									<div class="col-md-6">
										{!! Form::text('sede', null, array('class' => 'form-control', 'placeholder' => 'Nueva sede')) !!}
									</div>
								</div>			
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">PROVINCIA</label>
									<div class="col-md-6">
										{!! Form::select('idprovincia', App\Provincia::lists('provincia', 'id'), null, array('class' => 'form-control')) !!}
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
							</div>
							<div class="table-responsive">
								<h4 class="text-center">Lista de Personas</h4>
								{{--TABLA QUE AGRUPA A LAS PERSONAS ALMACENADAS PARA PODER EDITARLAS O ELIMINARLAS--}}
								<table class="table2">
									<tr class="strong text-center bg-info tr2"><td>SEDES</td><td>PROVINCIA</td><td>EDITAR</td><td>ELIMINAR</td></tr>
									@foreach(App\Sede::all() as $sede)
										<tr class="text-center tr2">
											<td>{{$sede->sede}}</td>
											<td>{{$prov = DB::table('provincias')->where('id', $sede->idprovincia)->pluck('provincia')}}</td>
											<td>{!! Form::open(['method' => 'GET','route' => ['sede.edit', $sede->id]]) !!}
													{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
												{!! Form::close() !!}</td>
											<td>{!! Form::open(['method' => 'DELETE','route' => ['sede.destroy', $sede->id]]) !!}
													{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
												{!! Form::close() !!}</td>
										</tr>	 
									@endforeach
								</table>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
