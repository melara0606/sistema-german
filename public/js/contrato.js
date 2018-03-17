$(document).ready(function(){
	cargarEmpleados();
	cargarCargo();
	cargarTipo();

	$('#guardarempleado').on("click", function(e){
		var nombre = $("#nom_empleado").val();
		var dui = $("#dui_empleado").val();
		var nit = $("#nit_empleado").val();
		var sexo = $('input:radio[name=sexo]:checked').val()
		//var sexo = $("#sex_empleado").val();
		var telefono_fijo = $("#fijo_empleado").val();
		var celular = $("#cel_empleado").val();
		var direccion = $("#dir_empleado").val();
		var fecha_nacimiento = $("#nacimiento_empleado").val();
		var num_cuenta = $("#cuenta_empleado").val();
		var num_contribuyente = $("#contri_empleado").val();
		var num_seguro_social =$("#seguro_empleado").val();
		var num_afp =$("#afp_empleado").val();
		alert(sexo);
		var ruta ="/"+carpeta()+"/public/contratos/guardarempleado";
		var token = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: ruta,
			headers: {'X-CSRF-TOKEN':token},
			type: 'POST',
			dataType: 'json',
			data:{nombre,dui,nit,sexo,telefono_fijo,celular,direccion,fecha_nacimiento,num_cuenta,num_contribuyente,num_seguro_social,num_afp},

			success: function(){
				toastr.success('Empleado Registrado con éxito');
				cargarEmpleados();
			},
			error: function(data, textStatus, errorThrown){
				toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
				$.each(data.responseJSON.errors, function( key, value ) {
					toastr.error(value);
			});
			}
		});
	});

	$('#guardartipo').on("click", function(e){
		var nombre = $("#nombre_tipo").val();
			var ruta = "/"+carpeta()+"/public/contratos/guardartipo";
			var token = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: ruta,
				headers: {'X-CSRF-TOKEN':token},
				type:'POST',
				dataType:'json',
				data:{nombre:nombre},

				success: function(){
					toastr.success('Tipo de contrato creado con éxito');
					cargarTipo();
				},error : function(data){
					toastr.error(data.responseJSON.errors.nombre);
				}
			});
	});

	$('#guardarcargo').on("click", function(e){
		  var cargo = $("#cargo_nombre").val();
			var ruta = "/"+carpeta()+"/public/contratos/guardarcargo";
			var token = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: ruta,
				headers: {'X-CSRF-TOKEN':token},
				type:'POST',
				dataType:'json',
				data:{cargo:cargo},

				success: function(){
					toastr.success('Cargo creado con éxito');
					$("#cargo_nombre").val("");
					cargarCargo();
				},
				error:function(data){
					toastr.error(data.responseJSON.errors.cargo);
				}
			});
	});
});

  function cargarEmpleados(){
  	$.get('/'+carpeta()+'/public/contratos/listarempleados', function (data){
  		var html_select = '<option value="">Seleccione un empleado</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
  			//console.log(data[i]);
  			$("#empleado").html(html_select);
  		}
  	});
  }

function cargarTipo(){
  	$.get('/'+carpeta()+'/public/contratos/listartipos', function (data){
  		var html_select = '<option value="">Seleccione un tipo de contrato</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
  			//console.log(data[i]);
  			$("#tipocontrato").html(html_select);
  		}
  	});
  }

function cargarCargo(){
  	$.get('/'+carpeta()+'/public/contratos/listarcargos', function (data){
  		var html_select = '<option value="">Seleccione un cargo</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].cargo+'</option>'
  			//console.log(data[i]);
  			$("#cargo").html(html_select);
  		}
  	});
  }
