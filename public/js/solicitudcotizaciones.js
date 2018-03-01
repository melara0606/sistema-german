$(document).ready(function(){
	$( "#proyecto").change(function(e) {
  		var id = ( this.value );
  		var datos = $.get('/sisverapaz/public/solicitudcotizaciones/getpresupuesto/'+ id , function(data){
	        //var dataJson = JSON.stringify({ id: data[i].fondocat.id, monto: data[i].monto })
	  		console.log(data);
	  		$(data).each(function(key, value){
	  			$(cuerpo).empty();
	  			$(value.presupuestodetalle).each(function(key, value){
	  				$(cuerpo).append(
		                "<tr>"+
		                    "<td>" + value.item + "</td>" +
		                    "<td>" + value.material + "</td>" +
		                    "<td>" + value.unidad + "</td>" +
		                    "<td>" + value.cantidad + "</td>" +
		                "</tr>"
		          		);
	  			});
	  		});
    	});
	});


});