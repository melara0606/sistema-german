var busca="";
$(document).ready(function(e){

  $(".cmbusuario").hide();
  $(".txtdia").hide();
  $(".txtinicio").hide();
  $(".txtfin").hide();

  //variables para las fechaCastellas
  var ultimo = new Date($('#ultimo').val());
  var dias = 1; // Número de días a agregar
  ultimo.setDate(ultimo.getDate() + dias);

  //
  var start = new Date();


  end = new Date();
  var start2, end2;

  end.setDate(end.getDate() + 365);

  $('.txtdia').datepicker({
    selectOtherMonths: true,
     changeMonth: true,
     changeYear: true,
     dateFormat: 'dd-mm-yy',
     minDate: ultimo,
     maxDate: '+0m +0w',
    format: 'dd-mm-yyyy'
    });

  $(".txtinicio").datepicker({
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy',
    minDate: ultimo,
    maxDate: '+0m +0w',
 onSelect: function(){
   start2 = $(this).datepicker("getDate");
   end2 = $(this).datepicker("getDate");

   start2.setDate(start2.getDate() + 1);
   end2.setDate(end2.getDate() + 365);

   $(".txtfin").datepicker({
            selectOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            minDate: start2,
            maxDate: '+0m +0w'
          });
    }
  });
$("#consultar").on("click", function(e){
  var token = $('meta[name="csrf-token"]').attr('content');
  var request,request2;
  if(busca=='e'){
    var usuario=$("#cmbusuario").val();

  }else{
    if(busca=='d'){
      var dia = $("#txtdia").val();

    }else{
      if(busca=='p'){
        var inicio = $("#txtinicio").val();
        var fin = $("#txtfin").val();

      }else{

      }
    }
  }

  $.ajax({
    url: '/'+carpeta()+'/public/bitacoras/general',
    headers: {'X-CSRF-TOKEN':token},
    type:'GET',
    dataType:'json',
    data:{usuario,dia,inicio,fin},

    success: function(msj){
      $(bita).empty();
      var contador=0;
  			$(msj.mensaje).each(function(key, value){
          contador++;
          $(bita).append(
              "<tr>"+
                  "<td>" + contador  + "</td>" +
                  "<td>" + fecha_espaniol(value.registro) + "</td>" +
                  "<td>" + value.hora + "</td>"+
                  "<td>" + value.accion+ "</td>" +
                  "<td>" + value.user.empleado_id + "</td>"+
                  "<td><div class='btn-group'>"+
                  "<a class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-eye-open'></i></a>"+
                  "</div></td>"+
              "</tr>"
          );
  			});
    },
    error: function(msj){

    }
  });
})


});


  function busqueda(valor){

    if(valor=='e'){
      busca=valor;
      $(".cmbusuario").show();
      $(".txtdia").hide();
      $(".txtdia").removeAttr("name");
      $(".txtinicio").removeAttr("name");
      $(".txtfin").removeAttr("name");
      $(".txtinicio").hide();
      $(".txtfin").hide();
    }else{
      if(valor=='d'){
        busca=valor;
        $(".cmbusuario").hide();
        $(".txtdia").show();
        $(".txtinicio").removeAttr("name");
        $(".txtfin").removeAttr("name");
        $(".cmbusuario").removeAttr("name");
        $(".txtinicio").hide();
        $(".txtfin").hide();
      }else{
          if(valor=='p'){
            busca=valor;
            $(".cmbusuario").hide();
            $(".txtdia").hide();
            $(".txtmes").hide();
            $(".txtinicio").show();
            $(".txtfin").show();
            $(".cmbusuario").removeAttr("name");
            $(".txtdia").removeAttr("name");
          }
        }
      }
  }
