var total=0.0;
var contador = 0;
    $(document).ready(function(){
    var tbMaterial = $("#tbMaterial");

     $("#agregar").on("click", function(e) {
    //     //var tr     = $(e.target).parents("tr"),

         e.preventDefault();
             material = $("#material").val()    || 0,
             canti  = $("#cantidad").val() || 0,
             precio = $("#precio").val() || 0;

         if(material && canti && precio){
             var subtotal = parseFloat(precio) * parseFloat(canti);
             contador++;
             $(tbMaterial).append(
                 "<tr data-material='"+material+"' data-cantidad='"+canti+"' data-precio='"+precio+"' >"+
                     "<td>" + material + "</td>" +
                     "<td>" + canti+ "</td>" +
                     "<td>" + precio + "</td>" +
                     "<td>" + onFixed( subtotal, 2 ) + "</td>" +
                     "<td>"+
                     "<input type='hidden' name='materiales[]' value='"+material+"' />"+
                     "<input type='hidden' name='cantidades[]' value='"+canti+"' />"+
                     "<input type='hidden' name='precios[]' value='"+precio+"' />"+
                     "<button type='button' id='delete-btn' class='btn btn-danger'>Eliminar</button></td>" +
                 "</tr>"
             );
             total +=( parseFloat(canti) * parseFloat(precio) );
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

    function onDisplayTotal () {

    };

    $("#btnsub").on("click", function (e) {
        var elementos = new Array(),
            token        = null;
            proyecto  = null;
            totalpre     = null;
        $(tbMaterial).find("tr").each(function (index, element) {
            if(element){
                elementos.push({
                    material : $(element).attr("data-material"),
                    cantidad :$(element).attr("data-cantidad"),
                    precio   : $(element).attr("data-precio")
                });
                //total = totalp+(parseFloat(cantidad))*(parseFloat(precio));
            }
            token = $("#_token").val();
            proyecto = $("#proyecto").val();
            totalpre    = $("#pie #totalEnd").text();
        });

       /*var elemento = {
            cliente : cliente,
            mejora  : mejora,
            trabajados : trabajados,
            total   : totalpre,
            elementos : arrayElement
        };*/


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN' : token },
            url: '/alcaldia/public/presupuestos',
            dataType: 'json',
            data: {materiales: elementos, presupuesto: presupuesto, total: totalpre },
           success : function(msj){
                //alert('Dato insertado');
                console.log(msj.responseJSON);
                window.location.reload();
            },
            error : function(msj){
                //console.log(msj.responseJSON);


            }
      });

        /*$.post("", elemento)
        .done(function (response) {
            console.log(response);
            if(response){
                  alert("guardo");

                //win2ow.location.reload();
            }

        });*/
    });

    $(document).on("click", "#delete-btn", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEnd");
          //alert(total.text());
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(3)').text());
        //var total = $(this).find("td:eq(5)").text();
            //alert(totalFila);
            total = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        var totalValue = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        //subtotal=totalValue;
        //alert(totalValue);
        //total.text(onTixed(totalValue));
        //total2 = (on2ixed(totalValue));
        tr.remove();
        $("#total").val(onFixed(totalValue));
        $("#pie #totalEnd").text(onFixed(totalValue));
        contador--;
        $("#contador").val(contador);
    });

    function clearForm () {
        $("#presupuesto").find("#material,#precio,#cantidad").each(function (index, element) {
            $(element).val("");
        });

    }

    function onDisplaySelect (productoID) {
        $("#producto option").each(function (index, element) {
            if($(element).attr("value") == productoID ){
                $(element).css("display", "block");
            }
     });
    }

    function onFixed (valor, maximum) {
        maximum = (!maximum) ? 2 : maximum;
        return valor.toFixed(maximum);
    }
});
