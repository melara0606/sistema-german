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
                <a href="{{ url('/requisiciones/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/requisiciones?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/requisiciones?estado=2') }}" class="btn btn-primary">Papelera</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Unidad</th>
                  <th>Descripción</th>
                  <th>Linea de trabajo</th>
                  <th>Fuente de financiamiento</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($requisiciones as $requisicion)
                  <tr>
                    <td>{{ $requisicion->id }}</td>
                    <td>{{ $requisicion->justificacion}}</td>
                    <td>{{ $requisicion->unidad_admin }}</td>
                    <td>{{ $requisicion->linea_trabajo }}</td>
                    <td>{{ $requisicion->fuente_financiamiento }}</td>
                    <td>
                      <a href="{{url('requisiciones/'.$requisicion->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                      <a href="{{url('requisiciones/'.$requisicion->id.'/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span></a>

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
