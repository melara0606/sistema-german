<?php use App\Cargo; ?>
@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
        <small>Control de Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/usuarios') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Listado de Usuarios</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/usuarios/registrar') }}" class="btn btn-primary">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="datatable">
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
                		<td>{{ $user->name }}</td>
                		<td>{{ $user->username }}</td>
                		<td>{{ $user->email }}</td>
                    <?php 
                     $nombre= Cargo::vercargo($user->cargo);
                    ?>
                    <td>{{ $nombre }}</td>
                		<td>
                			<a href="{{ url('/usuarios/'.$user->id) }}" class="btn btn-warning">Editar</a> |
                			<a class="btn btn-primary" href ="{{ url('usuarios/borrar', $user->id) }}" role="button" >Eliminar </a>
                    </td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
                {{ $usuarios->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection

