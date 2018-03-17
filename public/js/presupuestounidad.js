$(document).ready(function(){
	var total=0.0;
	var tbMaterial = $("#tbMaterial");
	$("#agregar").on("click", function(e){

		e.preventDefault();
		var unidad_medida = $("#unidad_medida").val() || 0;
		var descripcion = $("#descripcion").val() || 0;
		var precio = $("#precio").val() || 0;
		var cantidad = $("#cantidad").val() || 0;
		if(unidad_medida && descripcion && precio && cantidad)
		{
			var subtotal = parseFloat(precio) * parseFloat(cantidad);
			$(tbMaterial).append(
				"<tr data-descripcion="+descripcion+" data-unidad="+unidad_medida+" data-precio="+precio+" data-cantidad="+cantidad+">"+
					"<td>"+descripcion+"</td>"+
					"<td>"+unidad_medida+"</td>"+
					"<td>"+precio+"</td>"+
					"<td>"+cantidad+"</td>"+
					"<td>"+onFixed(parseFloat(subtotal),2)+"</td>"+
					"<td><button type='button' id='eliminar' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button>"+
				"</tr>"
			);
			total+=subtotal;
			$("#pie #totalEnd").text(onFixed(parseFloat(total),2));
		}else{
			swal('¡Aviso!',
              'Debe llenar los espacios',
              'warning');
		}
	});

	$("#btnsub").on("click", function(e){
		var nFilas = $("#cuerpo tr").length;
		var ruta = "/"+carpeta()+"/public/presupuestounidades";
		var token = $('meta[name="csrf-token"]').attr('content');
		var unidad_admin = $("#unidad_admin").val();
		totalp    = $("#pie #totalEnd").text();
		var presupuesto = new Array();
		if(nFilas>0 && unidad_admin != ''){
		$(cuerpo).find("tr").each(function(index,element){
			if(element)
			{
				presupuesto.push({
					descripcion : $(element).attr("data-descripcion"),
					unidad_medida : $(element).attr("data-unidad"),
					precio : $(element).attr("data-precio"),
					cantidad : $(element).attr("data-cantidad")
				});
			}
		});
		console.log(total);
		$.ajax({
			url:ruta,
			headers: {'X-CSRF-TOKEN':token},
			type: 'POST',
			dataType: 'json',
			data:{unidad_admin,totalp,presupuesto}, 
			success: function(msj){
        	window.location.href = "/sisverapaz/public/presupuestounidades";
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
		}else{
			swal('¡Aviso!',
              'Nada que guardar',
              'error');
		}

	});

	$(document).on("click","#eliminar",function(e){
		var tr = $(e.target).parents("tr");
		var auxiliar = $("#totalEnd");
		var totalfila = parseFloat($(this).parents("tr").find("td:eq(4)").text());
		total = parseFloat(auxiliar.text() - parseFloat(totalfila));
		$("#pie #totalEnd").text(onFixed(parseFloat(total),2));
		tr.remove();
	});
});
function onFixed(valor,maximo){
	maximo = (!maximo) ? 2 : maximo;
	return valor.toFixed(maximo);
}

