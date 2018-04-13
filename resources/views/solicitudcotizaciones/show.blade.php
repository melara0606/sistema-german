@extends('layouts.app')

@section('migasdepan')
<h1>
Ver detalle de la solicitud
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/solicitudcotizaciones') }}"><i class="fa fa-align-right"></i> Cotizaciones</a></li>
        <li class="active">Detalle</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Solicitud de cotización </div>
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <th>Nombre del proyecto o proceso</th>
                      <th>{{$solicitud->presupuesto->proyecto->nombre}}</th>
                    </tr>
                    <tr>
                      <th>Forma de pago</th>
                      <th>{{$solicitud->formapago->nombre}}</th>
                    </tr>
                    <tr>
                      <th>Unidad solicitante</th>
                      <th>{{$solicitud->unidad}}</th>
                    </tr>
                    <tr>
                      <th>Encargado</th>
                      <th>{{$solicitud->encargado}}</th>
                    </tr>
                    <tr>
                      <th>Valor en dólares</th>
                      <th>${{number_format($solicitud->presupuesto->proyecto->monto,2)}}</th>
                    </tr>
                    <tr>
                      <th>Valor en letras</th>
                      <th>{{numaletras($solicitud->presupuesto->proyecto->monto)}}</th>
                    </tr>
                  </table>
                        <div class="table-responsive">
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
                                <td>{{$detalle->catalogo->categoria->item}}</td>
                                <td>{{strtoupper($detalle->catalogo->nombre)}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{strtoupper($detalle->catalogo->unidad_medida)}}</td>
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
