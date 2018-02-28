$(document).ready(function(e){
	$("#proyecto").on("change",  function(e){
		var id = (this.value);
		var datos = $.get('/sisverapaz/public/solicitudcotizaciones/getpresupuesto/'+ id , function(data){
	        //var dataJson = JSON.stringify({ id: data[i].fondocat.id, monto: data[i].monto })
	  		//console.log(data);
	  		$(data).each(function(key, value){
	  			$(cuerpo).empty();
	  			$(value.presupuestodetalle).each(function(key, value){
	  				$(cuerpo).append(
		                "<tr>"+
		                    "<td>" + value.item + "</td>" +
		                    "<td>" + value.material + "</td>" +
		                    "<td>" + value.unidad + "</td>" +
		                    "<td>" + value.cantidad + "</td>" +
		                    "<td><input type='number' name='precios[]' steps='any' required class='precios form-control' />"+
		                    "<input type='hidden' name='unidades[]' value='"+value.unidad+"'/>"+
		                    "<input type='hidden' name='cantidades[]' value='"+value.cantidad+"'/>"+
		                    "</td>"+
		                    "<td class='total'>$0.00</td>"+ 
		                "</tr>"
		          	);
	  			});
	  		});
    	});
	});

	$(document).on("keyup", ".precios", function (e) {
		var cantidad=$(this).parents('tr').find('td:eq(3)').text();
		var valor = $(this).val();
		var total = parseFloat(cantidad * valor);
		$(this).parents('tr').find('td:eq(5)').text("$"+total.toFixed(2));
	});
});