var contador=0;
$(document).ready(function(){
	var tbRequisicion = $("#tbRequisicion");
	$("#agregar").on("click",function(e){
		e.preventDefault();
		cant = $("#cantidad").val() || 0;
		unidad = $("#unidad_medida option:selected").text() || 0;
		descripcion = $("#descripcion").val() || 0;
		if(cant && unidad && descripcion)
		{
			contador++;
				$(tbRequisicion).append(//$() Para hacer referencia
					"<tr>"+
					"<td>"+descripcion+"</td>"+
					"<td>"+cant+"</td>"+
					"<td>"+unidad+"</td>"+
					"<td>" +
					"<input type='hidden' name='cantidades[]' value='"+cant+"'/>" +
					"<input type='hidden' name='unidades[]' value='"+unidad+"'/>" +
					"<input type='hidden' name='descripciones[]' value='"+descripcion+"'/>" +
					"<button type='button' class='btn btn-danger btn-xs' id='eliminar'><span class='glyphicon glyphicon-remove'></span></button></td>" +
					"</tr>"
				);
				$("#contador").val(contador);
				limpiar();
		}else {
			{
				swal(
					 '¡Aviso!',
					 'Debe llenar todos los campos',
					 'warning')
			}
		}


	});

	$("#proyecto").on("change", function(){
		var id = $(this).val();
		//alert(id);
	});

	$(document).on("click","#eliminar",function(e){
		var tr= $(e.target).parents("tr");
		tr.remove();
		contador--;
		$("#contador").val(contador);

	});

	function limpiar(){
		$("#requisicion").find("#cantidad, #descripcion, #unidad_medida").each(function(index, element){
			$(element).val("");
			$("#unidad_medida").trigger('chosen:updated');
		});
	}
});
