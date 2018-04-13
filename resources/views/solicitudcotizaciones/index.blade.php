@extends('layouts.app')

@section('migasdepan')
<h1>
        Listado de solicitudes realizadas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/solicitudcotizaciones') }}"><i class="fa fa-align-right"></i> Solicitudes</a></li>
        <li class="active">Listado de solicitudes</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <div class="btn-group pull-right">
                <a href="{{ url('solicitudcotizaciones/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="{{ url('solicitudcotizaciones?estado=1')}}" class="btn btn-primary">Pendientes</a>
                <a href="{{ url('solicitudcotizaciones?estado=3')}}" class="btn btn-primary">Finalizado</a>
                <a href="{{ url('solicitudcotizaciones?estado=2')}}" class="btn btn-primary">Inactivados</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <th>N°</th>
                  <th>Proyecto o proceso</th>
                  <th>Forma de pago</th>
                  <th>Lugar de entrega</th>
                  <th>Datos del contenido</th>
                  <th>Estado</th>
                  <th>Accion</th>
                  <?php $contador=0; ?>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  <tr>
                    <?php $contador++; ?>
                    <td>{{ $contador }}</td>
                    <td>{{ $solicitud->presupuesto->proyecto->nombre}}</td>
                    <td>{{ $solicitud->formapago->nombre }}</td>
                    <td>{{ $solicitud->lugar_entrega }}</td>
                    <td>{{ $solicitud->datos_contenido }}</td>
                      @if($estado == "" || $estado == 1 )
                        <td>
                        <label for="" class="label-warning">Pendiente</label>
                      </td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ url('solicitudcotizaciones/'.$solicitud->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                          <a href="{{url('solicitudcotizaciones/'.$solicitud->id.'/edit')}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <a href="{{ url('cotizaciones/create') }}" class="btn btn-success btn-xs"><span class="fa fa-outdent"></span></a>
                        </div>
                      </td>
                      @elseif ($estado == 2)
                        <td><label for="" class="label-danger">Inactiva</label></td>
                        <td>
                          <a href="{{ url('solicitudcotizaciones/'.$solicitud->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                      @elseif ($estado == 3)
                      <td><label for="" class="label-success">Finalizada</label></td>
                      <td>
                        <a href="{{ url('solicitudcotizaciones/'.$solicitud->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                      </td>
                      @endif
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
