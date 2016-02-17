@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Editar Perfil</div>
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
							<!--
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
							@endif-->
							{!! Form::model($useredit, $parametros['ruta']) !!}
																
								<div class="form-group">
									<label class="col-md-4 control-label">NOMBRE</label>
									<div class="col-md-6">
										{!! Form::text('nombre', Auth::user()->nombre, array('class' => 'form-control', 'placeholder' => 'Nombre')) !!}
									</div>
								</div>			
								<br><br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">APELLIDO</label>
									<div class="col-md-6">
										{!! Form::text('apellido', Auth::user()->apellido, array('class' => 'form-control', 'placeholder' => 'Apellido')) !!}
									</div>
								</div>
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">CEDULA</label>
									<div class="col-md-6">
										{!! Form::text('cedula', Auth::user()->cedula, array('class' => 'form-control', 'placeholder' => 'Cedula')) !!}
									</div>
								</div>
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">FECHA DE NACIMIENTO </label>
									<div class="col-md-6">
										{!! Form::text('fecha_nac', Auth::user()->fecha_nac, array('class' => 'form-control', 'placeholder' => 'dd/mm/aa')) !!}
									</div>
								</div>
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">TELEFONO </label>
									<div class="col-md-6">
										{!! Form::text('telefono', Auth::user()->telefono, array('class' => 'form-control', 'placeholder' => 'Telefono')) !!}
									</div>
								</div>
								<br><br>
								<div class="form-group">
									<label class="col-md-4 control-label">CELULAR</label>
									<div class="col-md-6">
										{!! Form::text('celular', Auth::user()->celular, array('class' => 'form-control', 'placeholder' => 'Celular')) !!}
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
