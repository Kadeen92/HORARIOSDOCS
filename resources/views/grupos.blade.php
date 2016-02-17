@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading strong">Grupos</div>
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
					
					@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
					@if(Session::has('alerta1'))
						<div class="alert alert-danger alert-dismissable">
        					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       						<i class="glyphicon glyphicon-exclamation-sign"><strong> {{Session::get('alerta1')}}</strong></i>
    					</div>
					@endif
					{!! Form::model($grupos, $parametros['ruta']) !!}
					
							
						<div class="form-group">
							<label class="col-md-4 control-label">CARRERA</label>
							<div class="col-md-6">
								{{--*/$cg = DB::table('carreras')->where('inactivo','<>',0)->lists('carrera','codgrupo')/*--}}
								{!! Form::select('codgrupo', $cg, null, array('class' => 'form-control')) !!}
							</div>
						</div>			
						<br><br><br>
						<div class="form-group">
							<label class="col-md-4 control-label">AÑO DE ESTUDIO</label>
							<div class="col-md-6">
								{!! Form::select('idagnoestudio', App\Agnosestudio::lists('agno', 'valor'), null, array('class' => 'form-control')) !!}
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="col-md-4 control-label">SEMESTRE</label>
							<div class="col-md-4">
								{!! Form::select('idsemestre', App\Semestre::lists('semestre', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="col-md-4 control-label">TIPO DE GRUPO</label>
							<div class="col-md-6">
								{!! Form::select('idtipogrupo', App\Tipogrupos::lists('tipo', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						<br><br>
						<div class="form-group">
							<label class="col-md-4 control-label">NÚMERO DE GRUPO</label>
							<div class="col-md-6">
								{!! Form::select('idnumgrup', App\Numerogrupos::lists('numero', 'id'), null, array('class' => 'form-control')) !!}
								{!! Form::hidden('inactivo', 1, array('class' => 'form-control', 'placeholder' => 'Créditos')) !!}
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
											REGISTRAR
								</button>
						<br>

						</div>
						
							</div>
						{!! Form::close() !!}
					@endif
				</div>
				<div class="table-responsive">
				<br><br>
					<h4 class="text-center">Lista de Grupos</h4>
					{!! Form::open(['method' => 'GET','route' => 'grupos.index']) !!}
						<div class="form-group bg-warning">
						<br>
							
								<label class="col-md-6 control-label">
									{{--*/$cg = DB::table('carreras')->where('inactivo','<>',0)->lists('carrera','id')/*--}}
									{!! Form::select('idgrup', $cg, null, array('class' => 'form-control')) !!}
										
								</label>
								<div class="col-md-4">
							
									<button type="submit" class="btn btn-success">Buscar Carrera</button>	
								</div>
								
							
							<br><br><br>
						</div>	
					{!! Form::close() !!}
					{{--TABLA QUE AGRUPA A LOS GRUPOS ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS--}}
					<table class="table2">
						<tr class="strong text-center bg-info tr2"><td>GRUPOS</td><td>CARRERAS</td>
						@if(Auth::user()->idrol == 1)
							<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td><td>ELIMINAR</td>
						@endif
						@if(Auth::user()->idrol == 5)
							<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td>
						@else
						@endif
						</tr>
						@foreach($grup as $grupos)
						@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5 or Auth::user()->idrol == 4)
						<tr class="text-center tr2"><td>{{$grupos->grupo}}</td>
							<td>{{$carr = DB::table('carreras')->where('id', $grupos->idcarrera)->pluck('carrera')}}</td>
							@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
								@if($grupos->inactivo == 1)
									<td class="text-success">ACTIVO</td>
								@else
									<td class="text-danger">INACTIVO</td>
								@endif
							
							<td>
									@if($grupos->inactivo == 1)
										{!! Form::open(['method' => 'PATCH','route' => ['grupos.update', $grupos->id]]) !!}				
											{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
											{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
										{!! Form::close() !!}
									@endif
									@if($grupos->inactivo == 0)
										{!! Form::open(['method' => 'PATCH','route' => ['grupos.update', $grupos->id]]) !!}
											{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
											{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
										{!! Form::close() !!}
									@endif
							</td>		
								
						<td>{!! Form::open(['method' => 'GET','route' => ['grupos.edit', $grupos->id]]) !!}
							{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
							{!! Form::close() !!}</td>
						@endif
						@if(Auth::user()->idrol == 1)	
						<td>{!! Form::open(['method' => 'DELETE','route' => ['grupos.destroy', $grupos->id]]) !!}
							{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
						@endif
					</tr>
					@endif
				@endforeach
				</table>	
				<div class="text-center">
									{!!str_replace('/?','?',$grup->appends(Input::except('page'))->render())!!}
								</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
