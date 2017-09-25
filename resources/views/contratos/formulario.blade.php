                        <div class="form-group{{ $errors->has('nombree') ? ' has-error' : '' }}">
                            <label for="nombree" class="col-md-4 control-label">Nombre del contratado</label>

                            <div class="col-md-6">
                                <input id="nombree" type="text" class="form-control" name="nombree" value="{{ old('nombree') }}" autofocus>

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
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" >

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefonoe') ? ' has-error' : '' }}">
                            <label for="telefonoe" class="col-md-4 control-label">Telefono de la Empresa o Contácto</label>

                            <div class="col-md-6">
                                <input id="telefonoe" type="text" class="form-control" name="telefonoe" value="{{ old('telefonoe') }}" >

                                @if ($errors->has('telefonoe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefonoe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emaile') ? ' has-error' : '' }}">
                            <label for="emaile" class="col-md-4 control-label">E-Mail Empresa o Contácto</label>

                            <div class="col-md-6">
                                <input id="emaile" type="emaile" class="form-control" name="emaile" value="{{ old('email') }}">

                                @if ($errors->has('emaile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emaile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nitempresa') ? ' has-error' : '' }}">
                            <label for="nitempresa" class="col-md-4 control-label">Nit de la Empresa</label>

                            <div class="col-md-6">
                                <input id="nitempresa" type="nitempresa" class="form-control" name="nitempresa">
                                @if ($errors->has('nitempresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nitempresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombrer') ? ' has-error' : '' }}">
                            <label for="nombrer" class="col-md-4 control-label">Nombre de Represetante</label>

                            <div class="col-md-6">
                                <input id="nombrer" type="nombrer" class="form-control" name="nombrer">
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
                                <input id="telfijor" type="text" class="form-control" name="telfijor" value="{{ old('telfijor') }}" >

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
                                <input id="celr" type="text" class="form-control" name="celr" value="{{ old('celr') }}" >

                                @if ($errors->has('celr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emailr') ? ' has-error' : '' }}">
                            <label for="emailr" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="emailr" type="text" class="form-control" name="emailr" value="{{ old('emailr') }}" >

                                @if ($errors->has('emailr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emailr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>