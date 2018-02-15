var contador_monto=0;
var contador_org=0;
var monto_total = 0.0;
var monto_organizacion = 0.0;
var monto = 0.0;
//var montosorg = new Array();
$(document).ready(function(){

  cargarFondos();
  cargarOrganizacion();

	var button_org = '<button type="button" data-toggle="modal" data-target="#btn_orga" class="btn btn-primary" id="btn_org">Seleccione Organizacion</button>';

	$( '#colaboradora' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        $("#cola").html(button_org);
    } else {
      swal({
        title: '¿Está seguro?',
        text: "Desea eliminar los datos de las oganizaciones",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Borrar!',
        cancelButtonText: 'No borrar!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          var auxi1=monto_organizacion;
          monto_organizacion=0.0;
          monto_total=monto_total-auxi1;
          contador_org=0;
          $("#contador_org").val(contador_org);
          $("#monto").val(monto_total);
          $("#cola").empty();
          $("#cuerpo_org").empty();
          //montosorg = [];
          cargarOrganizacion();
          swal(
            '¡Eliminado!',
            'Las organizaciones han sido removidas.',
            'success'
          )
        } else if (result.dismiss === swal.DismissReason.cancel) {
          $("#colaboradora").prop('checked', true);
          swal(
            'Cancelado',
            'Los datos se mantienen :)',
            'info'
          )
        }
      })
    }
});

	$('#guardarorganizacion').on("click", function(e){
		var nombre_org = $("#nombre_org").val();
    var direccion_org = $("#direccion_org").val();
    var telefono_org = $("#telefono_org").val();
    var representante_org = $("#representante_org").val();
    var tel_representante_org = $("#tel_representante_org").val();
    var ruta = "/sisverapaz/public/proyectos/guardarorganizacion";
    var token = $('meta[name="csrf-token"]').attr('content');
    //alert(nombre);
    $.ajax({
      url: ruta,
      headers: {'X-CSRF-TOKEN':token},
      type:'POST',
      dataType:'json',
      data:{nombre_org,direccion_org,telefono_org,representante_org,tel_representante_org},

      success: function(){
        toastr.success('Proyecto creado éxitosamente');
        cargarOrganizacion();
      }
    });
	});

//Agrega los montos a la tabla de fondos y actualiza el monto total
  $('#btnAgregarfondo').on("click", function(e){
    e.preventDefault();
    var cat = $("#cat_id").val() || 0;
    var cat_nombre = $("#cat_id option:selected").text() || 0;
    var cant_monto = $("#cant_monto").val() || 0;
    var existe = $("#cat_id option:selected");

    if(cat && cant_monto){
      monto+=parseFloat(cant_monto);
      contador_monto++;
      $(tbFondos).append(
                 "<tr data-categoria='"+cat+"' data-monto='"+cant_monto+"'>"+
                     "<td>" + cat_nombre + "</td>" +
                     "<td>" + onFixed( parseFloat(cant_monto), 2 ) + "</td>" +
                     "<td>"+
                     "<input type='hidden' name='categorias[]' value='"+cat+"' />"+
                     "<input type='hidden' name='montos[]' value='"+cant_monto+"' />"+
                     "<button type='button' id='delete-btn' class='btn btn-danger'>Eliminar</button></td>" +
                 "</tr>"
             );
      monto_total=monto+monto_organizacion;
      $("#monto").val(onFixed(monto_total));
      $("#contador_fondos").val(contador_monto);
      $("#pie_monto #totalEnd").text(onFixed(monto));
      $(existe).css("display", "none");
      $("#cant_monto").val("");
      $("#cat_id").val("");
      $("#cat_id").trigger('chosen:updated');
    }else{
       swal(
              '¡Aviso!',
              'Debe seleccionar una categoría y digitar el monto',
              'warning'
            )
    }
  });

//Agrega los montos a la tabla de fondos organizacion y actualiza el monto total
  $('#btnAgregarfondo_org').on("click", function(e){
    e.preventDefault();
    var org = $("#organizacion").val() || 0;
    var org_nombre = $("#organizacion option:selected").text() || 0;
    var cant_monto_org = $("#cant_monto_org").val() || 0;
    var existe2 = $("#organizacion option:selected");

    if(org && cant_monto_org){
      contador_org++;
      monto_organizacion+=parseFloat(cant_monto_org);
      $(tbFondosorg).append(
                 "<tr data-organizacion='"+org+"' data-montoorg='"+cant_monto_org+"'>"+
                     "<td>" + org_nombre + "</td>" +
                     "<td>" + onFixed( parseFloat(cant_monto_org), 2 ) + "</td>" +
                     "<td>"+
                     "<input type='hidden' name='categorias[]' value='"+org+"' />"+
                     "<input type='hidden' name='montos[]' value='"+cant_monto_org+"' />"+
                     "<button type='button' id='delete-monto_org' class='btn btn-danger'>Eliminar</button></td>" +
                 "</tr>"
             );
      monto_total=monto+monto_organizacion;
      //monto_total=monto_total+monto_organizacion;
      $("#monto").val(onFixed(monto_total));
      $("#contador_org").val(contador_org);
      $("#pie_fondoorg #totalEndorg").text(onFixed(monto_organizacion));
      $(existe2).css("display", "none");
      $("#cant_monto_org").val("");
      $("#organizacion").val("");
      $("#organizacion").trigger('chosen:updated');
    }else{
       swal(
              '¡Aviso!',
              'Debe seleccionar una organización y digitar el monto',
              'warning'
            )
    }
  });

//agrega nueva categoria de los montos para luego seleccionarla
    $('#guardarcategoria').on("click", function(e){
    var categoria = $("#cate").val();
    var ruta = "/sisverapaz/public/proyectos/guardarcategoria";
    var token = $('meta[name="csrf-token"]').attr('content');
    //alert(nombre);
    $.ajax({
      url: ruta,
      headers: {'X-CSRF-TOKEN':token},
      type:'POST',
      dataType:'json',
      data:{categoria},

      success: function(){
        toastr.success('categoria creado éxitosamente');
        cargarFondos();
        $("#cat_id").trigger('chosen:updated');
      },
      error : function(data){
          toastr.error(data.responseJSON.errors.categoria);
        }
    });
  });

  $('#btnsubmit').on("click", function(e){
    var ruta = "/sisverapaz/public/proyectos";
    var token = $('meta[name="csrf-token"]').attr('content');
    var tot=0.0;
    var montos = new Array();
    var montosorg = new Array();
    var nombre = $("#nombre").val();
    var monto = $("#monto").val();
    var direccion = $("#direccion").val();
    var motivo = $("#motivo").val();
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var beneficiarios = $("#beneficiarios").val();
    $(cuerpo_fondos).find("tr").each(function (index, element) {
      if(element){
        montos.push({
          categoria : $(element).attr("data-categoria"),
          monto : $(element).attr("data-monto")
        });
      }
    });
    $(cuerpo_org).find("tr").each(function (index, element) {
      if(element){
        montosorg.push({
          organizacion : $(element).attr("data-organizacion"),
          montoorg : $(element).attr("data-montoorg")
        });
      }
    });
    console.log(montosorg);
    console.log(montos);
    $.ajax({
      url: ruta,
      headers: {'X-CSRF-TOKEN':token},
      type:'POST',
      dataType:'json',
      data:{nombre,monto,motivo,direccion,fecha_inicio,fecha_fin,beneficiarios,montos,montosorg},

      success: function(msj){
        //window.location.href = "/sisverapaz/public/proyectos";
        console.log(msj);
        toastr.success('Proyecto creado éxitosamente');
      },
      error: function(data, textStatus, errorThrown){
				toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
				$.each(data.responseJSON.errors, function( key, value ) {
					toastr.error(value);
			});
			}
    });
  });


//elimina un elemento de la tabla temporal de fondos y actualiza el monto total
  $(document).on("click", "#delete-btn", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEnd");
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(1)').text());
        monto = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        monto_total=monto_total-parseFloat(totalFila);
        quitar_mostrar($(tr).attr("data-categoria"));
        tr.remove();
        $("#monto").val(onFixed(monto_total));
        $("#pie_monto #totalEnd").text(onFixed(monto));
        contador_monto--;
        $("#contador_fondos").val(contador_monto);
  });

//elimina un elemento de la tabla temporal de fondos aportados por una organizacion y actualiza el monto total
  $(document).on("click", "#delete-monto_org", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEndorg");
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(1)').text());
        var auxiliar_org=0.0;
        auxiliar_org=parseFloat(totalFila);
        monto_organizacion = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        monto_total=monto_total-auxiliar_org;
        quitar_mostrar_org($(tr).attr("data-organizacion"));
        tr.remove();
        $("#monto").val(onFixed(monto_total));
        $("#pie_fondoorg #totalEndorg").text(onFixed(monto_organizacion));
        //$("#pie_monto #totalEnd").text(onFixed(monto));
        contador_org--;
        $("#contador_org").val(contador_org);
  });
});

//funcion que formatea los valores enteros a 2 decimales
function onFixed (valor, maximum) {
  maximum = (!maximum) ? 2 : maximum;
  return valor.toFixed(maximum);
}


function cargarOrganizacion(){
  $.get('/sisverapaz/public/proyectos/listarorganizaciones', function (data){
    var html_select = '<option value="">Seleccione una organizacion</option>';
    for(var i=0;i<data.length;i++){
      html_select +='<option value="'+data[i].id+'">'+data[i].nombre_org+'</option>'
  		//console.log(data[i]);
  		$("#organizacion").html(html_select);
      //$("#organizacion").trigger('chosen:updated');
    }
  });
}

function cargarFondos(){
  $.get('/sisverapaz/public/proyectos/listarfondos', function (data){
    var html_select = '<option value="">Seleccione una categoria</option>';
    for(var i=0;i<data.length;i++){
      html_select +='<option value="'+data[i].id+'">'+data[i].categoria+'</option>'
      //console.log(data[i]);
      $("#cat_id").html(html_select);
      $("#cat_id").trigger('chosen:updated');
    }
  });
}

function quitar_mostrar (ID) {
    $("#cat_id option").each(function (index, element) {
      if($(element).attr("value") == ID ){
        $(element).css("display", "block");
      }
    });
    $("#cat_id").trigger('chosen:updated');
  }

  function quitar_mostrar_org (ID) {
      $("#organizacion option").each(function (index, element) {
        if($(element).attr("value") == ID ){
          $(element).css("display", "block");
        }
      });
    }
