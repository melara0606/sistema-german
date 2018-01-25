$(document).ready(function(){
	cargarEmpleados();
	cargarCargo();
	cargarTipo();
});

  function cargarEmpleados(){
  	$.get('/sisverapaz/public/contratos/listarempleados', function (data){
  		var html_select = '<option value="">Seleccione un empleado</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
  			//console.log(data[i]);
  			$("#empleado").html(html_select);
  		}
  	});
  }

function cargarTipo(){
  	$.get('/sisverapaz/public/contratos/listartipos', function (data){
  		var html_select = '<option value="">Seleccione un tipo de contrato</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
  			//console.log(data[i]);
  			$("#tipocontrato").html(html_select);
  		}
  	});
  }

function cargarCargo(){
  	$.get('/sisverapaz/public/contratos/listarcargos', function (data){
  		var html_select = '<option value="">Seleccione un cargo</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].cargo+'</option>'
  			//console.log(data[i]);
  			$("#cargo").html(html_select);
  		}
  	});
  }
