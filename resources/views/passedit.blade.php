@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Cambiar contraseña</div>
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
							
							@if(Session::has('alerta1'))
								<div class="alert alert-danger alert-dismissable">
                					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               						<i class="glyphicon glyphicon-exclamation-sign"><strong> {{Session::get('alerta1')}}</strong></i>
            					</div>
							@endif
							@if(Session::has('alerta2'))
								<div class="alert alert-danger alert-dismissable">
                					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               						<i class="glyphicon glyphicon-exclamation-sign"><strong> {{Session::get('alerta2')}}</strong></i>
            					</div>
							@endif
							@if(Session::has('alerta3'))
								<div class="alert alert-success alert-dismissable">
               						<h5><i class="glyphicon glyphicon-check"></i><strong> {{Session::get('alerta3')}}</strong></i>
               							<strong>Vuelva a iniciar sesión </strong><a href="{{ url('/auth/logout') }}" class="btn btn-success" data-dismiss="alert" aria-hidden="true">Ahora</a>
               							<a type="button" class="btn btn-warning" data-dismiss="alert" aria-hidden="true">Luego</a></h5>
            					</div>
							@endif
							@if(Session::has('alerta4'))
								<div class="alert alert-danger alert-dismissable">
                					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               						<i class="glyphicon glyphicon-exclamation-sign"><strong> {{Session::get('alerta4')}}</strong></i>
            					</div>
							@endif
							{!! Form::model($passedit, $parametros['ruta']) !!}
																
								<div class="form-group">
									<label class="col-md-4 control-label">CONTRASEÑA ACTUAL</label>
									<div class="col-md-6">
										{!! Form::password('control2', array('class' => 'form-control', 'placeholder' => 'Ingrese la contraseña actual')) !!}
									</div>
								</div>			
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">CONTRASEÑA NUEVA</label>
									<div class="col-md-6">
										{!! Form::password('newpass', array('class' => 'form-control', 'placeholder' => 'Ingrese su nueva contraseña')) !!}
									</div>
								</div>			
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">REPETIR CONTRASEÑA</label>
									<div class="col-md-6">
										{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Repita la contraseña')) !!}
										{!! Form::hidden('control1', Auth::user()->id) !!}
									</div>
								</div>	
								<br><br>
								
								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-success">Cambiar</button>
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
