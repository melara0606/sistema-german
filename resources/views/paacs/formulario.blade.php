                        <div class="form-group">
                          <label for="" class="col-md-2 control-label">Obra, Bien o Servicio</label>
                          <div class="col-md-8">
                              {{ Form::textarea('obra', null,['class' => 'form-control','rows' => 3]) }}
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
                                  {{ Form::text('ene', null,['class' => 'form-control','id' => 'ene']) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Febrero</label>
                                  {{ Form::text('feb', null,['class' => 'form-control','id' => 'feb']) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Marzo</label>
                                  {{ Form::text('mar', null,['class' => 'form-control','id' => 'mar']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Abril</label>
                                  {{ Form::text('abr', null,['class' => 'form-control','id' => 'abr']) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Mayo</label>
                                  {{ Form::text('may', null,['class' => 'form-control','id' => 'may']) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Junio</label>
                                  {{ Form::text('jun', null,['class' => 'form-control','id' => 'jun']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Julio</label>
                                  {{ Form::text('jul', null,['class' => 'form-control','id' => 'jul']) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Agosto</label>
                                  {{ Form::text('ago', null,['class' => 'form-control','id' => 'ago']) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Septiembre</label>
                                  {{ Form::text('sep', null,['class' => 'form-control','id' => 'sep']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                            <label for="" class="col-md-2 control-label">Octubre</label>
                                  {{ Form::text('oct', null,['class' => 'form-control','id' => 'oct']) }}

                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Noviembre</label>
                                  {{ Form::text('nov', null,['class' => 'form-control','id' => 'nov']) }}
                            </div>
                            <div class="col-md-4">
                                <label for="" class="col-md-2 control-label">Diciembre</label>
                                  {{ Form::text('dic', null,['class' => 'form-control','id' => 'dic']) }}
                            </div>
                        </div>


                        <br>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                            </div>

                        </div>
