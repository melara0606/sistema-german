@extends('layouts.app')

@section('migasdepan')
<h1>
        Proveedores
        <small>Control de proveedores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proveedores') }}"><i class="fa fa-dashboard"></i> Proveedores</a></li>
        <li class="active">Listado de proveedores</li>
      </ol>
@endsection

@section('content')
@if(Session::has('mensaje'))
  <?php $mensaje= Session::get('mensaje');
  echo "<script>swal('exito','$mensaje','success')</script>";?>
@endif
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/proveedores/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('proveedores/eliminados') }}" class="btn btn-primary">Ver eliminados</a> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover">
  				<thead>
                  <th>ID</th>
                  <th>Nombre de Proveedor</th>
                  <th>Direción</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th colspan="3">Accion</th>
                </thead>
                <tbody>
                	@foreach($proveedores as $proveedor)
                	<tr>
                		<td>{{ $proveedor->id }}</td>
                		<td>{{ $proveedor->nombree }}</td>
                		<td>{{ $proveedor->direccion }}</td>
                		<td>{{ $proveedor->emaile }}</td>
                    <td>{{ $proveedor->telefonoe }}</td>
                		<td colspan="3">
                      {{ Form::open(['route' => ['proveedores.destroy', $proveedor->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                        <a href="{{ url('proveedores/'.$proveedor->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Ver</a> |
                        <a href="{{ url('/proveedores/'.$proveedor->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> | 
                        <button class="btn btn-danger" type="button" onclick="
                        return swal({
                          title: 'ELiminar proveedor',
                          text: '¿Está seguro de eliminar proveedor?',
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonText: 'Si, Eliminar',
                          cancelButtonText: 'No, Mantener',
                          confirmButtonClass: 'btn btn-danger',
                          cancelButtonClass: 'btn btn-default',
                          buttonsStyling: false
                        }).then(function(){
                          submit();
                          swal('Hecho', 'El registro a sido eliminado','success')
                        }, function(dismiss){
                          if(dismiss == 'cancel'){
                            swal('Cancelado', 'El registro se mantiene','info')
                          }
                        })";><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                      {{ Form::close()}} 
                     

                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
              <div class="pull-right">
                 {{ $proveedores->links() }}
              </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
