@php
  use App\Categoria;
@endphp
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
            
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>Proyecto</th>
                    <th>Numero de solicitud</th>
                    <th>Categoría</th>
                    <td>Acción</td>
                    <?php $correlativo=0 ?>
                  </tr>
                </thead>
                <tbody>
                   @foreach($proyecto->presupuesto as $pre)
                    <tr>
                      <?php $correlativo++ ?>
                      <td>{{$correlativo}}</td>
                      <td>{{$pre->proyecto->nombre}}</td>
                      <td>{{$pre->presupuestosolicitud->solicitudcotizacion->numero_solicitud}}</td>
                      <td>{{ Categoria::categoria_nombre($pre->presupuestosolicitud->categoria_id)}}</td>
                     <td>
                       <a href="{{ url('cotizaciones/realizarcotizacion/'.$pre->presupuestosolicitud->id) }}" class="btn btn-success btn-xs"><span class="fa fa-outdent"></span></a>
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
