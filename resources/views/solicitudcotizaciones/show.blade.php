@extends('layouts.app')

@section('migasdepan')
<h1>
Ver detalle del plan anual
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/presupuestos') }}"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
        <li class="active">Detalle de la cotización</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Solicitud de cotización </div>
                <div class="panel-body">
              
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre del proyecto: </label>
                            <label for="nombre" class="col-md-8 control-label">{{$solicitud->proyecto->nombre}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="monto" class="col-md-4 control-label">Forma de pago: </label>
                            <label for="nombre" class="col-md-8 control-label">{{$solicitud->formapago->nombre}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="monto" class="col-md-4 control-label">Unidad solicitante: </label>
                            <label for="nombre" class="col-md-8 control-label">{{$solicitud->unidad}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="monto" class="col-md-4 control-label">Encargado: </label>
                            <label for="nombre" class="col-md-8 control-label">{{$solicitud->encargado}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="monto" class="col-md-4 control-label">Valor en dolares: </label>
                            <label for="nombre" class="col-md-8 control-label">{{$solicitud->proyecto->monto}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="monto" class="col-md-4 control-label">Valor en dolares: </label>
                            <label for="nombre" class="col-md-8 control-label">{{numaletras($solicitud->proyecto->monto)}}</label><br>
                        </div>

                        <div style="overflow-x:auto;">
                          <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                              <tr>
                                <th>ÍTEM</th>
                                <th>DESCRIPCIÓN</th>
                                <th>CANTIDAD</th>
                                <th>UNIDAD DE MEDIDA</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($presupuesto->presupuestodetalle as $detalle)
                              <tr>
                                <td>{{$detalle->item}}</td>
                                <td>{{strtoupper($detalle->material)}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{strtoupper($detalle->unidad)}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
