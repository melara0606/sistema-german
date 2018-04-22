                        <div class="form-group">
                          <label for="" class="col-md-4">Seleccione un proyecto</label>
                            <div class="col-md-6">
                              @if(isset($proyectos))
                                <select id="proyecto" class="chosen-select-width">
                                    <option value="">Seleccione un Proyecto...</option>
                                    @foreach($proyectos as $proyecto)
                                      <option data-monto="{{$proyecto->monto}}" value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                </select>
                              @else
                                {!!Form::hidden('',$proyecto->id,['id' => 'proyecto'])!!}
                                {!!Form::text('nombpro',$proyecto->nombre,['class' => 'form-control','readonly'])!!}
                              @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4">Seleccione un ítem</label>
                            <div class="col-md-6" id="select">
                                <select name="" id="item" class="form-control chosen-select-width">
                                    <option value="">Seleccione un ítem</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalcategoria"><span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4">Seleccione una descripción</label>
                            <div class="col-md-6">
                              <select class="chosen-select-width" id="catalogo">
                                <option value="">Seleccione una descripción</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalcatalogo"><span class="glyphicon glyphicon-plus"></span></button>
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

                        <div class="form-group">
                            <div class="col-md-6">
                              <button type="button" id="agregaratabla" class="btn btn-success">Agregar</button>
                            </div>
                        </div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalcategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de ítem
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite el ítem</label>
                        <div class="col-md-6">
                          {!!Form::text('',null,['class' => 'form-control','id'=>'txtitem'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la categoría</label>
                        <div class="col-md-6">
                            <input type="text" id="txtcategoria" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardaritem" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalcatalogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de Categoría
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite una opción</label>
                        <div class="col-md-6">
                                <input type="text" id="txtdescripcion" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Digite la unidad de medida</label>
                        <div class="col-md-6">
                            <input type="text" id="txtunidad" class="form-control">
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
