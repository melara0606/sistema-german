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
<<<<<<< HEAD
                            <div class="col-md-4">
                                <label for="" class="control-label">Item</label>
                                <select name="item" id="item" class="form-control chosen-select">
                                    <option value="">Seleccione un ítem</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control chosen-select">
                                    <option value="">Seleccione una categoría</option>
                                </select>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btncategoria"><span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label">Descripción</label>
                                <select name="descripcion" id="descripcion" class="form-control chosen-select">
                                    <option value="">Seleccione una opción</option>
                                </select>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btndescripcion"><span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                      </div>
=======
                          <label for="" class="col-md-4 control-label">Seleccione Item</label>
                          <div class="col-md-6">
                            <select id="item" class="form-control">
                                <option value="">Seleccione Item</option>   
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione una categoría</label>
                          <div class="col-md-6">
                            <select id="categoria" class="form-control">
                                <option value="">Seleccione categoría</option>   
                            </select>
                        </div>
                    </div>
>>>>>>> aeb9fd586173a27f9508642b98b8e94edcdbe783

                      <div class="form-group">
                            <div class="col-md-12">
                            <label for="" class="col-md-4 control-label"><b>Opciones</b></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <label for="" class="col-md-1 control-label">Cantidad</label>
                                {!!Form::number('',null,['class' => 'form-control','id' => 'cantidad','min' => 1,'steps' => 1])!!}
                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label">Precio Unitario</label>
                                {!!Form::number('',null,['class' => 'form-control','id' => 'precio','min' => 1,'steps' => 0.00])!!}
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                            </div>
                        </div>


<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btncategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de Categoría
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-md-4">Item</label>
                        <div class="col-md-6">
                                <select name="item" id="item2" class="form-control">
                                    <option value="">Seleccione un ítem</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la categoría</label>
                        <div class="col-md-6">
                            <input type="text" id="categoria2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardacat" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btndescripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de Categoría
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la descripción</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="desc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la marca</label>
                        <div class="col-md-6">
                            <input type="text" id="marca" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la unidad de medida</label>
                        <div class="col-md-6">
                            <input type="text" id="uni_medida" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarcategoria" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
