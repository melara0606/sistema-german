@extends('layouts.app')

@section('migasdepan')
<h1>

        <small>Ver cotizacion <b>{{ $cotizacion->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/cotizaciones') }}"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del Cotización </div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
                            <label for="proyecto_id" class="col-md-4 control-label">Nombre del Proyecto: </label>
                            <label for="proyecto_id" class="col-md-8 control-label">{{$cotizacion->presupuesto->proyecto->nombre}}</label><br>

                        </div>

                         <div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
                            <label for="proveedor_id" class="col-md-4 control-label">Proveedor: </label>
                            <label for="proyecto_id" class="col-md-4 control-label">{{$cotizacion->proveedor->nombre}}</label><br>

                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Forma de pago: </label>
                            <label for="proyecto_id" class="col-md-4 control-label">{{$cotizacion->descripcion}}</label><br>

                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Validez de la oferta: </label>
                            <label for="proyecto_id" class="col-md-4 control-label"></label><br>

                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Plazo de entrega: </label>
                            <label for="proyecto_id" class="col-md-4 control-label"></label><br>

                        </div>

                        <div style="overflow-x:auto;">
                          <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                              <tr>
                                <th width="40%">MATERIAL</th>
                                <th width="10%">MARCA</th>
                                <th width="15%">CANTIDAD</th>
                                <th width="20%">UNIDAD DE MEDIDA</th>
                                <th width="15%">PRECIO</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($cotizacion->detallecotizacion as $detalle)
                              <tr>
                                <td>{{strtoupper($detalle->descripcion)}}</td>
                                <td>{{$detalle->marca}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{strtoupper($detalle->unidad_medida)}}</td>
                                <td>${{number_format($detalle->precio_unitario,2)}}</td>
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
