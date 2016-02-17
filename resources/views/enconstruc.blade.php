@extends('app')
	@section('content')
		<div class="container-fluid">
			<br><br>
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
				<br><br>
				<center>
					<img class="img-responsive" src="./img/c.png"><br><br>
					<h2 class="alert aler-warning">Vista en construcción<h2> <a href="{{ url('/') }}" class="btn btn-success">Volver</a>
			
				</center>
			</div>
			
		</div>
	@endsection
