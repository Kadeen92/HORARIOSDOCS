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
			
	{{--*/$us=Auth::user()->id/*--}}
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="table-responsive">
<table class="table-bordered table2">
<br>
<br>
<br>

<div>
<h4 class="text-center">VER HORARIOS</h4>
</div>
	

					
	
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
					
					
					{{--*/
						
					
						
						
						$idmateriav1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('iduser',  $us)
								->pluck('idmateria');	
								
								
						$iddivgrupov1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('iduser',  $us)
								->pluck('iddivgrupo');	
								
								
						$idsalov1n=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('iduser',  $us)
								->pluck('idsalon');
								
								
						$idlabv1=DB::table('detalleshorarios')
								->where('iddia', $dia->id)
								->where('idhora', $horas->id)
								->where('iduser',  $us)
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


	
	
	
	
	
	
	
	
	
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->					
	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
