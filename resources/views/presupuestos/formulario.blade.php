                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione un proyecto</label>
                            <div class="col-md-6">
                                <select name="proyecto" id="proyecto" class="form-control">
                                    <option value="">Seleccione un Proyecto...</option>
                                    @foreach($proyectos as $proyecto)
                                      <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="" class="col-md-4 control-label"><b>Materiales</b></label>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Digite el Material</label>
                            <div class="col-md-6">
                                <input type="text" name="material" id="material" class="form-control">
                            </div>
                      </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Cantidad</label>
                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control" name="cantidad" />
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Precio Unitario</label>
                            <div class="col-md-6">
                                <input id="precio" type="text" class="form-control" name="precio" />
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" title="Agregar datos a la tabla" id="agregar" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
