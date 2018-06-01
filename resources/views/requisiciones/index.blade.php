@extends('layouts.app')

@section('migasdepan')
<h1>
        Requisiciones
        <small>Control de requisiciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Listado de requisiciones</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              <div class="btn-group pull-right">
                <a href="{{ url('/requisiciones/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/requisiciones?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/requisiciones?estado=2') }}" class="btn btn-primary">Papelera</a>
              </div>
          </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <th>N°</th>
                  <th>Actividad</th>
                  <th>Unidad</th>
                  <th>Justificación</th>
                  <th>Linea de trabajo</th>
                  <th>Fuente de financiamiento</th>
                  <th>Accion</th>
                  <?php $contador=0;?>
                </thead>
                <tbody>
                  @foreach($requisiciones as $requisicion)
                    <?php $contador++;?>
                  <tr>
                    <td>{{ $contador }}</td>
                    <td>{{$requisicion->actividad}}</td>
                    <td>{{ $requisicion->unidad->nombre_unidad}}</td>
                    <td>{{ $requisicion->justificacion }}</td>
                    <td>{{ $requisicion->linea_trabajo }}</td>
                    <td>{{ $requisicion->fuente_financiamiento }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="{{url('requisiciones/'.$requisicion->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="{{url('requisiciones/'.$requisicion->id.'/edit')}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </div>
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
</div>
@endsection
