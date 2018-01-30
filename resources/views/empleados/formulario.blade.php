                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                {{ Form::text('nombre', null,['id'=>'nom_empleado','class' => 'form-control']) }}

                                @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('dui') ? ' has-error' : '' }}">
                            <label for="dui" class="col-md-4 control-label">Número de DUI</label>

                            <div class="col-md-6">
                                {{ Form::text('dui', null,['id' => 'dui_empleado','class' => 'form-control','data-inputmask' => '"mask": "99999999-9"','data-mask']) }}

                                @if ($errors->has('dui'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dui') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                            <label for="nit" class="col-md-4 control-label">Número de NIT</label>

                            <div class="col-md-6">
                                {{ Form::text('nit', null,['id'=>'nit_empleado','class' => 'form-control','data-inputmask' => '"mask": "9999-999999-999-9"','data-mask']) }}

                                @if ($errors->has('nit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                Másculino
                                {{ Form::radio('sexo', 'Másculino', false,['id' => 'sex_empleado']) }}
                                Femenino
                                {{ Form::radio('sexo', 'Femenino',false,['id' => 'sex_empleado']) }}
                                @if ($errors->has('sexo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono_fijo') ? ' has-error' : '' }}">
                            <label for="telefono_fijo" class="col-md-4 control-label">Teléfono fijo</label>

                            <div class="col-md-6">
                                {{ Form::text('telefono_fijo', null,['id' => 'fijo_empleado','class' => 'form-control','data-inputmask' => '"mask": "9999-9999"','data-mask']) }}
                                @if ($errors->has('telefono_fijo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono_fijo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular" class="col-md-4 control-label">Teléfono celular</label>

                            <div class="col-md-6">
                                {{ Form::text('celular', null,['id'=>'cel_empleado','class' => 'form-control','data-inputmask' => '"mask": "9999-9999"','data-mask']) }}
                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                {{ Form::textarea('direccion', null,['id'=> 'dir_empleado','class' => 'form-control','rows' => 3]) }}

                                @if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_cuenta') ? ' has-error' : '' }}">
                            <label for="num_cuenta" class="col-md-4 control-label">Número de cuenta bancaria</label>

                            <div class="col-md-6">
                                {{ Form::text('num_cuenta', null,['id'=>'cuenta_empleado','class' => 'form-control','data-inputmask' => '"mask": "999999999"','data-mask']) }}
                                @if ($errors->has('num_cuenta'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_cuenta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_contribuyente') ? ' has-error' : '' }}">
                            <label for="num_contribuyente" class="col-md-4 control-label">Número de contribuyente</label>

                            <div class="col-md-6">
                                {{ Form::text('num_contribuyente', null,['id'=>'contri_empleado','class' => 'form-control','data-inputmask' => '"mask": "999-9"','data-mask']) }}
                                @if ($errors->has('num_contribuyente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_contribuyente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_seguro_social') ? ' has-error' : '' }}">
                            <label for="num_seguro_social" class="col-md-4 control-label">Número de Seguro Social</label>

                            <div class="col-md-6">
                                {{ Form::text('num_seguro_social', null,['id'=>'seguro_empleado','class' => 'form-control','data-inputmask' => '"mask": "999999999"','data-mask']) }}

                                @if ($errors->has('num_seguro_social'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_seguro_social') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_afp') ? ' has-error' : '' }}">
                            <label for="num_afp" class="col-md-4 control-label">Número único previsional</label>

                            <div class="col-md-6">
                                {{ Form::text('num_afp', null,['id'=>'afp_empleado','class' => 'form-control','data-inputmask' => '"mask": "999999999999"','data-mask']) }}
                                @if ($errors->has('num_afp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_afp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
