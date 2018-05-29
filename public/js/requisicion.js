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
					"<tr data-descripcion='"+descripcion+"' data-cantidad='"+cant+"' data-unidad='"+unidad+"'>"+
					"<td>"+descripcion+"</td>"+
					"<td>"+cant+"</td>"+
					"<td>"+unidad+"</td>"+
					"<td>" +
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

	$("#btnguardar").on("click", function(){
		var ruta = "/"+carpeta()+"/public/requisiciones";
		var token = $('meta[name="csrf-token"]').attr('content');
		var total = $("#total").val();
		var unidad_admin = $("#unidad_admin").val();
		var actividad = $("#actividad").val();
		var linea_trabajo = $("#linea_trabajo").val();
		var fuente_financiamiento = $("#fuente_financiamiento").val();
		var justificacion = $("#justificacion").val();

		var requisiciones = new Array();
		$(cuerpo).find("tr").each(function (index, element) {
				if(element){
						requisiciones.push({
								descripcion: $(element).attr("data-descripcion"),
								cantidad :$(element).attr("data-cantidad"),
								unidad : $(element).attr("data-unidad")
						});
				}
		});
	//	console.log(unidad_admin);


/////////////////////////////////////////////////// funcion ajax para guardar ///////////////////////////////////////////////////////////////////
			$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data: {unidad_admin,actividad,linea_trabajo,justificacion,fuente_financiamiento,requisiciones},
				 success : function(msj){
					 console.log(msj);
						if(msj.mensaje == 'exito'){
							window.location.href = "/"+carpeta()+"/public/requisiciones";
							console.log(msj);
							toastr.success('Presupuesto registrado éxitosamente');
						}else{
							toastr.error('Ocurrió un error, contacte al administrador');
						}

					},
					error: function(data, textStatus, errorThrown){
							toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
							$.each(data.responseJSON.errors, function( key, value ) {
									toastr.error(value);
					});
					}
	});
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
