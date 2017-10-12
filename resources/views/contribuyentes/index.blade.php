@extends('layouts.app')

@section('migasdepan')
<h1>
        Proveedores
        <small>Control de proveedores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/contribuyentes') }}"><i class="fa fa-dashboard"></i> Proveedores</a></li>
        <li class="active">Listado de proveedores</li>
      </ol>
@endsection

@section('content')

<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/contribuyentes/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/contribuyentes?dato=1') }}" class="btn btn-primary">Todos</a> 
                <a href="{{ url('/contribuyentes?dato=2') }}" class="btn btn-primary">Papelera</a> 
                  {{ Form::open(['route' => 'contribuyentes.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search'])}}
        <div class="form-group">
          {{ Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Buscar'])}}
        </div>
        <button type="Buscar" class="btn btn-default">Buscar</button>
      {{ Form::close() }}
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover" id="">
  				<thead>
                  <th>ID</th>
                  <th>Nombre de contribuyente</th>
                  <th>DUI</th>
                  <th>NIT</th>
                  <th>Dirección</th>
                  <th>Sexo</th>
                  <th>Teléfono</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                	@foreach($contribuyentes as $contribuyente)
                	<tr>
                		<td>{{ $contribuyente->id }}</td>
                		<td>{{ $contribuyente->nombre }}</td>
                		<td>{{ $contribuyente->dui }}</td>
                		<td>{{ $contribuyente->nit }}</td>
                    <td>{{ $contribuyente->direccion }}</td>
                    <td>{{ $contribuyente->sexo }}</td>
                    <td>{{ $contribuyente->telefono }}</td>
                	 <td>
                      {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <a href="{{ url('proveedores/'.$contribuyente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Ver</a> |
                        <a href="{{ url('/proveedores/'.$contribuyente->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> | 
                        <button class="btn btn-danger" type="button" onclick={{ "baja(".$contribuyente->id.")" }}><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                      {{ Form::close()}} 
                     <script>
                        function baja(id)
                       {
                        swal({
                            title: 'Motivo dar de baja',
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Dar de baja',
                            showLoaderOnConfirm: true,
                            allowOutsideClick: false
                          }).then(function (text) {
                            var dominio = window.location.host;
                            var form = $(this).parents('form');
                            $('#baja').attr('action','http://'+dominio+'/contribuyentes/baja/'+id+'+'+text);
                            //document.getElmentById('baja').submit();
                            $('#baja').submit();
                            swal({
                              type: 'success',
                              title: 'Se dio de baja',
                              html: 'Submitted motivo: ' + text
                            })
                          });
                       }

                        function alta(id)
                       {
                        swal({
                            title: 'Motivo dar de baja',
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Dar de baja',
                            showLoaderOnConfirm: true,
                            allowOutsideClick: false
                          }).then(function (text) {
                            var dominio = window.location.host;
                            var form = $(this).parents('form');
                            $('#baja').attr('action','http://'+dominio+'/contribuyentes/alta/'+id+'+'+text);
                            //document.getElmentById('baja').submit();
                            $('#baja').submit();
                            swal({
                              type: 'success',
                              title: 'Se dio de alta',
                              html: 'Submitted motivo: ' + text
                            })
                          });
                       }
                     </script>

                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
              <div class="pull-right">
                 {{ $contribuyentes->links() }}
              </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        
@endsection

