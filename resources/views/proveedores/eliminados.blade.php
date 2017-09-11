@extends('layouts.app')

@section('migasdepan')
<h1>
        Proveedores
        <small>Control de proveedores eliminados</small>
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
                		<td>{{ $proveedor->id }}</td>
                		<td>{{ $proveedor->nombree }}</td>
                		<td>{{ $proveedor->direccion }}</td>
                		<td>{{ $proveedor->emaile }}</td>
                    <td>{{ $proveedor->telefonoe }}</td>
                		<td>
                    {{ Form::open(['route' => ['proveedores.restore', $proveedor->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])
                    }}
                        <button class="btn btn-danger" type="submit">Restaurar</button>
                      {{ Form::close()}} 
                     {{--  <a href="{{ route('proveedores.restore', [$proveedor->id]) }}">aqui</a> --}}
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
