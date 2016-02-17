$(function() {
									
										var host=window.location.host;
								$(".mostrar").click(function(){
									var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
									var bodytable = $("#bodytable");
									var x = 1;
									bodytable.empty();
									var id_user = $(this).data('id');
									$.get(baseurl+'/getmateriaqpdud',
										{ _token: CSRF_TOKEN, user: id_user },
										function(data){
				
											$.each(data, function(index, element){
												bodytable.append('<tr><td>'+element.materia+'</td></tr>')			;
												x = 0;
											});
											if(x == 1){
												bodytable.append('<tr><td>NO TIENE REGISTROS</td></tr>')			;
											}
										}, 'json');
				
								});
	
	
	
	
	
	
	
	
	
	
	
	

	
							//------------------------modal de la vista cargospd----------------------------------------------


								$(".mostrar1").click(function(){
									var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
									var bodytable = $("#bodytable1");
									var x = 1;
									bodytable.empty();
									var id_user = $(this).data('id');
									$.get(baseurl+'/getcargospd',
										{ _token: CSRF_TOKEN, user: id_user },
										function(data){
				
											$.each(data, function(index, element){
												bodytable.append('<tr><td>'+element.cargo+'</td></tr>')			;
												x = 0;
											});
											if(x == 1){
												bodytable.append('<tr><td>NO TIENE REGISTROS</td></tr>')			;
											}
										}, 'json');
				
								});


							//-----------------------------vista user activa el menu profesor ------------
							$("#idrol").change(function(){
										if($("#idrol").val() != '1'){
												$("#menu_profesor").css("display", "block");
										}else{
												$("#menu_profesor").css("display", "none");
										} 
							});
							//-----------------------------------------------------------------------------



							///--------------------------vista materias activa el menu es submateria -------
							$("#essubmateria").change(function(){
										if($("#essubmateria").val() != '2'){
												$("#menu_materia").css("display", "block");
										}else{
												$("#menu_materia").css("display", "none");
										} 
							});
							//------------------------------------------------------------------------------


							//--vista materiaqpdud  activa la tabla de editar y eliminar----------------
							$("#idmateria").change(function(){
										if($("#idmateria").val() != '1'){
												$("#menu_mater").css("display", "block");
										}else{
												$("#menu_mater").css("display", "none");
										} 
							});
							//----------------vista cargospd activa la tabla de editar y eleiminar
							$("#idcargos").change(function(){
										if($("#idcargos").val() == '2'){
												$("#menu_cargos").css("display", "block");
										}else{
												$("#menu_cargos").css("display", "none");
										} 

						
							});

///-------------------------------------------------------------------------------------------------


//-----------------mostrar de la vista horarios lab
$("#idtipoclass").change(function(){
										if($("#idtipoclass").val() == '3'){
												$("#menu_labs").css("display", "block");
												$("#menu_salones").css("display", "none");
										}else{
												if($("#idtipoclass").val() == '2'){
														$("#menu_labs").css("display", "none");
														$("#menu_salones").css("display", "block");
												}else{
													$("#menu_labs").css("display", "none");
													$("#menu_salones").css("display", "none");
												}
											}
							});

//------------------------mostrar divicion de grupos---------------------------
$("#iddivin").change(function(){
										if($("#iddivin").val() == '2'){
												
													$("#menu_div").css("display", "block");
										}else{	
													$("#menu_div").css("display", "none");
											
												}
											
							});







//------------------------------select de carreras por facultad---------------------------------------
							$("#idfacultad").change(function(){
						
									$.get(baseurl+'/buscar/carreras',
												{facultad:$(this).val()},
												function(data){
														var campo= $('#idcarrera');
														campo.empty();
														campo.append("<option value='0'>Seleccione Carrera</option>");
														$.each(data,function(index,element){
														campo.append("<option value='"+element.id+"'>"+element.carrera+"</option>");
														
														});
									
										
									});
									


							});

//------------------------------------------------------------------------------------------------------

//-----------------------------select de carreras por planes----------------------------------------------

							$("#idcarrera").change(function(){
									$.get(baseurl+'/buscar/planes',
												{carrera:$(this).val()},
												function(data){
														var campo= $('#idplan');
														campo.empty();
														campo.append("<option value='0'>Seleccione Plan</option>");
														$.each(data,function(index,element){
														campo.append("<option value='"+element.id+"'>"+element.plan+"</option>");
														
														});
									
										
									});
									
											seleccionarGrupo();

							});
//--------------------------------------------------------------------------------

	$("#idmateria").change(function(){
									$.get(baseurl+'/buscar/profe',
												{idmateria:$(this).val()},
												function(data){
														var campo= $('#iduser');
														campo.empty();
														campo.append("<option value='0'>Seleccione Profesor</option>");
														$.each(data,function(index,element){
														campo.append("<option value='"+element.id+"'>"+element.nombre+" "+element.apellido+"</option>");
														
														});
									console.log(data);
										
									});
									


							});


//-----------------------------select de grupo por años de estudio----------------------------------------------
							
							
							$("#idagnoestudio").change(function(){
									seleccionarGrupo();
								});
											
							$("#idjornada").change(function(){
									seleccionarGrupo();
								});
											
		
//--------------------------------------------------------------------------------------------------------------		
				$("a.open").on( "click", function(e) {	 
	       e.preventDefault();
	       var id=$(this).attr('href');
	        $('#'+id).toggle();
	         });
											
											
											
											
											
											
	

});
	function seleccionarGrupo(){
											$.get(baseurl+'/buscar/grupos',
											{ agnoestudio:$("#idagnoestudio").val(), idjornada:$("#idjornada").val(), idcarrera:$("#idcarrera").val()},
												function(data){
														var campo= $('#idgrupo');
														campo.empty();
														campo.append("<option value='0'>Seleccione Grupo</option>");
														$.each(data,function(index,element){
														campo.append("<option value='"+element.id+"'>"+element.grupo+"</option>");
														
														});
														
													});
	}
	
	$(".storeModal").click(function(){
			var	$this = $(this);
			$('#formModal').attr('action', baseurl+'/horarios');
			$('#formModal').attr('method', 'POST');
			$('#formModal').find('#hideMethod').remove(); //remueve el metodo PATCH para actualizar
			
			//campos ocultos del dia  hora  y parametro
			$('#parametro').val($this.data('parametro'));
			$("#dia").val($this.data('dia_id'));
			$("#hora").val($this.data('hora_id'));
			//nombres de dia y hora
			$("#diaN").text($this.data('dia_n'));
			$("#horaN").text($this.data('hora_n'));
			
			$('#idmateria').val(1);
			$('#iduser').val(1);
			$('#idtipoclass').val(1);
			$('#idlab').val(1);
			$('#idsalon').val(1);
			
			$('#formModal').find("#menu_labs").css("display", "none");
			$('#formModal').find("#menu_salones").css("display", "none");
	})
	
	$(".editModal").click(function(){
			var	$this = $(this);
			$('#formModal').attr('action', baseurl+'/horarios/'+$this.data('id'));
			$('#formModal').attr('method', 'POST');
			$('#formModal').find('.methodEdit').html('<input name="_method" value="PATCH" type="hidden" id="hideMethod">');
			//campos ocultos del dia  hora  y parametro
			$('#parametro').val($this.data('parametro'));
			$("#dia").val($this.data('dia_id'));
			$("#hora").val($this.data('hora_id'));
			//nombres de dia y hora
			$("#diaN").text($this.data('dia_n'));
			$("#horaN").text($this.data('hora_n'));
			
			$.get(baseurl+'/buscar/editarhorarios',
			{ 
					id:$this.data('id')		
			},function(data){
					$('#idmateria').val(data.idmateria);
					$('#iduser').val(data.iduser);
					$('#idtipoclass').val(data.idtipoclass);
					
					if(data.idtipoclass == '3'){
							$('#formModal').find("#menu_labs").css("display", "block");
							$('#formModal').find("#menu_salones").css("display", "none");
							
							$('#idlab').val(data.idlab);
								$('#idsalon').val(1);
					}else{
							if(data.idtipoclass == '2'){
									$('#formModal').find("#menu_labs").css("display", "none");
									$('#formModal').find("#menu_salones").css("display", "block");
									
									$('#idsalon').val(data.idsalon);
									$('#idlab').val(1);
							}else{
								$('#formModal').find("#menu_labs").css("display", "none");
								$('#formModal').find("#menu_salones").css("display", "none");
							}
						}
					
			});
			
	})
