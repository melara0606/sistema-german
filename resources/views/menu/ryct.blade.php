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