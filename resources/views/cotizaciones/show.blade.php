@extends('layouts.app')

@section('migasdepan')
<h1>
        
        <small>Ver cotizacion <b>{{ $cotizacion->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/cotizaciones') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del Cotizacion </div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
                            <label for="proyecto_id" class="col-md-4 control-label">Nombre del Proyecto: </label>
                            <label for="proyecto_id" class="col-md-4 control-label">{{$cotizacion->proyecto->nombre}}</label><br>
                            
                        </div>

                         <div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
                            <label for="proveedor_id" class="col-md-4 control-label">Proveedor: </label>
                            <label for="proyecto_id" class="col-md-4 control-label">{{$cotizacion->proveedor->nombre}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción: </label>
                            <label for="proyecto_id" class="col-md-4 control-label">{{$cotizacion->descripcion}}</label><br>
                            
                        </div>

                        <div style="overflow-x:auto;">
                          <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                              <tr>
                                <th width="50%">MATERIAL</th>
                                <th width="15%">CANTIDAD</th>
                                <th width="20%">UNIDAD DE MEDIDA</th>
                                <th width="15%">PRECIO</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($cotizacion->detallecotizacion as $detalle)
                              <tr>
                                <td>{{strtoupper($detalle->material)}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{strtoupper($detalle->unidad_medida)}}</td>
                                <td>${{number_format($detalle->precio_unitario,2)}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                      {{ Form::open(['route' => ['cotizaciones.destroy', $cotizacion->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                      <a href="{{ url('/cotizaciones/'.$cotizacion->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> |
                        <button class="btn btn-danger" type="button" onclick="
                        return swal({
                          title: 'Eliminar cotizacion',
                          text: '¿Está seguro de eliminar cotizacion?',
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonText: 'Si, Eliminar',
                          cancelButtonText: 'No, Mantener',
                          confirmButtonClass: 'btn btn-danger',
                          cancelButtonClass: 'btn btn-default',
                          buttonsStyling: false
                        }).then(function(){
                          submit();
                          swal('Hecho', 'El registro a sido eliminado','success')
                        }, function(dismiss){
                          if(dismiss == 'cancel'){
                            swal('Cancelado', 'El registro se mantiene','info')
                          }
                        })";><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                      {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection