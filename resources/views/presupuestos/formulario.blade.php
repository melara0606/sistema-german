                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Seleccione un proyecto</label>
                            <div class="col-md-6">
                              @if(isset($proyectos))
                                <select id="proyecto" class="form-control">
                                    <option value="">Seleccione un Proyecto...</option>
                                    @foreach($proyectos as $proyecto)
                                      <option data-monto="{{$proyecto->monto}}" value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                </select>
                              @else
                                {!!Form::hidden('proyecto',$proyecto->id)!!}
                                {!!Form::text('nombpro',$proyecto->nombre,['class' => 'form-control','readonly'])!!}
                              @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btnagregatabla"><span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>


<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnagregatabla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de Categoría
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-md-4">Seleccione un item</label>
                        <div class="col-md-6">
                            <select name="item" id="item" class="form-control chosen-select-width">
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
                        <label for="" class="col-md-4">Seleccione una categoría</label>
                        <div class="col-md-6" id="select">
                            <select name="" id="categoria" class="form-control chosen-select-width">
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btncategoria"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Seleccione una descripción</label>
                        <div class="col-md-6">
                            <select name="" id="descripcion" class="chosen-select-width">
                                <option value="">Seleccione una descripción</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btndescripcion"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la cantidad que necesita</label>
                        <div class="col-md-6">
                            <input type="text" id="cantidad" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite el precio unitario</label>
                        <div class="col-md-6">
                            <input type="text" id="precio" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="agregaratabla" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
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
                                <select id="item2" class="chosen-select-width">
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
                        <label for="" class="col-md-4">Seleccione un item</label>
                        <div class="col-md-6">
                            <select id="item3" class="form-control chosen-select-width">
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
                        <label for="" class="col-md-4">Seleccione una categoría</label>
                        <div class="col-md-6">
                            <select id="categoria3" class="form-control chosen-select-width">
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#btncategoria"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite una opción</label>
                        <div class="col-md-6">
                                <input type="text" id="nombre_descripcion" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la unidad de medida</label>
                        <div class="col-md-6">
                            <input type="text" id="unidad_medida" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarcatalogo" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
