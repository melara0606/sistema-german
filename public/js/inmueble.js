$(document).ready(function(){
	cargarContribuyente();

	$('#guardarorganizacion').on("click", function(e)
  {
    var 
  })
});

  function cargarContribuyente(){
  	$.get('/sisverapaz/public/contratos/listarcontribuyentes', function (data){
  		var html_select = '<option value="">Seleccione un contribuyente</option>';
  		for(var i=0;i<data.length;i++){
  			html_select +='<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
  			//console.log(data[i]);
  			$("#contribuyente").html(html_select);
  		}
  	});
  }
  