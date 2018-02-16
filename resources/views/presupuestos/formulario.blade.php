                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione un proyecto</label>
                            <div class="col-md-6">
                              @if(isset($proyectos))
                                <select id="proyecto" class="form-control">
                                    <option value="">Seleccione un Proyecto...</option>
                                    @foreach($proyectos as $proyecto)
                                      <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                </select>
                              @else
                                {!!Form::hidden('proyecto',$proyecto->id)!!}
                                {!!Form::text('nombpro',$proyecto->nombre,['class' => 'form-control','readonly'])!!}
                              @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <label for="" class="control-label">Item</label>
                                {!!Form::number('',null,['class' => 'form-control','id' => 'item','min' => 1,'steps' => 1])!!}
                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label">Categoría</label>
                                {!! Form::text('',null,['class' => 'form-control','id' => 'categoria']) !!}
                            </div>
                      </div>

                      <div class="form-group">
                            <div class="col-md-12">
                            <label for="" class="col-md-4 control-label"><b>Materiales</b></label>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                {!! Form::text('',null,['class' => 'form-control','id' => 'descripcion']) !!}
                            </div>
                      </div>

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                <label for="" class="col-md-1 control-label">Cantidad</label>
                                {!!Form::number('',null,['class' => 'form-control','id' => 'cantidad','min' => 1,'steps' => 1])!!}
                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label">Precio Unitario</label>
                                {!!Form::number('',null,['class' => 'form-control','id' => 'precio','min' => 1,'steps' => 0.00])!!}
                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label">Unidad de medida</label>
                                {!! Form::text('',null,['class' => 'form-control','id' => 'unidad']) !!}
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
