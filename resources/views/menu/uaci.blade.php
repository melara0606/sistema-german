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