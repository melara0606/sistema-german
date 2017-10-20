                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del proyecto</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autofocus>

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
                                <input id="monto" type="text" class="form-control" name="monto" value="{{ old('monto') }}" >

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
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" >

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tiempo') ? ' has-error' : '' }}">
                            <label for="tiempo" class="col-md-4 control-label">Tiempo de desarrollo (días)</label>

                            <div class="col-md-6">
                                <input id="tiempo" type="tiempo" class="form-control" name="tiempo" value="{{ old('tiempo') }}">

                                @if ($errors->has('tiempo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tiempo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('encargado') ? ' has-error' : '' }}">
                            <label for="encargado" class="col-md-4 control-label">Encargado del proyecto</label>

                            <div class="col-md-6">
                                <input id="encargado" type="text" class="form-control" name="encargado" value="{{ old('encargado') }}" autofocus>

                                @if ($errors->has('encargado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('organizacion') ? ' has-error' : '' }}">
                            <label for="organizacion" class="col-md-4 control-label">Organización colaboradora</label>

                            <div class="col-md-6">
                                <input id="organizacion" type="organizacion" class="form-control" name="organizacion">
                                @if ($errors->has('organizacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organizacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('beneficiario') ? ' has-error' : '' }}">
                            <label for="beneficiario" class="col-md-4 control-label">Nombre beneficiario</label>

                            <div class="col-md-6">
                                <input id="beneficiario" type="beneficiario" class="form-control" name="beneficiario">
                                @if ($errors->has('beneficiario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficiario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>