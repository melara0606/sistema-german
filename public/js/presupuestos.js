var total=0.0;
var contador = 0;
    $(document).ready(function(){
    var tbMaterial = $("#tbMaterial");

     $("#agregaratabla").on("click", function(e) {
    // 

         e.preventDefault();
             categoria = $("#categoria option:selected").text()    || 0,
             nombrecat = $("#descripcion option:selected").text(),
             catalogo = $("#descripcion").val() || 0,
             cantidad  = $("#cantidad").val() || 0,
             unidad = $("#descripcion option:selected").attr('data-unidad'),
             existe = $("#descripcion option:selected");
             precio = $("#precio").val() || 0;


         if(cantidad){
             var subtotal = parseFloat(precio) * parseFloat(cantidad);
             contador++;
             $(tbMaterial).append(
                 "<tr data-categoria='"+catalogo+"' data-cantidad='"+cantidad+"' data-precio='"+precio+"' >"+
                     "<td>" + categoria + "</td>" + 
                     "<td>" + nombrecat + "</td>" +
                     "<td>" + unidad + "</td>" +
                     "<td>" + cantidad+ "</td>" +
                     "<td> $" + precio + "</td>" +
                     "<td>" + onFixed( subtotal, 2 ) + "</td>" +
                     "<td>"+
                     "<button type='button' id='delete-btn' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button></td>" +
                 "</tr>"
             );
             total +=( parseFloat(cantidad) * parseFloat(precio) );
             $("#total").val(onFixed(total));
             $("#contador").val(contador);
             $("#pie #totalEnd").text(onFixed(total));
             $(existe).css("display", "none");
             $("#descripcion").val("");
             $("#descripcion").trigger('chosen:updated');

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
        var ruta = "/"+carpeta()+"/public/presupuestos";
        var token = $('meta[name="csrf-token"]').attr('content');
        var total = $("#total").val();
        var proyecto_id = $("#proyecto").val();
        var presupuestos = new Array();
        $(cuerpo).find("tr").each(function (index, element) {
            if(element){
                presupuestos.push({
                    categoria : $(element).attr("data-categoria"),
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

    $("#guardacat").on("click",function(e){
        guardar_categoria();
    });

    $("#guardarcatalogo").on("click",function(e){
        guardar_descripcion();
    });

    $("#item").on("change", function(e){
        var item = (this.value);
        if(item > 0)
        {
            listarcategorias(item);
        }else{
            swal(
              '¡Debe seleccionar un item!',
              '',
              'warning'
            )
        }
    });

    $("#categoria").on("change",function(){
        var id = (this.value);
        listarcatalogo(id);
    });

    $("#item3").on("change", function(e){
        var item = (this.value);
        if(item > 0)
        {
            listarcategorias3(item);
        }else{
            swal(
              '¡Debe seleccionar un item!',
              '',
              'warning'
            )
        }
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

    function guardar_categoria()
    {
        var item = $("#item2").val();
        var nombr = $("#categoria2").val();
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
                    $("#item2").val("");
                    $("#categoria2").val(""); 
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
        var categoria_id = $("#categoria3").val();
        var nombre_descripcion = $("#nombre_descripcion").val();
        var unidad_medida = $("#unidad_medida").val();
        var nombre = nombre_descripcion.toUpperCase();
        var token = $('meta[name="csrf-token"]').attr('content');
        var ruta = '/'+carpeta()+'/public/presupuestos/guardardescripcion';
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data: {categoria_id,nombre,unidad_medida},
           success : function(msj){
                //window.location.href = "/sisverapaz/public/proyectos";
                console.log(msj.mensaje);
                if(msj.mensaje === "exito")
                {
                    toastr.success('Categoría registrado éxitosamente');
                    $("#categoria").trigger('chosen:updated');
                    $("#nombre_descripcion").val(""); 
                    $("#unidad_medida").val("");
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

    function listarcategorias(item)
    {
        $.get('/'+carpeta()+'/public/presupuestos/getcategorias/'+item, function (data){
        var html_select = '<option value="">Seleccione una categoría</option>';
        //console.log(data.length);
        if(data.length < 1){
            $("#categoria").html(html_select);
            $("#categoria").trigger('chosen:updated');
        }else{
            for(var i=0;i<data.length;i++){
                html_select +='<option value="'+data[i].id+'">'+data[i].nombre_categoria+'</option>'
                //console.log(data[i]);
                $("#categoria").html(html_select);
                $("#categoria").trigger('chosen:updated');
            }  
        }
            
        });
    }

    function listarcategorias3(item)
    {
        $.get('/'+carpeta()+'/public/presupuestos/getcategorias/'+item, function (data){
        var html_select = '<option value="">Seleccione una categoría</option>';
        //console.log(data.length);
        if(data.length < 1){
            $("#categoria3").html(html_select);
            $("#categoria3").trigger('chosen:updated');
        }else{
            for(var i=0;i<data.length;i++){
                html_select +='<option value="'+data[i].id+'">'+data[i].nombre_categoria+'</option>'
                //console.log(data[i]);
                $("#categoria3").html(html_select);
                $("#categoria3").trigger('chosen:updated');
            }  
        }
            
        });
    }

    function listarcatalogo(id)
    {
        $.get('/'+carpeta()+'/public/presupuestos/getcatalogo/'+id, function (data){
            var html_select = '<option value="">Seleccione una descripción</option>';
            //console.log(data.length);
            if(data.length < 1){
                $("#descripcion").html(html_select);
                $("#descripcion").trigger('chosen:updated');
            }else{
                for(var i=0;i<data.length;i++){
                    html_select +='<option data-categoria="'+data[i].categoria_id+'" data-unidad="'+data[i].unidad_medida+'" value="'+data[i].id+'">'+data[i].nombre+'</option>'
                    //console.log(data[i]);
                    $("#descripcion").html(html_select);
                    $("#descripcion").trigger('chosen:updated');
                }  
            }   
        });
    }
});