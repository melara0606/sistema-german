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
                <a href="{{ url('proveedores/eliminados') }}" class="btn btn-warning">Ver eliminados</a> 
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
                		<td>{{ $proveedor->id }}</td>
                		<td>{{ $proveedor->nombree }}</td>
                		<td>{{ $proveedor->direccion }}</td>
                		<td>{{ $proveedor->emaile }}</td>
                    <td>{{ $proveedor->telefonoe }}</td>
                		<td>
                    <a href="{{ url('proveedores/'.$proveedor->id) }}" class="btn btn-warning">Ver</a> |
                			<a href="{{ url('/proveedores/'.$proveedor->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                      {{ Form::open(['route' => ['proveedores.destroy', $proveedor->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                      {{ Form::close()}}
                      {{-- {!! link_to_route('proveedores.destroy', 'ELiminar', [$proveedor->id]) !!}
                			<a class="btn btn-primary" href ="{{ route('proveedores.destroy', $proveedor->id) }}" role="button" >Eliminar </a> --}}
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
