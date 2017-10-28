<ul class="sidebar-menu">
        <li class="header">Menú Principal</li>
        @if(Auth::user()->cargo == 1)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Bitacora</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/bitacoras') }}"><i class="fa fa-circle-o"></i> Ver Bitácora</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/usuarios/create') }}"><i class="fa fa-circle-o"></i> Registrar Usuarios</a></li>
            <li><a href="{{ url('/usuarios') }}"><i class="fa fa-circle-o"></i> Listado de Usuarios</a></li>
          </ul>
        </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Proveedores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{cantprov()}}</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/proveedores') }}"><i class="fa fa-circle-o"></i> Listado de Proveedores</a></li>
            <li><a href="{{ url('/proveedores/create') }}"><i class="fa fa-circle-o"></i> Registrar proveedor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Ofertantes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Listado de Ofertantes</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Registro de Ofertantes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Contratos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('contratos') }}"><i class="fa fa-circle-o"></i> Listado de Contratos</a></li>
            <li><a href="{{ url('contratos/create') }}"><i class="fa fa-circle-o"></i> Registro del Contrato</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Contribuyentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('contribuyentes?dato=1') }}"><i class="fa fa-circle-o"></i> Listado de Contribuyentes</a></li>
            <li><a href="{{ url('contribuyentes/create') }}"><i class="fa fa-circle-o"></i> Registro de Contribuyentes</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tipos de contratos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('tipocontratos?dato=1') }}"><i class="fa fa-circle-o"></i> Tipos de contratos</a></li>
            <li><a href="{{ url('tipocontratos/create') }}"><i class="fa fa-circle-o"></i> Registro de Tipo contratos</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('proyectos')}}"><i class="fa fa-circle-o"></i> Listado de Proyectos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentación</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>