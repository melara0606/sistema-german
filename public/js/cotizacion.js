$(document).ready(function(e){
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

	$(document).on("keyup", ".precios", function (e) {
		var cantidad=$(this).parents('tr').find('td:eq(2)').text();
		var valor = $(this).val();
		var total = parseFloat(cantidad * valor);
		$(this).parents('tr').find('td:eq(5)').text("$"+total.toFixed(2));
	});
});
