                      <div class="form-group">
                        <label for="" class="col-md-4 control-label">Actividad</label>
                        <div class="col-md-6">
                          {!! Form::textarea('actividad',null,['class' => 'form-control','placeholder'=>'Digite la actividad a realizar','rows'=>3]) !!}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="" class="col-md-4 control-label">Unidad administrativa</label>
                        <div class="col-md-6">
                          <select name="unidad_admin" class="chosen-select-width">
                            <option value="">Seleccione la unidad administrativa</option>
                            @foreach($unidades as $unidad)
                              <option value="{{$unidad->id}}">{{$unidad->nombre_unidad}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Linea de trabajo</label>
                            <div class="col-md-6">
                              {!!Form::text('linea_trabajo',null,['class' => 'form-control','id'=>'linea_trabajo'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Fuente de financiamiento</label>
                            <div class="col-md-6">
                              {!!Form::text('fuente_financiamiento',null,['class' => 'form-control','id'=>'fuente_financiamiento'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Justificación</label>
                            <div class="col-md-6">
                              {!!Form::textarea('justificacion',null,['class' => 'form-control','rows' => 3,'id'=>'justificacion'])!!}
                            </div>
                        </div>
