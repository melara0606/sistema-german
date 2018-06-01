@extends('layouts.app')

@section('migasdepan')
    <h1>
        Ordenes de compra
    </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/ordencompras') }}"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
        <li class="active">Registro</li>
      </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Orden de compra</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'OrdencompraController@guardar','class' => 'form-horizontal']) }}
                    @include('errors.validacion')

                    <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Nombre de la actividad</label>

                        <div class="col-md-6">
                            {!!Form::textarea('actividad',null,['rows'=>3,'class' => 'form-control','placeholder' => 'Digite la actividad','autofocus'])!!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('proveedor') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Nombre del proveedor</label>

                        <div class="col-md-6">
                          <select class="chosen-select-width" name="">
                            <option value="">Seleccione un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                              <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Condiciones de pago</label>

                        <div class="col-md-6">
                          <select class="chosen-select-width" name="">
                            <option value="">Seleccione una forma de pago</option>
                            @foreach($formapagos as $formapago)
                              <option value="{{$formapago->id}}">{{$formapago->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('adminorden') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Nombre del administrador de la orden</label>
                        <div class="col-md-6">
                            {!!Form::text('adminorden',null,['class'=>'form-control','id'=>'adminorden','placeholder'=>'Digite el nombre del administrador de la orden'])!!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Direccion de entrega</label>

                        <div class="col-md-6">
                            {!!Form::textarea('direccion_entrega',null,['rows' => 3,'class'=>'form-control','id'=>'direccion','placeholder'=>'Digite la direccion de entrega de los materiales'])!!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Periodo de entrega</label>

                        <div class="col-md-2">
                            {!!Form::text('fecha_inicio',null,['class'=>'form-control','id'=>'fecha_inicio','placeholder'=>'Fecha de inicio'])!!}
                        </div>
                        <div class="col-md-1"><label for="">al</label></div>
                        <div class="col-md-2">
                            {!!Form::text('fecha_fin',null,['class'=>'form-control','id'=>'fecha_fin','placeholder'=>'Fecha de finalizacion'])!!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Observaciones</label>

                        <div class="col-md-6">
                            {!!Form::textarea('observaciones',null,['rows'=>2,'class'=>'form-control','placeholder'=>'Digite las observaciones (si las hay)'])!!}
                        </div>
                    </div>


                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th width="40%">Descripcion</th>
                                    <th width="10%">Marca</th>
                                    <th width="10%">Unidad de medida</th>
                                    <th width="10%">Cantidad</th>
                                    <th width="10%">Precio Unitario</th>
                                    <th width="15%">Subtotal</th>
                                </tr>
                                @php
                                  $total=0.0;
                                  $correlativo=0;
                                @endphp
                            </thead>
                            <tbody id="cuerpo">

                            </tbody>
                            <tfoot id="pie">
                                <tr>
                                  <th> </th>
                                  <th colspan="5"></th>
                                  <th>$</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span>    Registrar
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('js/ordencompra.js')!!}
@endsection
