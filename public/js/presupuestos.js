var total=0.0;
var contador = 0;
var monto=0.0;
    $(document).ready(function(){
      listaritems();
      listarcatalogo();
    var tbMaterial = $("#tbMaterial");

     $("#agregaratabla").on("click", function(e) {
    //

         e.preventDefault();
             catalogo = $("#catalogo").val() || 0,
             descripcion =$("#catalogo option:selected").text(),
             cantidad  = $("#cantidad").val() || 0,
             unidad = $("#catalogo option:selected").attr('data-unidad'),
             monto = $("#proyecto option:selected").attr('data-monto'),
             existe = $("#catalogo option:selected");
             precio = $("#precio").val() || 0;


         if(cantidad && precio && catalogo){
             var subtotal = parseFloat(precio) * parseFloat(cantidad);
             var dataJson = JSON.stringify({ catalogo: parseInt(catalogo),precio: precio,cantidad:cantidad })
             //console.log(dataJson);
             contador++;
             $(tbMaterial).append(
                 "<tr data-catalogo='"+catalogo+"' data-cantidad='"+cantidad+"' data-precio='"+precio+"' >"+
                     "<td>" + descripcion + "</td>" +
                     "<td>" + unidad + "</td>" +
                     "<td>" + cantidad+ "</td>" +
                     "<td> $" + precio + "</td>" +
                     "<td>" + onFixed( subtotal, 2 ) + "</td>" +
                     "<td>"+
                     "<div class='btn-group'>"+
                     "<button data-data="+dataJson+" type='button' id='edit-btn' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></button>"+
                     "<button type='button' id='delete-btn' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>"+
                     "</div>"+
                     "</td>" +
                 "</tr>"
             );
             total +=( parseFloat(cantidad) * parseFloat(precio) );
             $("#total").val(onFixed(total));
             $("#contador").val(contador);
             $("#pie #totalEnd").text(onFixed(total));
             $(existe).css("display", "none");
             $("#catalogo").val("");
             $("#catalogo").trigger('chosen:updated');

             //total2=total;
             clearForm();
             $("#btnagregatabla").modal("hide");
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
        if(total>monto){
          swal(
             '¡Aviso!',
             'El total supera al monto del proyecto',
             'warning'
           )
        }else{
          guardar_presupuesto();
        }

    });

    $("#guardaritem").on("click",function(e){
        guardar_categoria();
    });

    $("#guardarcatalogo").on("click",function(e){
        guardar_descripcion();
    });

    $(document).on("click", "#delete-btn", function (e) {
        var tr     = $(e.target).parents("tr"),
            totaltotal  = $("#totalEnd");
        var totalFila=parseFloat($(this).parents('tr').find('td:eq(4)').text());
            total = parseFloat(totaltotal.text()) - parseFloat(totalFila);
        quitar_mostrar($(tr).attr("data-catalogo"));
        tr.remove();
        $("#total").val(onFixed(total));
        $("#pie #totalEnd").text(onFixed(total));
        contador--;
        $("#contador").val(contador);
    });

    $(document).on("click","#edit-btn", function(e){
      //obtener los datos de un json y enviarlos al formulario
      var data = JSON.parse($(e.currentTarget).attr('data-data'));
      console.log(data);
      $(document).find("#catalogo").val(data.catalogo);
      $(document).find("#cantidad").val(data.cantidad);
      $(document).find("#precio").val(data.precio);
      $("#catalogo").trigger('chosen:updated');
      $("#item").trigger('chosen:updated');
      //quitar la fila de la tabla estableciendo el nuevo total temporal antes de la edición
      var tr     = $(e.target).parents("tr"),
      totaltotal  = $("#totalEnd");
      var totalFila=parseFloat($(this).parents('tr').find('td:eq(4)').text());
          total = parseFloat(totaltotal.text()) - parseFloat(totalFila);
          tr.remove();
          $("#total").val(onFixed(total));
          $("#pie #totalEnd").text(onFixed(total));
    });

    function clearForm () {
        $("#presupuesto").find("#precio,#cantidad").each(function (index, element) {
            $(element).val("");
        });
    }

    function onFixed (valor, maximum) {
        maximum = (!maximum) ? 2 : maximum;
        return valor.toFixed(maximum);
    }

    function quitar_mostrar (ID) {
        $("#catalogo option").each(function (index, element) {
          if($(element).attr("value") == ID ){
            $(element).css("display", "block");
          }
        });
        $("#catalogo").trigger('chosen:updated');
      }

    function guardar_categoria()
    {
        var item = $("#txtitem").val();
        var nombr = $("#txtcategoria").val();
        var nombre_categoria = nombr.toUpperCase();
        var token = $('meta[name="csrf-token"]').attr('content');
        var ruta = '/'+carpeta()+'/public/presupuestos/guardarcategoria';
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data: {item,nombre_categoria},
           success : function(msj){
                //window.location.href = "/sisverapaz/public/proyectos";
                console.log(msj.mensaje);
                if(msj.mensaje === "exito")
                {
                    toastr.success('Categoría registrado éxitosamente');
                    $("#txtitem").val("");
                    $("#txtcategoria").val("");
                    listaritems();
                }else{
                    toastr.error('Ocurrió un error al guardar');
                }

            },
            error: function(data, textStatus, errorThrown){
                toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
                $.each(data.responseJSON.errors, function( key, value ) {
                    toastr.error(value);
                });
            }
        });
    }

    function guardar_descripcion()
    {
        var nombre_descripcion = $("#txtdescripcion").val();
        var unidad_medida = $("#txtunidad").val();
        var nombre = nombre_descripcion.toUpperCase();
        var token = $('meta[name="csrf-token"]').attr('content');
        var ruta = '/'+carpeta()+'/public/presupuestos/guardardescripcion';
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data: {nombre,unidad_medida},
           success : function(msj){
                //window.location.href = "/sisverapaz/public/proyectos";
                console.log(msj.mensaje);
                if(msj.mensaje === "exito")
                {
                    toastr.success('Categoría registrado éxitosamente');
                    $("#txtdescripcion").val("");
                    $("#txtunidad").val("");
                    listarcatalogo();
                }else{
                    toastr.error('Ocurrió un error al guardar');
                }

            },
            error: function(data, textStatus, errorThrown){
                toastr.error('Ha ocurrido un '+textStatus+' en la solucitud');
                $.each(data.responseJSON.errors, function( key, value ) {
                    toastr.error(value);
                });
            }
        });
    }

    function listaritems()
    {
        $.get('/'+carpeta()+'/public/presupuestos/getcategorias', function (data){
        var html_select = '<option value="">Seleccione un ítem</option>';
        //console.log(data.length);
        if(data.length < 1){
            $("#item").html(html_select);
            $("#item").trigger('chosen:updated');
        }else{
            for(var i=0;i<data.length;i++){
                html_select +='<option value="'+data[i].id+'">'+data[i].item+' '+ data[i].nombre_categoria+'</option>'
                //console.log(data[i]);
                $("#item").html(html_select);
                $("#item").trigger('chosen:updated');
            }
        }

        });
    }

    function listarcatalogo()
    {
        $.get('/'+carpeta()+'/public/presupuestos/getcatalogo', function (data){
            var html_select = '<option value="">Seleccione una descripción</option>';
            //console.log(data.length);
            if(data.length < 1){
                $("#catalogo").html(html_select);
                $("#catalogo").trigger('chosen:updated');
            }else{
                for(var i=0;i<data.length;i++){
                    html_select +='<option data-unidad="'+data[i].unidad_medida+'" value="'+data[i].id+'">'+data[i].nombre+'</option>'
                    //console.log(data[i]);
                    $("#catalogo").html(html_select);
                    $("#catalogo").trigger('chosen:updated');
                }
            }
        });
    }

    function guardar_presupuesto(){
      var ruta = "/"+carpeta()+"/public/presupuestos";
      var token = $('meta[name="csrf-token"]').attr('content');
      var total = $("#total").val();
      var proyecto_id = $("#proyecto").val();
      var categoria_id = $("#item").val();
      var presupuestos = new Array();
      $(cuerpo).find("tr").each(function (index, element) {
          if(element){
              presupuestos.push({
                  catalogo: $(element).attr("data-catalogo"),
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
            data: {proyecto_id,categoria_id,total,presupuestos},
           success : function(msj){
                window.location.href = "/"+carpeta()+"/public/proyectos";
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
    }
});
