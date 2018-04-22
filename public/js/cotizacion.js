$(document).ready(function(e){

$('input[type="radio"]').on('click', function(e) {
    idcot = (this.value);
    idproy = $(this).attr('data-proyecto');
		swal({
			title: '¿Está seguro?',
			text: "¿Desea seleccionar este proveedor?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '¡Si!',
			cancelButtonText: '¡No!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				swal(
					'¡Seleccionado!',
					'Proveedor seleccionado.',
					'success'
				)
        seleccionar(idcot,idproy);
			} else if (result.dismiss === swal.DismissReason.cancel) {
				swal(
					'Cancelado',
					'Seleccione un proveedor',
					'info'
				)
				$('input[name=seleccionar]').attr('checked',false);
			}
		})
});


	$("#proyecto").on("change",  function(e){
		var id = (this.value);
		if(id > 0){
			var datos = $.get('/'+carpeta()+'/public/solicitudcotizaciones/getpresupuesto/'+ id , function(data){
		        //var dataJson = JSON.stringify({ id: data[i].fondocat.id, monto: data[i].monto })
		  			$(cuerpo).empty();
		  			$(data).each(function(key, value){
		  				$(cuerpo).append(
			                "<tr>"+
			                    "<td>" + value.catalogo.nombre + "</td>" +
			                    "<td>" + value.catalogo.unidad_medida + "</td>" +
			                    "<td>" + value.cantidad + "</td>" +
			                    "<td><input type='text' name='marcas[]' class='form-control' /></td>" +
			                    "<td><input type='number' name='precios[]' steps='any' required class='precios form-control' />"+
			                    "<input type='hidden' name='unidades[]' value='"+value.catalogo.unidad_medida+"'/>"+
			                    "<input type='hidden' name='descripciones[]' value='"+value.catalogo.nombre+"'/>"+
			                    "<input type='hidden' name='cantidades[]' value='"+value.cantidad+"'/>"+
			                    "</td>"+
			                    "<td class='total'>$0.00</td>"+
			                "</tr>"
			          	);
		  			});
	    	});
		}else {
			swal(
			'Debe seleccionar un proyecto!',
			'',
			'info'
		);
		$(cuerpo).empty();
		}

	});

/*	$(document).on("keyup", ".precios", function (e) {
		//var cantidad=$(this).parents('tr').find('td:eq(2)').text();
	//	var valor = $(this).val();
  var element = $(e.currentTarget),
    cantidad   = $(element).attr('data-cantidad'),
    subTotal =  $(element).val(),
    parent  = element.parents("tr");
    console.log(subTotal);
		//var total = parseFloat(cantidad * valor);
		//$(this).parents('tr').find('td:eq(5)').text("$"+total.toFixed(2));
	});*/

  $(".precios").keyup(function(e){
    var element = $(e.currentTarget),
      cantidad   = $(element).attr('data-cantidad'),
      subTotal =  $(element).val(),
      parent  = element.parents("tr");

      if($.isNumeric($(element).val()) && $.trim($(element).val()))
  			subTotal = ( $(element).val() * parseFloat(cantidad) );
  		else
  			subTotal = 0
      //console.log(parent);
      $(parent).find(".subtotal").text("$"+subTotal.toFixed(2));
  });

  function seleccionar(id,idproy)
  {
    var ruta ="/"+carpeta()+"/public/cotizaciones/seleccionar";
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: ruta,
			headers: {'X-CSRF-TOKEN':token},
			type: 'POST',
			dataType: 'json',
			data:{idcot,idproy},

			success: function(data){
        if(data.mensaje === 'exito'){
          toastr.success('Proveedor seleccionado con éxito');
        }else{
          toastr.error('Ha ocurrido un error en la solucitud contacte al administrador');
          console.log(data.mensaje);
        }

			},
			error: function(data, textStatus, errorThrown){
        console.log(data);
				toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
				$.each(data.responseJSON.errors, function( key, value ) {
					toastr.error(value);
			});
			}
    });
  }
});
