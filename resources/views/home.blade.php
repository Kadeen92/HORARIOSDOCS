@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class=" panel-heading">Home</div>
				@if(\Hash::check('12345678', Auth::user()->password))
					<center>
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h2>
								<i class="glyphicon glyphicon-warning-sign alert-warning"><strong> Por seguridad recuerda cambiar tu contraseña!!! </strong></i>
							</h2>
						</div>
					</center>
				@endif
				<div class="panel-body ">
					<center><img class="img-responsive" src="./img/abc-cambio-horario-644x3621.jpg">
					<br><br><h3>Bienvenido a HORARIOS DOCENTES, {{ Auth::user()->nombre}} {{ Auth::user()->apellido}}!!</h3></center>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
