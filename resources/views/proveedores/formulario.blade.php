                        <div class="form-group{{ $errors->has('nombree') ? ' has-error' : '' }}">
                            <label for="nombree" class="col-md-4 control-label">Nombre de la Empresa o Proveedor</label>

                            <div class="col-md-6">
                                {{ Form::text('nombree', null,['class' => 'form-control']) }}

                                @if ($errors->has('nombree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                 {{ Form::text('direccion', null,['class' => 'form-control']) }}
                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefonoe') ? ' has-error' : '' }}">
                            <label for="telefonoe" class="col-md-4 control-label">Telefono de la Empresa o Proveedor</label>

                            <div class="col-md-6">
                                 {{ Form::text('telefonoe', null,['class' => 'form-control']) }}
                                @if ($errors->has('telefonoe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefonoe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emaile') ? ' has-error' : '' }}">
                            <label for="emaile" class="col-md-4 control-label">E-Mail Proveedor</label>

                            <div class="col-md-6">
                                 {{ Form::email('emaile', null,['class' => 'form-control']) }}
                                @if ($errors->has('emaile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emaile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombrer') ? ' has-error' : '' }}">
                            <label for="nombrer" class="col-md-4 control-label">Nombre de Represetante</label>

                            <div class="col-md-6">
                                 {{ Form::text('nombrer', null,['class' => 'form-control']) }}
                                @if ($errors->has('nombrer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombrer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telfijor') ? ' has-error' : '' }}">
                            <label for="telfijor" class="col-md-4 control-label">Telefono fijo Representante (si lo hay)</label>

                            <div class="col-md-6">
                                 {{ Form::text('telfijor', null,['class' => 'form-control']) }}

                                @if ($errors->has('telfijor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telfijor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celr') ? ' has-error' : '' }}">
                            <label for="celr" class="col-md-4 control-label">Celular Representante</label>

                            <div class="col-md-6">
                                 {{ Form::text('celr', null,['class' => 'form-control']) }}

                                @if ($errors->has('celr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emailr') ? ' has-error' : '' }}">
                            <label for="emailr" class="col-md-4 control-label">E-mail representante</label>

                            <div class="col-md-6">
                                 {{ Form::email('emailr', null,['class' => 'form-control']) }}
                                @if ($errors->has('emailr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emailr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>