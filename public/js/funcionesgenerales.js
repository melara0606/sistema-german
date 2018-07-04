// Funciones para el empleado guardar y limpiar
function guardarEmp()
{
  var nombre = $("#nom_empleado").val();
  var dui = $("#dui_empleado").val();
  var nit = $("#nit_empleado").val();
  var sexo = $('input:radio[name=sexo]:checked').val()
  var telefono_fijo = $("#fijo_empleado").val();
  var celular = $("#cel_empleado").val();
  var direccion = $("#dir_empleado").val();
  var fecha_nacimiento = $("#fecha_nacimiento").val();
  var num_cuenta = $("#cuenta_empleado").val();
  var num_contribuyente = $("#contri_empleado").val();
  var num_seguro_social =$("#seguro_empleado").val();
  var num_afp =$("#afp_empleado").val();
  var ruta ="/"+carpeta()+"/public/empleados";
  var token = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN':token},
    type: 'POST',
    dataType: 'json',
    data:{nombre,dui,nit,sexo,telefono_fijo,celular,direccion,fecha_nacimiento,num_cuenta,num_contribuyente,num_seguro_social,num_afp},

    success: function(msj){
      if(msj.mensaje=="exito"){
        toastr.success('Empleado Registrado con éxito');
        limpiarEmpleado();
      }else{
        toastr.error('Ocurrió un error contante al administrador');
      }
    },
    error: function(data, textStatus, errorThrown){
      toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
      $.each(data.responseJSON.errors, function( key, value ) {
        toastr.error(value);
    });
    }
  });

return 1;
}

function limpiarEmpleado()
{
  $("#nom_empleado").val("");
  $("#dui_empleado").val("");
  $("#nit_empleado").val("");
  $('input:radio[name=sexo]').attr('checked',false);
  $("#fijo_empleado").val("");
  $("#cel_empleado").val("");
  $("#dir_empleado").val("");
  $("#fecha_nacimiento").val("");
  $("#cuenta_empleado").val("");
  $("#contri_empleado").val("");
  $("#seguro_empleado").val("");
  $("#afp_empleado").val("");
}

function fecha_espaniol(fechita){
  var fecha = new Date(fechita);
  var options = { weekday: "long", year: 'numeric', month: 'long', day: 'numeric' };

  return fecha.toLocaleDateString("es-ES", options);
}

function decodificar(data){
  //decodifica la información
  var datadecodificada = window.atob(data);
  //convertir los datos decodificados a un formato JSON
  var datos = JSON.parse(datadecodificada);
  return datos;
}
