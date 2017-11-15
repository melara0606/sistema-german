                        <div class="form-group{{ $errors->has('cotizacion_id') ? ' has-error' : '' }}">
                            <label for="cotizacion_id" class="col-md-4 control-label">Cotización</label>

                            <div class="col-md-6">

                                

                                @if ($errors->has('cotizacion_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cotizacion_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                         <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <label for="unidad_id" class="col-md-4 control-label">Unidad de medida</label>

                            <div class="col-md-6">
                                <!--{!!Form::select('unidad_id',null,['class'=>'form-control','id'=>'unidad_id','autofocus'])!!}-->

                                @if ($errors->has('unidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                {!!Form::text('cantidad',null,['class'=>'form-control','id'=>'cantidad','autofocus'])!!}

                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('precio_unitario') ? ' has-error' : '' }}">
                            <label for="precio_unitario" class="col-md-4 control-label">Precio unitario</label>

                            <div class="col-md-6">
                                {!!Form::text('precio_unitario',null,['class'=>'form-control','id'=>'precio_unitario','autofocus'])!!}

                                @if ($errors->has('precio_unitario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('precio_unitario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
