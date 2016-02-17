@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Mis Solicitudes</div>
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
							<div class="table-responsive">
								<h4 class="text-center strong">Solicitudes</h4>
								<table class="table2">
									<tr class="strong text-center tr2"><td>SOLICITUD</td><td>COORDINADOR</td><td>FECHA DE SOLICITUD</td><td>ESTADO</td><td>RESPUESTA</td></tr>
									@foreach(App\Solicitud::all() as $solicitud)
										@if(Auth::user()->id == $solicitud->efectuado_por)
											<tr class="text-center tr2">
												<td>{{$solicitud->solicitud}}</td>
												<td>{{$atendido_por = DB::table('users')->where('id', $solicitud->atendido_por)->pluck('nombre')}}</td>
												<td>{{$solicitud->created_at}}</td>
												<td>{{$estado = DB::table('statuss')->where('id', $solicitud->idestado)->pluck('estado')}}</td>
												<td>{{$solicitud->comentarios}}</td>
											</tr>
										@endif
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
