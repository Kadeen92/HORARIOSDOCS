@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading strong">Materias por Carrera por Plan</div>
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
					{!! Form::model($cpm, $parametros['ruta']) !!}
					
						<div class="form-group">
							<label class="col-md-4 control-label">CARRERA</label>
							<div class="col-md-6">
								{!! Form::select('idcarrera', App\Carreras::lists('carrera', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">PLAN</label>
							<div class="col-md-6">
								{!! Form::select('idplan', App\Planes::lists('plan', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">AÑO DE ESTUDIO</label>
							<div class="col-md-6">
								{!! Form::select('idagnoestudio', App\Agnosestudio::lists('agno', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						<br>
						
						<div class="form-group">
							<label class="col-md-4 control-label">SEMESTRE</label>
							<div class="col-md-6">
								{!! Form::select('idsemestre', App\Semestre::lists('semestre', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						<br>
						
						<div class="form-group">
							<label class="col-md-4 control-label">MATERIA</label>
							<div class="col-md-6">
								{!! Form::select('idmateria', App\Materias::lists('materia', 'id'), null, array('class' => 'form-control')) !!}
							</div>
						</div>		
						
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">HORAS TEÓRICA</label>
							<div class="col-md-6">
								{!! Form::text('horasteoricas', null, array('class' => 'form-control', 'placeholder' => 'H. Teóricas')) !!}
							</div>
						</div>			
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">HORAS LAB.</label>
							<div class="col-md-6">
								{!! Form::text('horaslab', null, array('class' => 'form-control', 'placeholder' => 'H. Labs.')) !!}
							</div>
						</div>			
						<br>
						<div class="form-group">
							<label class="col-md-4 control-label">CRÉDITOS</label>
							<div class="col-md-6">
								{!! Form::text('creditos', null, array('class' => 'form-control', 'placeholder' => 'Créditos')) !!}
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
					<h4 class="text-center">Materias por Carreras por Planes</h4>
					{{--{!! Form::open(['method' => 'GET','route' => 'cpm.index']) !!}
							<div class="form-group">
										<label class="col-md-4 control-label">{!! Form::text('cmp1', null, array('class' => 'form-control', 'placeholder' => 'Escriba lo que desea buscar')) !!}</label>
											<div class="col-md-6">
												<button type="submit" class="btn btn-success">Buscar</button>
											</div>
									</div>	
						{!! Form::close() !!}--}}
					<table class="table2">
						<tr class="strong text-center bg-info tr2"><td>MATERIAS</td><td>CARRERAS</td><td>PLANES</td><td>AÑO</td><td>SEM.</td><td>H. TEÓ.</td><td>H. LAB.</td><td>CRÉDITOS</td>
						@if(Auth::user()->idrol == 1)
							<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td><td>ELIMINAR</td>
						@endif
						@if(Auth::user()->idrol == 5)
							<td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td><td>EDITAR</td>
						@else
						@endif
						</tr>
						@foreach($cmp as $cpm)
							@if(Auth::user()->idrol == 1)
							<tr class="text-center tr2">
								<td>{{$mat = DB::table('materias')->where('id', $cpm->idmateria)->pluck('materia')}}</td>
								<td>{{$car = DB::table('carreras')->where('id', $cpm->idcarrera)->pluck('carrera')}}</td>
								<td>{{$plan = DB::table('planes')->where('id', $cpm->idplan)->pluck('plan')}}</td>
								<td>{{$agno = DB::table('agnosestudio')->where('id', $cpm->idagnoestudio)->pluck('agno')}}</td>
								<td>{{$sem = DB::table('semestres')->where('id', $cpm->idsemestre)->pluck('semestre')}}</td>
								<td>{{$cpm->horasteoricas}}</td>
								<td>{{$cpm->horaslab}}</td>
								<td>{{$cpm->creditos}}</td>
								@if($cpm->inactivo == 1)
									<td class="text-success">ACTIVO</td>
								@else
									<td class="text-danger">INACTIVO</td>
								@endif
						
							<td>
											@if($cpm->inactivo == 1)
												{!! Form::open(['method' => 'PATCH','route' => ['cpm.update', $cpm->id]]) !!}
													{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
													{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
												{!! Form::close() !!}
											@endif
											@if($cpm->inactivo == 0)
												{!! Form::open(['method' => 'PATCH','route' => ['cpm.update', $cpm->id]]) !!}
													{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
													{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
												{!! Form::close() !!}
											@endif
							</td>		
							<td>{!! Form::open(['method' => 'GET','route' => ['cpm.edit', $cpm->id]]) !!}
								{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
								{!! Form::close() !!}</td>
							<td>{!! Form::open(['method' => 'DELETE','route' => ['cpm.destroy', $cpm->id]]) !!}
								{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}</td>
						</tr>
						@endif
					
					@endforeach
				</table>
				<div class="text-center">
					{!!str_replace('/?','?',$cmp->appends(Input::except('page'))->render())!!}
				</div>
				
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
