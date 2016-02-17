<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<title>HORARIOS</title>

		<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<!-- Fonts -->
		

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="{{ asset('/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('/js/respond.min.js') }}"></script>

		<![endif]-->
	</head>
	<body>
		<div id="wrap" >
			<div class="container clearf" id="main">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle Navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="{{ url('/auth/login') }}">HORARIO DOCENTES</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								@if (Auth::guest())
									<li><a href="{{ url('/auth/login') }}">Iniciar Sesión</a></li>
								@else
									@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 4 or Auth::user()->idrol == 5 or Auth::user()->idrol == 6 or Auth::user()->idrol == 7)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administración<span class="caret"></span></a>
											<ul class="dropdown-menu bg-info" role="menu">
												<li class="bg-info"><a href="{{ url('/user') }}">Usuarios</a></li>
												<li class="bg-info"><a href="{{ url('/carreras') }}">Carreras</a></li>
												<li class="bg-info"><a href="{{ url('/materias') }}">Materias</a></li>
												<li class="bg-info"><a href="{{ url('grupos') }}">Grupos</a></li>
												<li class="bg-info"><a href="{{ url('/planes') }}">Planes</a></li>
												<li class="bg-info"><a href="{{ url('/materiaqpdud') }}">MqpduD</a></li>
												<li class="bg-info"><a href="{{ url('/salones') }}">Salones</a></li>
												<li class="bg-info"><a href="{{ url('/laboratorios') }}">Laboratorios</a></li>
												@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
													<li class="bg-info"><a href="{{ url('/rol') }}">Roles</a></li>
													<li class="bg-info"><a href="{{ url('/cargos') }}">Cargos</a></li>
													<li class="bg-info"><a href="{{ url('/sede') }}">Sedes</a></li>
													<li class="bg-info"><a href="{{ url('/edificios') }}">Edificios</a></li>
													<li class="bg-info"><a href="{{ url('/departamento') }}">Departamentos</a></li>
													<li class="bg-info"><a href="{{ url('/cargospd') }}">Cargospd</a></li>
												@endif
												@if(Auth::user()->idrol == 1)
													<li class="bg-info"><a href="{{ url('/cpm') }}">MxCxP</a></li>
												@endif
											</ul>
										</li>
									@endif
									@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 4 or Auth::user()->idrol == 5 or Auth::user()->idrol == 6 or Auth::user()->idrol == 7)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solicitudes<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li class="bg-info"><a href="{{ url('/solicitud') }}">Crear solicitud</a></li>
												<li class="bg-info"><a href="{{ url('/atender') }}">Atender solicitud</a></li>
												<li class="bg-info"><a href="{{ url('/versol') }}">Ver solicitudes</a></li>
												@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
													<li class="bg-info"><a href="{{ url('/rgral') }}">Reporte general</a></li>
													<li class="bg-info"><a href="{{ url('/c') }}">Reporte por Usuario</a></li>
												@endif
											</ul>
										</li>
									@endif
									@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 4 or Auth::user()->idrol == 5 or Auth::user()->idrol == 6 or Auth::user()->idrol == 7)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Horarios<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li class="bg-info"><a href="{{ url('/horarios') }}">Generar Horarios</a></li>
												<li class="bg-info"><a href="{{ url('/verhorarios') }}">Ver Horarios</a></li>
											</ul>
										</li>
									@endif
									@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li class="bg-info"><a href="{{ url('/c') }}">Reporte General</a></li>
												<li class="bg-info"><a href="{{ url('/c') }}">Reportes Filtrados</a></li>
											</ul>
										</li>
									@endif
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nombre}} {{ Auth::user()->apellido}}<span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											@if(Auth::user()->idrol <> 1)
												<li class="bg-info"><a href="{{ url('/verp') }}">Mi Horario</a></li>
											@endif
											<li class="bg-info"><a href="{{ url('/useredit') }}">Editar Perfil</a></li>
											<li class="bg-info"><a href="{{ url('/passedit') }}">Cambiar Contraseña</a></li>
											<li class="bg-info"><a href="{{ url('/auth/logout') }}">Logout</a></li>
										</ul>
									</li>
								@endif
							</ul>
						</div>
					</div>
				</nav>
				@yield('content')
			</div>
		</div>
		<div  class="navbar col-md-12 alert alert-info alert-dismissable">
			<ul class="nav navbar-nav navbar-left">
				<li><a class="navbar-brand" href="http://www.utp.ac.pa" target="_blank">UTP</a></li>
				<li><a class="navbar-brand" href="http://correo.utp.ac.pa/" target="_blank">Correo UTP</a></li>
				<li><a class="navbar-brand" href="http://matricula.utp.ac.pa" target="_blank">Matricula UTP</a></li>
				<li><a class="navbar-brand" href="http://biblioteca.utp.ac.pa/gbi/" target="_blank">Biblioteca UTP</a></li>
				<li><a class="navbar-brand" href="http://moodlech.utp.ac.pa/" target="_blank">Moodlech UTP</a></li>
				<li><a class="navbar-brand" href="http://siesa.utp.ac.pa/" target="_blank">Portafolio Docente UTP</a></li>
			</ul> 
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-brand">Contactenos:</li>
				<li><a class="navbar-brand" href="https://www.facebook.com/paginautp" target="_blank" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a class="navbar-brand" href="https://twitter.com/utppanama" target="_blank" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a class="navbar-brand" href="https://www.youtube.com/user/UTPPanama" target="_blank" class="btn btn-social-icon btn-youtube"><i class="fa fa-youtube"></i></a></li>
			</ul>
		</div>
		<div class="navbar col-md-12 alert alert-info alert-dismissable">
			<footer class="">
				<center><strong><h4>UTP Chiriqu&iacute; - Laboratorio de Investigación y Desarrollo de Software - 2015 &COPY; Todos los Derechos Reservados</h4></strong></center>
			<footer>
		</div>
		<!-- Scripts -->
		<script src="{{ url('/js/jquery.min.js') }}"></script>
		<script src="{{ url('/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('/js/moodalbox.js') }}"></script>
		<script src="{{ url('/js/script.js') }}"></script>
		<script type="text/javascript">var baseurl='{{url("/")}}'</script>
	</body>
</html>
