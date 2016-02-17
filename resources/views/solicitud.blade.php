@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Nueva Solicitud</div>
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
							{!! Form::model($solicitud, $parametros['ruta']) !!}
								<div class="form-group">
									<label class="col-md-4 control-label">TIPO DE SOLICITUD</label>
									<div class="col-md-6">
										{!! Form::hidden('efectuado-por', Auth::user()->id ) !!}
										{!! Form::select('idtiposol', App\Tiposol::lists('tipo', 'id'), null, array('class' => 'form-control')) !!}
									</div>
								</div>
								<br><br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">SOLICITUD</label>
									<div class="col-md-6">
										{!! Form::textarea('solicitud', null, array('class' => 'form-control', 'placeholder' => 'solicitud')) !!}
									</div>
								</div>			
								<br><br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">RECEPTOR</label>
									<div class="col-md-6">
										{{--*/$user = App\User::select('id',DB::raw('concat(nombre," ",apellido) as nombrec'))->where('idrol','<>',1)
										->where('idrol','<>',2)->where('idrol','<>',3)->lists('nombrec','id')/*--}}
										{!! Form::select('atendido_por', $user, null, array('class' => 'form-control')) !!}
										{!! Form::hidden('idestado',1) !!}
									</div>
								</div>
								<br><br><br>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-success">REGISTRAR</button><br>
									</div>
								</div>
								<br><br>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
