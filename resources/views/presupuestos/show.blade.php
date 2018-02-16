@extends('layouts.app')

@section('migasdepan')
<h1>
Ver detalle del plan anual
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/presupuestos') }}"><i class="fa fa-dashboard"></i> Presupuestos</a></li>
        <li class="active">Detalle del presupuesto</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Presupuesto </div>
                <div class="panel-body">
                  <a href="{{ url('/presupuestos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar elementos</a>
                <br>
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Año de ejecución: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$presupuesto->created_at->format('Y')}}</label><br>
                        </div>

                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Descripción del plan anual: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$presupuesto->proyecto->nombre}}</label><br>
                        </div>

                        <div class="form-group{{ $errors->has('fuente_financiamiento') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Monto total: </label>
                            <label for="nombre" class="col-md-4 control-label">${{number_format($presupuesto->total,2)}}</label><br>
                        </div>



                        <div style="overflow-x:auto;">
                          <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                              <tr>
                                <th>Item</th>
                                <th>Categoría</th>
                                <th>Descripción</th>
                                <th>Unidad de medida</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($detalles as $detalle)
                              <tr>
                                <td>{{$detalle->item}}</td>
                                <td>{{$detalle->categoria}}</td>
                                <td>{{$detalle->material}}</td>
                                <td>{{$detalle->unidad}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>${{number_format($detalle->preciou,2)}}</td>
                                <td>${{number_format($detalle->cantidad*$detalle->preciou,2)}}</td>
                                <td>
                                  {{ Form::open(['route' => ['paacdetalles.destroy', $detalle->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                                  <a href="{{url('paacdetalles/'.$detalle->id.'/edit')}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                  <button class="btn btn-danger btn-xs" type="button" onclick="
                                  return swal({
                                    title: 'Eliminar obra',
                                    text: '¿Está seguro de eliminar la obra?',
                                    type: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'Si, Eliminar',
                                    cancelButtonText: 'No, Mantener',
                                    confirmButtonClass: 'btn btn-danger',
                                    cancelButtonClass: 'btn btn-default',
                                    buttonsStyling: false
                                  }).then(function(){
                                    submit();
                                  }, function(dismiss){
                                    if(dismiss == 'cancel'){
                                      swal('Cancelado', 'El registro se mantiene','info')
                                    }
                                  })" ; ><span class="glyphicon glyphicon-trash"></span></button>
                                  {{ Form::close()}}
                                </td>
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
