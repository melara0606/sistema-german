@extends('layouts.app')

@section('migasdepan')
      <h1>
       Ordenes de compras
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/ordencompras') }}"><i class="fa fa-dashboard"></i> Ordenes de compra</a></li>
        <li class="active">Listado de ordenes</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Listado</h3>
      <div class="btn-group pull-right">
        <a href="{{ url('/ordencompras?estado=1') }}" class="btn btn-primary">Pendientes</a>
        <a href="{{ url('/ordencompras?estado=3') }}" class="btn btn-primary">Recibido</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-striped table-bordered table-hover" id="example2">
        <thead>
          <th>N°</th>
          <th>Número de orden</th>
          <th>Administrador de la orden</th>
          <th>Proveedor</th>
          <th>Proyecto o proceso</th>
          <th>Estado</th>
          <th>Accion</th>
          <?php $contador=0 ?>
        </thead>
        <tbody>
          @foreach($ordenes as $orden)
            <tr>
              @php
                $contador++;
              @endphp
              <td>{{$contador}}</td>
              <td>{{$orden->numero_orden}}</td>
              <td>{{$orden->adminorden}}</td>
              <td>{{$orden->cotizacion->proveedor->nombre}}</td>
              <td>{{$orden->cotizacion->presupuestosolicitud->presupuesto->proyecto->nombre}}</td>
              @if($estado == "")
                @if($orden->estado==1)
                  <td>Pendiente</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{url('ordencompras/'.$orden->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a class="btn btn-primary btn-xs" href="{{url('ordencompras/verificar/'.$orden->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                  </td>
                @elseif ($orden->estado==2)
                  <td>Inactivo</td>
                  <td></td>
                @else
                  <td>Finalizado</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{url('ordencompras/'.$orden->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                  </td>
                @endif
            @elseif($estado == 1)
                <td>Pendiente</td>
                <td>
                  <a class="btn btn-primary btn-xs" href="{{url('ordencompras/'.$orden->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                  <a class="btn btn-primary btn-xs" href="{{url('ordencompras/verificar/'.$orden->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                </td>
              @elseif($estado == 2)
                <td>Inactivo</td>
                <td></td>
              @elseif($estado == 3)
                <td>Finalizado</td>
                <td></td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
