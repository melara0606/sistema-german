$(document).ready(function(){
	cargarEmpleados();
	cargarCargo();
	cargarTipo();

	$('#guardarempleado').on("click", function(e){
		var retorno = guardarEmp();
		if(retorno==1){
			cargarEmpleados();
		}
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
