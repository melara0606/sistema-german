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
                                  <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$user->id.",'usuarios')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                </div>
                              {{ Form::close()}}
                            @else
                                {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                                <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$user->id.",'usuarios')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                {{ Form::close()}}
                            @endif
                        </td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
