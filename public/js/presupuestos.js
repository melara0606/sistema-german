var total=0.0;
var contador = 0;
    $(document).ready(function(){
    var tbMaterial = $("#tbMaterial");

     $("#agregar").on("click", function(e) {
    // 

         e.preventDefault();
             descripcion = $("#descripcion").val()    || 0,
             item = $("#item").val()    || 0,
             categoria = $("#categoria").val() || 0,
             cantidad  = $("#cantidad").val() || 0,
             unidad = $("#unidad").val() || 0,
             precio = $("#precio").val() || 0;

         if(descripcion && cantidad && precio && item && unidad && categoria){
             var subtotal = parseFloat(precio) * parseFloat(cantidad);
             contador++;
             $(tbMaterial).append(
                 "<tr data-item='"+item+"' data-categoria='"+categoria+"' data-descripcion='"+descripcion+"' data-unidad='"+unidad+"' data-cantidad='"+cantidad+"' data-precio='"+precio+"' >"+
                     "<td>" + item + "</td>" +
                     "<td>" + categoria + "</td>" + 
                     "<td>" + descripcion + "</td>" +
                     "<td>" + unidad + "</td>" +
                     "<td>" + cantidad+ "</td>" +
                     "<td> $" + precio + "</td>" +
                     "<td>" + onFixed( subtotal, 2 ) + "</td>" +
                     "<td>"+
                     "<button type='button' id='delete-btn' class='btn btn-danger'>Eliminar</button></td>" +
                 "</tr>"
             );
             total +=( parseFloat(cantidad) * parseFloat(precio) );
             $("#total").val(onFixed(total));
             $("#contador").val(contador);
             $("#pie #totalEnd").text(onFixed(total));
             //total2=total;
             clearForm();
         }else{
           swal(
              '¡Aviso!',
              'Debe llenar todos los campos',
              'warning'
)
         }
     });

    $("#btnsubmit").on("click", function (e) {
        ////// obtener todos los datos y convertirlos a json /////////////////////////////////////////////
        var ruta = "/sisverapaz/public/presupuestos";
        var token = $('meta[name="csrf-token"]').attr('content');
        var total = $("#total").val();
        var proyecto_id = $("#proyecto").val();
        var presupuestos = new Array();
        $(cuerpo).find("tr").each(function (index, element) {
            if(element){
                presupuestos.push({
                    item : $(element).attr("data-item"),
                    categoria : $(element).attr("data-categoria"),
                    descripcion : $(element).attr("data-descripcion"),
                    unidad : $(element).attr("data-unidad"),
                    cantidad :$(element).attr("data-cantidad"),
                    precio : $(element).attr("data-precio")
                });
            }    
        });
        console.log(presupuestos);


/////////////////////////////////////////////////// funcion ajax para guardar ///////////////////////////////////////////////////////////////////
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data: {proyecto_id,total,presupuestos},
           success : function(msj){
                //window.location.href = "/sisverapaz/public/proyectos";
                console.log(msj);
                toastr.success('Presupuesto registrado éxitosamente');
            },
            error: function(data, textStatus, errorThrown){
                toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
                $.each(data.responseJSON.errors, function( key, value ) {
                    toastr.error(value);
            });
            }
      });
    });

    $(document).on("click", "#delete-btn", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEnd");
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(6)').text());
            total = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        var totalValue = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        tr.remove();
        $("#total").val(onFixed(totalValue));
        $("#pie #totalEnd").text(onFixed(totalValue));
        contador--;
        $("#contador").val(contador);
    });

    function clearForm () {
        $("#presupuesto").find("#descripcion,#precio,#cantidad,#unidad").each(function (index, element) {
            $(element).val("");
        });
    }

    function onFixed (valor, maximum) {
        maximum = (!maximum) ? 2 : maximum;
        return valor.toFixed(maximum);
    }

});