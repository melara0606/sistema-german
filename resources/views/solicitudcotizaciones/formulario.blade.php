                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Encargado\a del proceso: </label>
                    <div class="col-md-6">
                        {{Form::text('encargado',usuario(Auth()->user()->empleado_id),['readonly','class' => 'form-control', 'id' => 'encargado'])}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Cargo: </label>
                    <div class="col-md-6">
                        {{Form::text('cargo',vercargo(Auth()->user()->cargo),['readonly','class' => 'form-control', 'id' => 'cargo'])}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Proceso o proyecto: </label>
                    <div class="col-md-6">
                        {{Form::text('',$proyecto->nombre,['class' => 'form-control'])}}
                        {{Form::hidden('proyecto',$proyecto->id,['class' => 'form-control','id' => 'proyecto'])}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Categoria: </label>
                    <div class="col-md-6">
                        <select name="categoria" id="categoria" class="chosen-select-width">
                          <option value="">Seleccione una categoría</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Forma de pago: </label>
                    <div class="col-md-6">
                      <select name="formapago" id="formapago" class="chosen-select-width">
                          <option value="">Seleccione una forma de pago...</option>
                          @foreach($formapagos as $formapago)
                          <option value="{{$formapago->id}}">{{$formapago->nombre}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="" class="col-md-4 control-label">Unidad solicitante: </label>
                  <div class="col-md-6">
                      <select name="unidad" id="unidad" class="chosen-select-width">
                          <option value="">Seleccione una unidad</option>
                          @foreach($unidades as $unidad)
                          <option>{{$unidad->nombre_unidad}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

                <div class="form-group{{ $errors->has('lugar_entrega') ? ' has-error' : '' }}">
                    <label for="lugar_entrega" class="col-md-4 control-label">Lugar de entrega de los suministros</label>

                    <div class="col-md-6">
                        {!!Form::textarea('lugar_entrega',null,['class'=>'form-control','id'=>'lugar_entrega','rows'=>2])!!}
                    </div>
                </div>

                <div class="form-group">
                  <label for="fecha_limite" class="col-md-4 control-label">Fecha limite para cotizar</label>
                  <div class="col-md-6">
                    {!!Form::text('fecha_limite',null,['class' => 'form-control unafecha'])!!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="tiempo_entrega" class="col-md-4 control-label">Tiempo de entrega</label>
                  <div class="col-md-6">
                    {!!Form::text('tiempo_entrega',null,['class' => 'form-control'])!!}
                  </div>
                </div>

                <table class="table table-striped" id="tabla" display="block;">
                    <thead>
                        <tr>
                            <th width="60%">DESCRIPCIÓN</th>
                            <th width="10%"><center>UNIDAD DE MEDIDA</center></th>
                            <th width="10%"><center>CANTIDAD</center></th>
                            <th width="10%"><center>PRECIO UNITARIO</center></th>
                            <th width="10%">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo"></tbody>
                </table>
