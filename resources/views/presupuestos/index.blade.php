@extends('layouts.app')

@section('migasdepan')
<h1>
        Presupuestos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Presupuestos</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              <div class="btn-group pull-right">
                <a href="{{ url('/presupuestos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/presupuestos?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/presupuestos?estado=2') }}" class="btn btn-primary">Papelera</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>N°</th>
                  <th>Año</th>
                  <th>Proyecto</th>
                  <th>Monto</th>
                  <th>Accion</th>
                  <?php $contador=0; ?>
                </thead>
                <tbody>
                  @foreach($presupuestos as $presupuesto)
                    <tr>
                      <?php $contador++; ?>
                      <td>{{$contador}}</td>
                      <td>{{$presupuesto->created_at->format('Y')}}</td>
                      <td>{{$presupuesto->proyecto->nombre}}</td>
                      <td>${{number_format($presupuesto->total,2)}}</td>
                      <td><a href="{{url('presupuestos/'.$presupuesto->id)}}" class="btn btn-primary btn-sm">Ver</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>
@endsection
