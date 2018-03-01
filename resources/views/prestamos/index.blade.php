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
                <a href="{{ url('/prestamos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/prestamos?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/prestamos?estado=2') }}" class="btn btn-primary">Papelera</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Nombre del empleado</th>
                  <th>Banco</th>
                  <th>Número_de_cuenta</th>
                  <th>Monto</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($prestamos as $prestamo)
                  <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->empleado->nombre }}</td>
                    <td>{{ $prestamo->banco }}</td>
                    <td>{{ $prestamo->numero_de_cuenta }}</td>
                    <td>{{ number_format($prestamo->monto,2)}}</td>
                    <td>
                      @if($estado == 1 || $estado == "")
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                          <a href="{{ url('proyectos/'.$prestamo->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                          <a href="{{ url('presupuestos/crear/'.$prestamo->id) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span>Agregar presupuesto</a>
                          <a href="{{ url('proyectos/'.$prestamo->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                          <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$prestamo->id.",'prestamos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                      @else
                        {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                          <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$prestamo->id.",'prestamos')" }}><span class="glyphicon glyphicon-trash"></span></button>
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
