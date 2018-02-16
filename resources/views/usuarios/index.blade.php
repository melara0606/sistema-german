@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
        <small>Control de Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Listado de Usuarios</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              <div class="btn-group pull-right">
                <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="{{ url('/usuarios?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/usuarios?estado=2') }}" class="btn btn-primary">Papelera</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="example2">
  				<thead>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Nombre de Usuario</th>
                  <th>Correo</th>
                  <th>Cargo</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                	@foreach($usuarios as $user)
                	<tr>
                		<td>{{ $user->id }}</td>
                		<td>{{ usuario($user->empleado_id) }}</td>
                		<td>{{ $user->username }}</td>
                		<td>{{ $user->email }}</td>
                        <td>{{ vercargo($user->cargo) }}</td>
                		<td>
                            @if($estado == 1 || $estado == "")
                                {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                <div class="btn-group">
                                  <a href="{{ url('usuarios/'.$user->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                  <a href="{{ url('/usuarios/'.$user->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                  <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$user->id.")" }}><span class="glyphicon glyphicon-trash"></span></button>
                                </div>
                              {{ Form::close()}}
                            @else
                                {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                                <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$user->id.")" }}><span class="glyphicon glyphicon-trash"></span></button>
                                {{ Form::close()}}
                            @endif
                        </td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
                <script>
                    function baja(id)
                    {
                        swal({
                            title: 'Motivo dar de baja',
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Dar de baja',
                            showLoaderOnConfirm: true,
                            preConfirm: function (text) {
                                return new Promise(function (resolve, reject) {
                                    setTimeout(function() {
                                        if (text === '') {
                                            reject('Debe ingresar el motivo')
                                        } else {
                                            resolve()
                                        }
                                    }, 2000)
                                })
                            },
                            allowOutsideClick: false
                        }).then(function (text) {
                            var dominio = window.location.host;
                            var form = $(this).parents('form');
                            $('#baja').attr('action','http://'+dominio+'/sisverapaz/public/usuarios/baja/'+id+'+'+text);
                            //document.getElmentById('baja').submit();
                            $('#baja').submit();
                            /*swal({
                                type: 'success',
                                title: 'Se dio de baja',
                                html: 'Submitted motivo: ' + text
                            })*/
                        });
                    }

                    function alta(id)
                    {
                        swal({
                            title: 'Dar de alta',
                            showCancelButton: true,
                            confirmButtonText: 'Dar de alta',
                            showLoaderOnConfirm: true,
                            allowOutsideClick: false
                        }).then(function () {
                            var dominio = window.location.host;
                            var form = $(this).parents('form');
                            $('#alta').attr('action','http://'+dominio+'/sisverapaz/public/usuarios/alta/'+id);
                            //document.getElmentById('baja').submit();
                            $('#alta').submit();
                            /*swal({
                                type: 'success',
                                title: 'Se dio de alta',
                                html: 'Submitted motivo: '
                            })*/
                        });
                    }
                </script>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
