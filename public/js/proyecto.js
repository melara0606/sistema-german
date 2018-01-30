$(document).ready(function(){
	cargarOrganizacion();

	$('#guardarorganizacion').on("click", function(e){
		var nombre = $("#nombre_org").val();
    var direccion = $("#direccion_org").val();
    var telefono = $("#telefono_org").val();
    var representante = $("#representante_org").val();
    var telrepre = $("#tel_representante_org").val();
    var ruta = "/sisverapaz/public/proyectos/guardarorganizacion";
    var token = $('meta[name="csrf-token"]').attr('content');
    //alert(nombre);
    $.ajax({
      url: ruta,
      headers: {'X-CSRF-TOKEN':token},
      type:'POST',
      dataType:'json',
      data:{nombre_org:nombre,direccion_org:direccion,telefono_org:telefono,representante_org:representante,tel_representante_org:telrepre},

      success: function(){
        toastr.success('Proyecto creado éxitosamente');
        cargarOrganizacion();
      }
    });
	});

});

function cargarOrganizacion(){
  $.get('/sisverapaz/public/proyectos/listarorganizaciones', function (data){
    var html_select = '<option value="">Seleccione una organizacion</option>';
    for(var i=0;i<data.length;i++){
      html_select +='<option value="'+data[i].id+'">'+data[i].nombre_org+'</option>'
  		//console.log(data[i]);
  		$("#organizacion").html(html_select);
    }
  });
}