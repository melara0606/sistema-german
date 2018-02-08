var contador_monto=0;
var monto_total = 0.0;
$(document).ready(function(){

  cargarFondos();

	var select = '<label for="" class="col-md-4 control-label">Seleccione organización</label>'+
		'<div class="col-md-6">'+
				'<select name="organizacion_id" id="organizacion" class="form-control" ><option value="">Seleccione organización...</option></select>'+
		'</div>'+
		'<div class="col-md-2">'+
				'<button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnorganizacion">Agregar nueva</button>'+
		'</div>';


	$( '#colaboradora' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        cargarOrganizacion();
        $("#cola").html(select);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //$("#cola").css("visibility", 'hidden');
        $("#cola").empty();
    }
});

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
        (this).cargarOrganizacion();
      }
    });
	});

  $('#btnAgregarfondo').on("click", function(e){
    e.preventDefault();
    var cat = $("#cat_id").val() || 0;
    var cat_nombre = $("#cat_id option:selected").text() || 0;
    var cant_monto = $("#cant_monto").val() || 0;
    var existe = $("#cat_id option:selected");

    if(cat && cant_monto){
      $(tbFondos).append(
                 "<tr data-categoria='"+cat+"'>"+
                     "<td>" + cat_nombre + "</td>" +
                     "<td>" + onFixed( parseFloat(cant_monto), 2 ) + "</td>" +
                     "<td>"+
                     "<input type='hidden' name='categorias[]' value='"+cat+"' />"+
                     "<input type='hidden' name='montos[]' value='"+cant_monto+"' />"+
                     "<button type='button' id='delete-btn' class='btn btn-danger'>Eliminar</button></td>" +
                 "</tr>"
             );
      monto_total+=parseFloat(cant_monto);
      $("#monto").val(onFixed(monto_total));
      $("#contador").val(contador_monto);
      $("#pie_monto #totalEnd").text(onFixed(monto_total));
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
          toastr.error(data.responseJSON.categoria);
        }
    });
  });

  $(document).on("click", "#delete-btn", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEnd");
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(1)').text());
        total = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        var totalValue = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        quitar_mostrar($(tr).attr("data-categoria"));
        tr.remove();
        $("#monto").val(onFixed(totalValue));
        $("#pie #totalEnd").text(onFixed(totalValue));
        contador_monto--;
        $("#contador").val(contador_monto);
  });

});

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