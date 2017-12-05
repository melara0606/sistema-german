                        <div class="form-group{{ $errors->has('nombre_contratado') ? ' has-error' : '' }}">
                            <label for="nombre_contratado" class="col-md-4 control-label">Nombre del contratado</label>

                            <div class="col-md-6">

                                {!!Form::text('nombre_contratado',null,['class'=>'form-control','id'=>'nombre_contratado','autofocus'])!!}

                                @if ($errors->has('nombre_contratado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre_contratado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                         <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione un contrato</label>
                            <div class="col-md-6">
                                <select name="tipocontrato" id="tipocontrato" class="form-control">
                                    <option value="">Seleccione un contrato...</option>
                                    @foreach($tipocontratos as $tipocontrato)
                                      <option value="{{$tipocontrato->id}}">{{$tipocontrato->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nombrec') ? ' has-error' : '' }}">
                            <label for="nombrec" class="col-md-4 control-label">Nombre del contratante</label>

                            <div class="col-md-6">
                                {!!Form::textarea('nombrec',null,['class'=>'form-control','id'=>'nombrec','autofocus','rows'=>3])!!}

                                @if ($errors->has('nombrec'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombrec') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-4 control-label">Motivo de contratación</label>

                            <div class="col-md-6">

                                {!!Form::text('motivo',null,['class'=>'form-control','id'=>'motivo','autofocus'])!!}

                                @if ($errors->has('motivo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('motivo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>