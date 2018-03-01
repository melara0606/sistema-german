@extends('layouts.app')

@section('migasdepan')
<h1>
        Solicitudes
        <small>Control de solicitudes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/solicitudcotizaciones') }}"><i class="fa fa-dashboard"></i> Solicitudes</a></li>
        <li class="active">Listado de solicitudes</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/solicitudcotizaciones/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Forma de pago</th>
                  <th>Lugar de entrega</th>
                  <th>Datos del contenido</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($solicitudcotizaciones as $solicitudcotizacion)
                  <tr>
                    <td>{{ $solicitudcotizacion->id }}</td>
                    <td>{{ $solicitudcotizacion->formapago_id }}</td>
                    <td>{{ $solicitudcotizacion->lugar_entrega }}</td>
                    <td>{{ $solicitudcotizacion->datos_contenido }}</td>
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
