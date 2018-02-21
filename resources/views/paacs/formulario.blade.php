                        <div class="form-group">
                          <label for="" class="col-md-2 control-label">Obra, Bien o Servicio</label>
                          <div class="col-md-8">
                              {{ Form::textarea('obra', null,['class' => 'form-control','rows' => 3,'id' => 'obra']) }}
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="" class="col-md-4 control-label"><b>Montos establecidos por cada mes</b></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Enero</label>
                                  {{ Form::number('ene', null,['class' => 'form-control ','id' => 'ene','steps' => 0.00,'min' => 0]) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Febrero</label>
                                  {{ Form::number('feb', null,['class' => 'form-control ','id' => 'feb','steps' => 0.00,'min' => 0]) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Marzo</label>
                                  {{ Form::number('mar', null,['class' => 'form-control ','id' => 'mar','steps' => 0.00,'min' => 0]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Abril</label>
                                  {{ Form::number('abr', null,['class' => 'form-control ','id' => 'abr','steps' => 0.00,'min' => 0]) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Mayo</label>
                                  {{ Form::number('may', null,['class' => 'form-control ','id' => 'may','steps' => 0.00,'min' => 0]) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Junio</label>
                                  {{ Form::number('jun', null,['class' => 'form-control ','id' => 'jun','steps' => 0.00,'min' => 0]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Julio</label>
                                  {{ Form::number('jul', null,['class' => 'form-control','id' => 'jul','steps' => 0.00,'min' => 0]) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Agosto</label>
                                  {{ Form::number('ago', null,['class' => 'form-control','id' => 'ago','steps' => 0.00,'min' => 0]) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Septiembre</label>
                                  {{ Form::number('sep', null,['class' => 'form-control','id' => 'sep','steps' => 0.00,'min' => 0]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Octubre</label>
                                  {{ Form::number('oct', null,['class' => 'form-control','id' => 'oct','steps' => 0.00,'min' => 0]) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Noviembre</label>
                                  {{ Form::number('nov', null,['class' => 'form-control','id' => 'nov','steps' => 0.00,'min' => 0]) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Diciembre</label>
                                  {{ Form::number('dic', null,['class' => 'form-control','id' => 'dic','steps' => 0.00,'min' => 0]) }}
                            </div>
                        </div>


                        <br>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                            </div>

                        </div>
