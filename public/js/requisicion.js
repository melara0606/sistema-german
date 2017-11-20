var contador=0;
$(document).ready(function(){
	var tbRequisicion = $("#tbRequisicion");
	$("#agregar").on("click",function(e){
		e.preventDefault();
		/*codigo = $("#codigo").val() || 0;
		cant = $("#cantidad").val() || 0;
		unidad = $("#medida").val() || 0;
		descripcion = $("#descripcion").val() || 0;*/

		contador++;
			$(tbRequisicion).append(//$() Para hacer referencia
				"<tr>"+
				"<td><input type= 'text' nombre='codigos[]' value=''></td>" +
				"<td><input type= 'text' nombre='cantidades[]' value=''></td>" +
				"<td><input type= 'text' nombre='unidades[]'value=''></td>" +
				"<td><input type= 'text' nombre='descriciones[]' value=''></td>" +
				"<td>" +
				"<button type='button' class='btn btn-danger' id='eliminar'>Eliminar</button></td>" +
				"</tr>"
			);
			$("#contador").val(contador);

	});
	$(document).on("click","#eliminar",function(e){
		var tr= $(e.target).parents("tr");
		tr.remove();
		contador--;
		$("#contador").val(contador);

	});

	function limpiar(){
		$("#requisicion").find("#codigo, #cantidad, #medida, #descripcion").each(function(index, element){
			$(element).val("");
		});
	}
});