@extends('layouts.app')

@section('migasdepan')
<h1>
Ver detalle del plan anual
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/paacs') }}"><i class="fa fa-dashboard"></i> Plan anual</a></li>
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
                  <a href="{{ url('/paacs/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar elementos</a>

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Año de ejecución: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$paac->anio}}</label><br>
                        </div>

                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Descripción del plan anual: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$paac->descripcion}}</label><br>
                        </div>

                        <div class="form-group{{ $errors->has('fuente_financiamiento') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Monto total: </label>
                            <label for="nombre" class="col-md-4 control-label">{{number_format($paac->total,2)}}</label><br>
                        </div>



                        <div style="overflow-x:auto;">
                          <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                              <tr>
                                <th>Obra, bien o servicio</th>
                                <th>enero</th>
                                <th>febrero</th>
                                <th>marzo</th>
                                <th>abril</th>
                                <th>mayo</th>
                                <th>junio</th>
                                <th>julio</th>
                                <th>agosto</th>
                                <th>septiembre</th>
                                <th>octubre</th>
                                <th>noviembre</th>
                                <th>diciembre</th>
                                <th>total</th>
                                <th>Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($detalles as $detalle)
                              <tr>
                                <td>{{$detalle->obra}}</td>
                                <td>$ {{number_format($detalle->enero,2)}}</td>
                                <td>$ {{number_format($detalle->febrero,2)}}</td>
                                <td>$ {{number_format($detalle->marzo,2)}}</td>
                                <td>$ {{number_format($detalle->abril,2)}}</td>
                                <td>$ {{number_format($detalle->mayo,2)}}</td>
                                <td>$ {{number_format($detalle->junio,2)}}</td>
                                <td>$ {{number_format($detalle->julio,2)}}</td>
                                <td>$ {{number_format($detalle->agosto,2)}}</td>
                                <td>$ {{number_format($detalle->septiembre,2)}}</td>
                                <td>$ {{number_format($detalle->octubre,2)}}</td>
                                <td>$ {{number_format($detalle->noviembre,2)}}</td>
                                <td>$ {{number_format($detalle->diciembre,2)}}</td>
                                <td>$ {{number_format($detalle->subtotal,2)}}</td>
                                <td>
                                  {{ Form::open(['route' => ['paacdetalles.destroy', $detalle->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                                  <a href="{{url('paacdetalles/'.$detalle->id.'/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span></a>
                                  <button class="btn btn-danger" type="button" onclick="
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
                            <tfoot>
                              <tr>
                                  <th>totales</th>
                              </tr>

                            </tfoot>
                          </table>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
