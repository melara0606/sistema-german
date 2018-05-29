                      <div class="form-group">
                        <label for="" class="col-md-4 control-label">Actividad</label>
                        <div class="col-md-6">
                          {!! Form::textarea('actividad',null,['id'=>'actividad','class' => 'form-control','placeholder'=>'Digite la actividad a realizar','rows'=>3]) !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-md-4 control-label">Unidad administrativa</label>
                        <div class="col-md-6">
                          {!! Form::select('unidad_id',$unidades,null,['class'=>'chosen-select-width']) !!}

                        </div>
                      </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Linea de trabajo</label>
                            <div class="col-md-6">
                              {!!Form::text('linea_trabajo',null,['id'=>'linea_trabajo','class' => 'form-control','id'=>'linea_trabajo'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Fuente de financiamiento</label>
                            <div class="col-md-6">
                              {!!Form::text('fuente_financiamiento',null,['id'=>'fuente_financiamiento','class' => 'form-control','id'=>'fuente_financiamiento'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Justificación</label>
                            <div class="col-md-6">
                              {!!Form::textarea('justificacion',null,['id'=>'justificacion','class' => 'form-control','rows' => 3,'id'=>'justificacion'])!!}
                            </div>
                        </div>
