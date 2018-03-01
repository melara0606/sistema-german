                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione una forma de pago: </label>
                            <div class="col-md-6">
                                <select name="formapago" id="formapago" class="form-control">
                                    <option value="">Seleccione una forma de pago...</option>
                                    @foreach($formapagos as $formapago)
                                      <option value="{{$formapago->id}}">{{$formapago->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Seleccione la unidad solicitante: </label>
                            <div class="col-md-6">
                                <select name="unidad" id="unidad" class="form-control">
                                    <option value="">Seleccione una unidad</option>
                                    @foreach($unidades as $unidad)
                                        <option>{{$unidad->nombre_unidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Encargado\a del proceso: </label>
                            <div class="col-md-6">
                                {{Form::text('encargado',null,['class' => 'form-control', 'id' => 'encargado'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Cargo: </label>
                            <div class="col-md-6">
                                {{Form::text('cargo',null,['class' => 'form-control', 'id' => 'cargo'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Seleccione el proceso proceso: </label>
                            <div class="col-md-6">
                                <select name="proyecto" id="proyecto" class="form-control">
                                    <option value="">Seleccione una proceso o proyecto</option>
                                    @foreach($proyectos as $proyecto)
                                        <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lugar_entrega') ? ' has-error' : '' }}">
                            <label for="lugar_entrega" class="col-md-4 control-label">Lugar de entrega</label>

                            <div class="col-md-6">
                                {!!Form::text('lugar_entrega',null,['class'=>'form-control','id'=>'lugar_entrega','autofocus'])!!}
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('datos_contenido') ? ' has-error' : '' }}">
                            <label for="datos_contenido" class="col-md-4 control-label">Datos del contenido</label>

                            <div class="col-md-6">
                                {!!Form::text('datos_contenido',null,['class'=>'form-control','id'=>'datos_contenido','autofocus'])!!}
                            </div>
                        </div>
                        <table class="table table-striped" id="tabla" display="block;">
                            <thead>
                                <tr>
                                    <th width="5%">Item</th>
                                    <th width="75%">Descripción</th>
                                    <th width="10%">Unidad de medida</th>
                                    <th width="10%">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpo"></tbody>
                        </table>
