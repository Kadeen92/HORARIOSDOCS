@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Atender Solicitudes</div>
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
							<h4 class="text-center strong">Lista de Solicitudes Pendientes</h4>
							<div class="table-responsive">
								<table class="table2 bg-danger">
									<tr class="strong text-center tr2"><td>SOLICITUD</td><td>ESTADO</td><td>SOLICITANTE</td><td>FECHA</td><td>ATENDER</td></tr>
									@foreach(App\Atender::all() as $atender)
										<tr class="text-center tr2">
											@if($atender->idestado == 1 and Auth::user()->id == $atender->atendido_por)
												<td>{{$atender->solicitud}}</td>
												<td>{{$idestado = DB::table('statuss')->where('id', $atender->idestado)->pluck('estado')}}</td>
												<td>{{$efectuado_por = DB::table('users')->where('id', $atender->efectuado_por)->pluck('nombre')}}</td>
												<td>{{$atender->created_at}}</td>
												<td>{!! Form::open(['method' => 'PATCH','route' => ['atender.update', $atender->id]]) !!}
													{!! Form::hidden('idestado', 2) !!}
													{!! Form::hidden('atendido_por', Auth::user()->id) !!}
													{!! Form::submit('Atender', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}</td>
											@endif
										</tr> 
									@endforeach
								</table>
							</div>	
							<br><br><br>
							<h4 class="text-center strong">Lista de Solicitudes en Proceso de Atención</h4>
							<div class="table-responsive">
								<table class="table2 bg-warning">
									<tr class="strong text-center tr2"><td>SOLICITUD</td><td>ESTADO</td><td>SOLICITANTE</td><td>FECHA</td><td>Respuesta</td><td>Culminar</td></tr>
									@foreach(App\Atender::all() as $atender)
										<tr class="text-center tr2">
											@if($atender->idestado == 2 and Auth::user()->id == $atender->atendido_por)
												<td>{{$atender->solicitud}}</td>
												<td>{{$idestado = DB::table('statuss')->where('id', $atender->idestado)->pluck('estado')}}</td>
												<td>{{$efectuado_por = DB::table('users')->where('id', $atender->efectuado_por)->pluck('nombre')}}</td>
												<td>{{$atender->updated_at}}</td>
												<td>{!! Form::open(['method' => 'PATCH','route' => ['atender.update', $atender->id]]) !!}
													{!! Form::text('comentarios', null, array('class' => 'form-control')) !!}</td>
												<td>{!! Form::hidden('idestado', 3) !!}
													{!! Form::hidden('atendido_por', Auth::user()->id) !!}
													{!! Form::submit('Culminar', ['class' => 'btn btn-warning']) !!}
													{!! Form::close() !!}</td>
											@endif
										</tr> 
									@endforeach
								</table>
							</div>
							<br><br><br>
							<h4 class="text-center strong">Lista de Solicitudes Atendidas</h4>
							<div class="table-responsive">
								<table class="table2 bg-success">
									<tr class="strong text-center tr2"><td>SOLICITUD</td><td>ESTADO</td><td>SOLICITANTE</td><td>FECHA</td><td>RESPUESTA</td></tr>
									@foreach(App\Atender::all() as $atender)
										<tr class="text-center tr2 text-muted">
											@if($atender->idestado == 3 and Auth::user()->id == $atender->atendido_por)
												<td>{{$atender->solicitud}}</td>
												<td>{{$idestado = DB::table('statuss')->where('id', $atender->idestado)->pluck('estado')}}</td>
												<td>{{$efectuado_por = DB::table('users')->where('id', $atender->efectuado_por)->pluck('nombre')}}</td>
												<td>{{$atender->updated_at}}</td>
												<td>{{$atender->comentarios}}</td>
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
	@endsection
