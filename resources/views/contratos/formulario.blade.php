                       <div class="form-group{{ $errors->has('empleado_id') ? ' has-error' : '' }}">
                          <label for="" class="col-md-4 control-label">Seleccione un empleado</label>
                            <div class="col-md-6">
                                <select name="empleado_id" id="empleado" class="form-control">  
                                </select>
                                @if ($errors->has('empleado_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empleado_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default" type="button" id="empleado">Agregar nuevo</button>
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('tipocontrato_id') ? ' has-error' : '' }}">

                          <label for="" class="col-md-4 control-label">Seleccione un contrato</label>
                            <div class="col-md-6">
                                <select name="tipocontrato_id" id="tipocontrato" class="form-control">
                                </select>
                                @if ($errors->has('tipocontrato_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipocontrato_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-2">
                                <button class="btn btn-default" type="button" id="tipocontrato">Agregar nuevo</button>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione un cargo</label>
                            <div class="col-md-6">
                                <select name="cargo_id" id="cargo" class="form-control">
                                </select>
                            </div>
                             <div class="col-md-2">
                                <button class="btn btn-default" type="button" id="cargo">Agregar nuevo</button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salario') ? ' has-error' : '' }}">
                            <label for="salario" class="col-md-4 control-label">Salario</label>

                            <div class="col-md-6">
                                {{ Form::text('salario', null,['class' => 'form-control']) }}
                                @if ($errors->has('salario'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('salario') }}</strong>
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