var contador=0;
$(document).ready(function(){
	var tbRequisicion = $("#tbRequisicion");
	$("#agregar").on("click",function(e){
		e.preventDefault();
		codigo = $("#codigo").val() || 0;
		cant = $("#cantidad").val() || 0;
		unidad = $("#unidad").val() || 0;
		descripcion = $("#descripcion").val() || 0;
		if(codigo && cant && unidad && descripcion)
		{
			contador++;
				$(tbRequisicion).append(//$() Para hacer referencia
					"<tr>"+
					"<td>"+codigo+"</td>"+
					"<td>"+cant+"</td>"+
					"<td>"+unidad+"</td>"+
					"<td>"+descripcion+"</td>"+
					"<td>" +
					"<input type='hidden' name='cantidades[]' value='"+cant+"'/>" +
					"<input type='hidden' name='unidades[]' value='"+unidad+"'/>" +
					"<input type='hidden' name='codigos[]' value='"+codigo+"' />"+
					"<input type='hidden' name='descripciones[]' value='"+descripcion+"'/>" +
					"<button type='button' class='btn btn-danger' id='eliminar'>Eliminar</button></td>" +
					"</tr>"
				);
				$("#contador").val(contador);
				limpiar();
		}else {
			{
				swal(
					 '¡Aviso!',
					 'Debe llenar todos los campos',
					 'warning'
)
			}
		}


	});
	$(document).on("click","#eliminar",function(e){
		var tr= $(e.target).parents("tr");
		tr.remove();
		contador--;
		$("#contador").val(contador);

	});

	function limpiar(){
		$("#requisicion").find("#codigo, #cantidad, #unidad, #descripcion").each(function(index, element){
			$(element).val("");
		});
	}
});
