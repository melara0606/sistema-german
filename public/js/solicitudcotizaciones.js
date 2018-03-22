$(document).ready(function(){
	$( "#proyecto").change(function(e) {
  		var id = ( this.value );
  		if(id > 0){
  			$.get('/'+carpeta()+'/public/solicitudcotizaciones/getpresupuesto/'+ id , function(data){
	        //var dataJson = JSON.stringify({ id: data[i].fondocat.id, monto: data[i].monto })
	        $(cuerpo).empty();
	  		console.log(data);
	  		$(data).each(function(key, value){
  				$(cuerpo).append(
	                "<tr>"+
	                    "<td>" + value.catalogo.nombre + "</td>" +
	                    "<td>" + value.catalogo.unidad_medida + "</td>" +
	                    "<td>" + value.cantidad + "</td>" +
	                "</tr>"
	          	);
	  		});
    	});
  		}else{
  			swal(
			  'Debe seleccionar un proyecto!',
			  '',
			  'info'
			);
			$(cuerpo).empty();
  		}
  		
	});


});