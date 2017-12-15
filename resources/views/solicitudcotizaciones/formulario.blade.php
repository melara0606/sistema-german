                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione una forma de pago</label>
                            <div class="col-md-6">
                                <select name="formapago" id="formapago" class="form-control">
                                    <option value="">Seleccione una forma de pago...</option>
                                    @foreach($formapagos as $formapago)
                                      <option value="{{$formapago->id}}">{{$formapago->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lugar_entrega') ? ' has-error' : '' }}">
                            <label for="lugar_entrega" class="col-md-4 control-label">Lugar de entrega</label>

                            <div class="col-md-6">
                                {!!Form::text('lugar_entrega',null,['class'=>'form-control','id'=>'lugar_entrega','autofocus'])!!}

                                @if ($errors->has('lugar_entrega'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lugar_entrega') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('datos_contenido') ? ' has-error' : '' }}">
                            <label for="datos_contenido" class="col-md-4 control-label">Datos del contenido</label>

                            <div class="col-md-6">
                                {!!Form::text('datos_contenido',null,['class'=>'form-control','id'=>'datos_contenido','autofocus'])!!}

                                @if ($errors->has('datos_contenido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datos_contenido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
