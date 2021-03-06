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
        <i class="fa fa-edit"></i> <span>Servicios Municipales</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('tiposervicios') }}"><i class="fa fa-circle-o"></i> Listado de servicios municipales</a></li>
        <li><a href="{{ url('tiposervicios/create') }}"><i class="fa fa-circle-o"></i> Registro de servicio municipal</a></li>
        <li><a href="{{ url('impuestos') }}"><i class="fa fa-circle-o"></i>Aplicar Impuesto</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Rubros</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('rubros') }}"><i class="fa fa-circle-o"></i> Listado de rubros</a></li>
        <li><a href="{{ url('rubros/create') }}"><i class="fa fa-circle-o"></i> Registro de rubros</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Inmuebles</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ url('imnuebles') }}"><i class="fa fa-circle-o"></i> Listado de inmuebles</a></li>
        <li><a href="{{ url('imnuebles/create') }}"><i class="fa fa-circle-o"></i> Registro de inmuebles</a></li>
    </ul>
</li>