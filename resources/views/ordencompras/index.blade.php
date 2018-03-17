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
        <!---->
        <a href="{{ url('/ordencompras/create') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-plus-sign"></span> Agregar
        </a>
        <a href="{{ url('/ordencompras?estado=1') }}" class="btn btn-primary">Activos</a>
        <a href="{{ url('/ordencompras?estado=2') }}" class="btn btn-primary">Papelera</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-striped table-bordered table-hover" id="example2">
        <thead>
          <th>Id</th>
          <th>Número de orden</th>
          <th>Proveedor</th>
          <th>Proyecto</th>
          <th>Accion</th>
        </thead>
        <tbody>
          @foreach($ordenes as $orden)
            <tr>
              <td>{{$orden->id}}</td>
              <td>{{$orden->numero_orden}}</td>
              <td>{{$orden->cotizacion->proveedor->nombre}}</td>
              <td>{{$orden->cotizacion->proyecto->nombre}}</td>
              <td></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
