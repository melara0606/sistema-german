<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido a SISVERAPAZ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('css/sisverapaz.css') }}">
  <script src="{{ asset('js/sisverapaz.js') }}"></script>
  <style>
    #scroll {
      background-color: #FFF;
      width: 100%;
      height: 100%;
      overflow: scroll;
    }
</style>


  <!-- iCheck -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Usuarios</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'Auth\RegisterController@register','class' => 'form-horizontal']) }}
                    @include('errors.validacion')
                        <div id="example-basic">
                          <h3>Datos Personales</h3>
                          <section>
                              <div class="container" id="scroll">
                                @include('auth.personales')
                              </div>
                          </section>
                          <h3>Dato de usuario</h3>
                          <section>
                             @include('auth.formulario')
                          </section>
                          <h3>Finanizar</h3>
                          <section>
                            <button type="submit">Guardar</button>
                          </section>
                      </div>
                   {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
      $(function () {
          //datatables




          //Datemask dd/mm/yyyy
          $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
          //Datemask2 mm/dd/yyyy
          $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
          //Money Euro
          $("[data-mask]").inputmask();

          //mascara dinero
          $('.money').mask('000000000000000.00', {reverse: true});
          //Date picker
          $('.nacimiento').datepicker({
             selectOtherMonths: true,
             changeMonth: true,
             changeYear: true,
             dateFormat: 'dd-mm-yy',
             minDate: "-60Y",
             maxDate: "-18Y",
             format: 'dd-mm-yyyy'
             });
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass: 'iradio_flat-green'
          });


          $("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
});

      });
  </script>

</body>
</html>
