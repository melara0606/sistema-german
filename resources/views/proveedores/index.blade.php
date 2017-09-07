@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
        <small>Control de proveedores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proveedores') }}"><i class="fa fa-dashboard"></i> Proveedores</a></li>
        <li class="active">Listado de proveedores</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/proveedores/create') }}" class="btn btn-primary">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
  				<thead>
                  <th>ID</th>
                  <th>Nombre de Proveedor</th>
                  <th>Direción</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                	@foreach($proveedores as $proveedor)
                	<tr>
                		<td>{{ $proveedor->idproveedores }}</td>
                		<td>{{ $proveedor->nombree }}</td>
                		<td>{{ $proveedor->direccion }}</td>
                		<td>{{ $proveedor->emaile }}</td>
                    <td>{{ $proveedor->telefonoe }}</td>
                		<td>
                			<a href="{{ url('/proveedores/edit'.$proveedor->idproveedor) }}" class="btn btn-warning">Editar</a> |
                			<a class="btn btn-primary" href ="{{ url('proveedores/delete', $proveedor->idproveedor) }}" role="button" >Eliminar </a>
                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
                 {{ $proveedores->links() }} 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
