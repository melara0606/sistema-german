                       <div class="form-group{{ $errors->has('empleado_id') ? ' has-error' : '' }}">
                          <label for="" class="col-md-4 control-label">Empleado</label>
                            <div class="col-md-6">
                                <select name="empleado_id" id="empleado" class="form-control">
                                    <option value="">Seleccione un empleado</option>
                                    @foreach($empleados as $empleado)
                                      <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('empleado_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empleado_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('tipocontrato_id') ? ' has-error' : '' }}">

                          <label for="" class="col-md-4 control-label">Contrato</label>
                            <div class="col-md-6">
                                <select name="tipocontrato_id" id="tipocontrato" class="form-control">
                                    <option value="">Seleccione un contrato...</option>
                                    @foreach($tipocontratos as $tipocontrato)
                                      <option value="{{$tipocontrato->id}}">{{$tipocontrato->nombre}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipocontrato_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipocontrato_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Cargo</label>
                            <div class="col-md-6">
                                <select name="cargo_id" id="cargo" class="form-control">
                                    <option value="">Seleccione un cargo</option>
                                    @foreach($cargos as $cargo)
                                      <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>
                                    @endforeach
                                </select>
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