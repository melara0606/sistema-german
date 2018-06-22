$(document).ready(function(){
  listartodos();
  $("#agregarf").on("click", function(e){
      var fn = $("#txtfuncion").val();
      var funcion = fn.toUpperCase();
      if(funcion != ""){
      $("#funciones").append("<li data-funcion='"+funcion+"'> "+funcion+"<div class='btn-group'><button type='button' id='btneditar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></button><button type='button' id='btnquitar' class='btn btn-warning btn-xs'><i class='glyphicon glyphicon-remove'></i></button> </div></li>");
      $("#txtfuncion").val("");
    }else{
      swal(
         '¡Aviso!',
         'Debe digitar una función',
         'warning'
       );
    }
  });

  $("#proyecto").on("change", function(e){
      var idproyecto = (this.value);
      listadeempleados(idproyecto);
  });

//Código para guardar
  $("#guardar").on("click", function(e){
    var funciones = new Array();
    var proyecto = $("#proyecto").val();
    var empleado = $("#empleado").val();
    var fecharevision = $("#fecharevision").val();
    var ruta = "/"+carpeta()+"/public/contratacionproyectos";
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#funciones li').each(function(i){
      funciones.push({
          funcion: $(this).attr("data-funcion"),
      });
    });
    $.ajax({
      url: ruta,
      headers: {'X-CSRF-TOKEN':token},
      type:'POST',
      dataType:'json',
      data:{funciones,proyecto,empleado,fecharevision},

      success: function(msj){
        if(msj.mensaje == "exito"){
          toastr.success('Registro creado exitosamente');
          console.log(msj.mensaje);
          limpiar();
          listartodos();
        }else{
          toastr.error("error");
        }
      },
      error: function(){
        toastr.error("error");
      }
    });
  });

  $('#guardarempleado').on("click", function(e){
		var retorno = guardarEmp();
		if(retorno===1){
      limpiar();
		}
	});

  $(document).on("click","#btneditar", function(e){
    var li = $(e.target).parents("li");
    var funcion=$(this).parents('li').text();
    $(document).find("#txtfuncion").val(funcion);
    li.remove();
  });
// con este codigo se elimina un elemento de la lista de funciones
  $(document).on("click","#btnquitar", function(e){
    var li = $(e.target).parents("li");
    li.remove();
  });

  //funcion para cargar los empleados
  function listadeempleados(idp){
    $.get('/'+carpeta()+'/public/contratacionproyectos/listadeempleados/'+idp , function(data){
  		var html_select = '<option value="">Seleccione un empleado</option>';
  			$(data).each(function(key, value){
  				html_select +='<option value="'+value.id+'">'+value.nombre+'</option>'
  				//console.log(data[i]);
  				$("#empleado").html(html_select);
  				$("#empleado").trigger('chosen:updated');
  			});
  	});
  }

  function listartodos(){
    $.get('/'+carpeta()+'/public/contratacionproyectos/todos' , function(data){
      var contador=0;
      $(cuerpo).empty();
  			$(data).each(function(key, value){
          contador++;
          $(cuerpo).append(
              "<tr>"+
                  "<td>" + contador  + "</td>" +
                  "<td>" + value.empleado.nombre + "</td>" +
                  "<td>$" + value.contratoproyecto.salario+ "</td>" +
              "</tr>"
          );
  			});
  	});
  }

  function limpiar(){
    var pro=$("#proyecto").val();
    listadeempleados(pro);
    $("#empleado").trigger('chosen:updated');
    $("#txtfuncion").val("");
    $("#fecharevision").val("");
    $("#funciones").empty();
  }

});
