@extends('app')
	@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading strong">Ver Horarios</div>
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
	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->					
			

			
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="table-responsive">
<table class="table-bordered table2">
<br>
<br>
<br>

<div>
<h4 class="text-center">VER HORARIOS</h4>
</div>
	
<br>
<br>
<br>
<tr class="strong text-center bg-info tr2">
<td>Facultad</td>
<td>Carrera</td>
<td>Plan</td>
<td>Semestre</td>
<td>Grupo</td>
<td>Jornada</td>
<td>Año</td>
<td>Año de Estudio</td>
<td>Editar</td>
<td>Ver</td>

</tr>

@foreach(App\Horarios::all() as $detalles)

{{--*/
			$idagnoestudio2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idagnoestudio');
							
							$idfacultad2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idfacultad');
							
							$idgrupo2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idgrupo');
									
							$idsemestre2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idsemestre');
									
							$idjornada2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idjornada');
									
							$idplan2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idplan');
									
							$idagno2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idagno');
									
							$idcarrera2=\DB::table('horarioss')				
									->where('id', $detalles->id)
									->pluck('idcarrera');
							
							
							
							
							
							$facultad2=\DB::table('facultades')
									->where('id','=', $idfacultad2)
									->pluck('facultad');	
									
							$carrera2=\DB::table('carreras')
									->where('id','=', $idcarrera2)
									->pluck('Carrera');					
							
							$grupo2=\DB::table('grupos')
									->where('id','=', $idgrupo2)
									->pluck('grupo');
							
							$semestre2=\DB::table('semestres')
									->where('id','=', $idsemestre2)
									->pluck('semestre');
									
							$jornada2=\DB::table('tipogrupos')
									->where('id','=', $idjornada2)
									->pluck('tipo');		
							
							$plan12=\DB::table('planes')
									->where('id','=', $idplan2)
									->pluck('plan');
							
							$agno2=\DB::table('agnos')
									->where('id','=', $idagno2)
									->pluck('agno');
									
								
									
							$agnoes2=\DB::table('agnosestudio')
									->where('id','=', $idagnoestudio2)
									->pluck('agno');
/*--}}
<?php
$verhorarios=0;
?>

	
<tr>
<td class="strong text-center bg-warning tr2">{{$facultad2}}</td>
<td class="strong text-center bg-warning tr2">{{$carrera2}}</td>
<td class="strong text-center bg-warning tr2">{{$grupo2}}</td>
<td class="strong text-center bg-warning tr2">{{$semestre2}}</td>
<td class="strong text-center bg-warning tr2">{{$jornada2}}</td>
<td class="strong text-center bg-warning tr2">{{$plan12}}</td>
<td class="strong text-center bg-warning tr2">{{$agno2}}</td>
<td class="strong text-center bg-warning tr2">{{$agnoes2}}</td>
<td class="strong text-center bg-warning tr2">

<a href="{{route('horarios.show', $detalles->id) }}" class="btn btn-primary glyphicon glyphicon-pencil"></a>

</td>

<td class="strong text-center bg-warning tr2">
<a href="menu_ver{{$detalles->id}}" class="btn btn-success  open"><i class="glyphicon  glyphicon-eye-open"></i></a>
</td>
</tr>
<!--///////////////////////mostrar detalles horarios/////////////////////////-->
<tr id="menu_ver{{$detalles->id}}" style="display:none;">
	<td colspan="8">							
	
	 <table >	
		 <thead>
			 <tr class="strong text-center bg-info tr2">			
				<td>HORA</td>
				@foreach(App\Dia::all() as $dia)
				<td>{{$dia->dia}}</td>		
				@endforeach
			 </tr>						
		 </thead>				
		 <tbody>
	@foreach(App\Horas::all() as $horas)												
	<tr>
		<td class="strong text-center bg-info tr2">{{$horas->hora}}</td>
	<!--******************************************************************DIAS**********************************************************************************************************-->	
	@foreach(App\Dia::all() as $dia)
		<td class="strong text-center bg-warning tr2">
					{{--*/$idmateriav1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('idhorarioss',  $detalles->id)
								->pluck('idmateria');	
								
								
						$iddivgrupov1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('idhorarioss',  $detalles->id)
								->pluck('iddivgrupo');	
								
								
						$idsalov1n=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('idhorarioss',  $detalles->id)
								->pluck('idsalon');
								
								
						$idlabv1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('idhorarioss',  $detalles->id)
								->pluck('idlab');					
					/*--}}
					
					
					
					
					
							{{$fac = DB::table('materias')->where('id', $idmateriav1)->pluck('materia')}}
							<br>
							{{$divg = DB::table('divgrupo')->where('id', $iddivgrupov1)->pluck('diviciong')}}
							<br>
							@if($idlabv1 ==1)
							<div>
								SALON:
							{{$salones = DB::table('salones')->where('id', $idsalov1n)->pluck('salon')}}
							@endif
							@if($idsalov1n ==1)
							</div>
							<div>
								LABORATORIO:
							{{$labs = DB::table('laboratorios')->where('id', $idlabv1)->pluck('laboratorio')}}
							</div>
							@endif
							<br>
					
				</td>
			@endforeach	
			</tr>
	@endforeach	
			</tbody>
	</table>
				
		




	</td>
</tr>

<!--/

							
	<div class="row" id="menu_ver" style="display:none;">
	<div class="col-md-9 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">HORARIO ACTUAL</div>		
			<div class="panel-body ">

	
				</div>				
			</div>												
		</div>			
	</div>
</div>					

//////////////////////detalles horarios///////////////////////////-->
@endforeach
</table>
</div>	


	
	
	
	
	
	
	
	
	
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->					
	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
