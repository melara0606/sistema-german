                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del proyecto</label>

                            <div class="col-md-6">

                                {!!Form::text('nombre',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Monto del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::text('monto',null,['class'=>'form-control','id'=>'monto','autofocus'])!!}

                                @if ($errors->has('monto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección donde se desarrollará</label>

                            <div class="col-md-6">
                                {!!Form::textarea('direccion',null,['class'=>'form-control','id'=>'direccion','autofocus','rows'=>3])!!}

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label for="fecha_inicio" class="col-md-4 control-label">Fecha inicio</label>

                            <div class="col-md-6">
                                {!!Form::date('fecha_inicio',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('fecha_inicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label for="fecha_fin" class="col-md-4 control-label">Fecha finalización</label>

                            <div class="col-md-6">
                                {!!Form::date('fecha_fin',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('fecha_fin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_fin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('encargado') ? ' has-error' : '' }}">
                            <label for="encargado" class="col-md-4 control-label">Encargado del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::text('encargado',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('encargado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-4 control-label">Motivo del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::textarea('motivo',null,['class'=>'form-control','id'=>'nombre','autofocus', 'rows'=>3])!!}

                                @if ($errors->has('motivo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('motivo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_organizacion') ? ' has-error' : '' }}">
                            <label for="id_organizacion" class="col-md-4 control-label">Organización colaboradora</label>

                            <div class="col-md-6">
                                {!!Form::text('id_organizacion',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('id_organizacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_organizacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group{{ $errors->has('beneficiario') ? ' has-error' : '' }}">
                            <label for="beneficiario" class="col-md-4 control-label">Beneficiario del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::text('beneficiario',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}

                                @if ($errors->has('beneficiario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficiario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->