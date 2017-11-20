                        <div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
                            <label for="proyecto_id" class="col-md-4 control-label">Proyecto</label>

                            <div class="col-md-6">
                                <select name="proyecto_id" id="" class='form-control'>
                                    <option value="">Elija un proyecto</option>
                                </select>
                                

                                @if ($errors->has('proyecto_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('proyecto_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                         <div class="form-group{{ $errors->has('proyeedor_id') ? ' has-error' : '' }}">
                            <label for="proveedor_id" class="col-md-4 control-label">Proveedor</label>

                            <div class="col-md-6">
                                <select name="proveedor_id" id="" class='form-control'>
                                    <option value="">Elija un proveedor</option>
                                </select>
                                
                                @if ($errors->has('proveedor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('proveedor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción de cotización</label>

                            <div class="col-md-6">
                                {!!Form::text('descripcion',null,['class'=>'form-control','id'=>'descripcion','autofocus','rows'=>3])!!}

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>