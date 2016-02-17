@extends('app')

@section('content')
<div class="container-fluid">
	{{--@foreach(User::all() as $user)
		{{ $user->cedula }}<br>
	@endforeach--}}
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar Sesión</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hay problemas con los datos ingresados.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Entrar</button>
								<br>
								
							</div>
						</div>
						<center>
            			<div class="navbar alert alert-info alert-dismissable">
							<i class="glyphicon glyphicon-info-sign"><strong> Si olvido su contraseña acercarse a la oficina del Laboratorio de Investigación y Desarrollo de Software. O escriba un correo a <a href="https://login.microsoftonline.com/" target="_blank">jaime.palacios@utp.ac.pa</a> o <a href="https://login.microsoftonline.com/">anthony.castillo@utp.ac.pa</a> solicitando restaurarla.</strong></i>
						</div>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
