@extends('layouts.app')

@section('migasdepan')
<h1>
        Proyectos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Listado de Proyectos</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              <div class="btn-group pull-right">
                <a href="{{ url('/proyectos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/proyectos?estado=1') }}" class="btn btn-primary">Aprobados</a>
                <a href="{{ url('/proyectos?estado=2') }}" class="btn btn-primary">Inactivos</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Nombre Proyecto</th>
                  <th>Monto</th>
                  <th>Dirección</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Estado</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($proyectos as $proyecto)
                  <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>${{ number_format($proyecto->monto,2) }}</td>
                    <td>{{ $proyecto->direccion }}</td>
                    <td>{{ $proyecto->fecha_inicio->format('d-m-Y') }}</td>
                    <td>{{ $proyecto->fecha_fin->format('d-m-Y') }}</td>
                    <td><span class="label-primary">{{proyecto_estado($proyecto->estado)}}</span></td>
                    <td>
                      @if($estado == 1 || $estado == "")
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <div class="btn-group">
                           <a href="{{ url('proyectos/'.$proyecto->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                          <a href="{{ url('proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                          <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$proyecto->id.",'proyectos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        </div>   
                        {{ Form::close()}}
                      @else
                        {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                          <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$proyecto->id.",'proyectos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
               
              <div class="pull-right">

              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
@endsection
