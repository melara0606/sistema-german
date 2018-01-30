                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del proyecto</label>

                            <div class="col-md-6">

                                {!!Form::text('nombre',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Monto del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::text('monto',null,['class'=>'form-control','id'=>'monto','autofocus'])!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección donde se desarrollará</label>

                            <div class="col-md-6">
                                {!!Form::textarea('direccion',null,['class'=>'form-control','id'=>'direccion','autofocus','rows'=>3])!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label for="fecha_inicio" class="col-md-4 control-label">Fecha inicio</label>

                            <div class="col-md-6">
                                {!!Form::date('fecha_inicio',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label for="fecha_fin" class="col-md-4 control-label">Fecha finalización</label>

                            <div class="col-md-6">
                                {!!Form::date('fecha_fin',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione organización</label>
                            <div class="col-md-6">
                                <select name="organizacion_id" id="organizacion" class="form-control">
                                    <option value="">Seleccione organización...</option>
                                    @foreach($organizaciones as $organizacion)
                                      <option value="{{$organizacion->id}}">{{$organizacion->nombre_org}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnorganizacion">Agregar nueva</button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-4 control-label">Motivo del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::textarea('motivo',null,['class'=>'form-control','id'=>'nombre','autofocus', 'rows'=>3])!!}
                            </div>
                        </div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnorganizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Organización
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('organizaciones.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarorganizacion" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
