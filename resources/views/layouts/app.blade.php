<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SisVerapaz</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.6 -->
  {!!Html::style('bootstrap/css/bootstrap.min.css')!!}
  {!!Html::style('css/app.css')!!}
    <!-- Font Awesome -->
  {!!Html::style('css/font-awesome.css')!!}
  
  <!-- Ionicons -->
  {!!Html::style('css/ionicons.min.css')!!}
  <!-- Theme style -->
  
  {!! Html::style('css/font-awesome.min.css')!!}
  {!! Html::style('css/AdminLTE.min.css') !!}
  {!! Html::style('css/wizard.css') !!}
  {!! Html::style('css/skins/_all-skins.min.css')!!}
  {!! Html::style('plugins/iCheck/flat/blue.css')!!}
  {!! Html::style('plugins/morris/morris.css')!!}
  {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css')!!}
  {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')!!}
  {!! Html::style('css/bootstrap-toggle.min.css')!!}
  {!! Html::style('css/buttons.bootstrap.min.css') !!}
  {!! Html::style('css/sweetalert2.min.css') !!}
  {!! Html::style('plugins/daterangepicker/daterangepicker.css') !!}
  {!! Html::style('plugins/datepicker/datepicker3.css') !!}
  {!! Html::style('plugins/iCheck/all.css') !!}
  {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
  {!! Html::script('plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
{!! Html::script('js/pdfmake.min.js') !!}
{!! Html::script('js/vfs_fonts.js') !!}
{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}




  <script>
      $(document).ready(function () {
          //datatables
          var tabla = $('#example2').DataTable({
              language: {
                  processing: "Búsqueda en curso...",
                  search: "Búscar:",
                  lengthMenu: "Mostrar _MENU_ Elementos",
                  info: "Mostrando _START_ de _END_ de un total de _TOTAL_ Elementos",
                  infoEmpty: "Visializando 0 de 0 de un total de 0 elementos",
                  infoFiltered: "(Filtrado de _MAX_ elementos en total)",
                  infoPostFix: "",
                  loadingRecords: "Carga de datos en proceso..",
                  zeroRecords: "Elementos no encontrado",
                  emptyTable: "La tabla no contiene datos",
                  paginate: {
                      first: "Primero",
                      previous: "Anterior",
                      next: "siguiente",
                      last: "Último"
                  },
              },
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false
          });
          
} );
          //var tablaTools = new $.fn.dataTable.TableTools(tabla);

  </script>



  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
  
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>VZ</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SisVerapaz</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth()->user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ vercargo(Auth::user()->cargo) }}
                  <small>Miembro {{Auth::user()->created_at->diffForHumans()}} </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
            
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/home/perfil') }}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
     <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('menu.menu')
    </section>
    <!-- /.sidebar -->
  </aside>
 <!-- aqui comienza el contenido -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @yield('migasdepan')
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissable" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get('mensaje') }}  
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get('error') }}  
        </div>
    @endif
      @yield('content')
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Universidad de El Salvador. FMP</a>.</strong> All rights
    reserved.
  </footer>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

{!! Html::script('bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('js/sweetalert2.min.js') !!}
{!! Html::script('plugins/morris/morris.min.js') !!}
{!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
{!! Html::script('plugins/knob/jquery.knob.js') !!}
{!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
{!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('plugins/fastclick/fastclick.js') !!}
{!! Html::script('js/app.min.js') !!}
{!! Html::script('js/demo.js') !!}
{!! Html::script('plugins/select2/select2.full.min.js') !!}
{!! Html::script('plugins/input-mask/jquery.inputmask.js') !!}
{!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}
{!! Html::script('plugins/colorpicker/bootstrap-colorpicker.min.js') !!}




<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{!! Html::script('js/tablas.js') !!}
  <script>
      $(function () {
          //datatables

          //Initialize Select2 Elements
          $(".select2").select2();

          //Datemask dd/mm/yyyy
          $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
          //Datemask2 mm/dd/yyyy
          $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
          //Money Euro
          $("[data-mask]").inputmask();


          //Date picker
          $('#datepicker').datepicker({
              autoclose: true
          });
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass: 'iradio_flat-green'
          });
           //Colorpicker
          $(".my-colorpicker1").colorpicker();
          //color picker with addon
          $(".my-colorpicker2").colorpicker();

      });
  </script>

  <script>
$('div.alert').not('.alert-important').delay(7000).fadeOut(350);
</script>
</body>
</html>
