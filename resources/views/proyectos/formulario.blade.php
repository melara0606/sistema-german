                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del proyecto</label>

                            <div class="col-md-6">

                                {!!Form::text('nombre',null,['class'=>'form-control','id'=>'nombre','autofocus'])!!}
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Monto del proyecto</label>

                            <div class="col-md-4">
                                {!!Form::text('monto',null,['class'=>'form-control','id'=>'monto','readonly'])!!}
                            </div>
                            <div class="col-md-2">
                              <button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnfondos">Agregar nueva</button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección donde se desarrollará</label>

                            <div class="col-md-6">
                                {!!Form::textarea('direccion',null,['class'=>'form-control','id'=>'direccion','autofocus','rows'=>3])!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label for="fecha_inicio" class="col-md-4 control-label">Periodo del proyecto</label>

                            <div class="col-md-3">
                                <label for="fecha_inicio" class="control-label">Fecha de inicio</label>
                                {!!Form::text('fecha_inicio',null,['class'=>'fecha form-control','id'=>'fecha_inicio','autofocus'])!!}
                            </div>
                            <div class="col-md-3">
                              <label for="fecha_fin" class="control-label">Fecha de finalización</label>
                                {!!Form::text('fecha_fin',null,['class'=>'fecha form-control','id'=>'fecha_fin','autofocus'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="" class="col-md-6">¿El proyecto cuenta con una organizacion colaboradora?</label>
                          <input type="checkbox" name="org" value="hola" id="colaboradora">
                        </div>

                        <div class="form-group" id="cola">

                        </div>

                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-4 control-label">Motivo del proyecto</label>

                            <div class="col-md-6">
                                {!!Form::textarea('motivo',null,['class'=>'form-control','id'=>'nombre','autofocus', 'rows'=>3])!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('beneficiarios') ? ' has-error' : '' }}">
                            <label for="fecha_fin" class="col-md-4 control-label">Beneficiarios</label>

                            <div class="col-md-6">
                                {!!Form::text('beneficiarios',null,['class'=>'form-control','id'=>'beneficiarios','autofocus'])!!}
                            </div>
                        </div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnfondos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Ingreso de fondos
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label for="" class="col-md-4">Categoría</label>
                    <div class="col-md-6">
                      <select class="form-control" id="cat_id">
                        <option value="">Seleccione una categoria</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-default" name="button" id="" data-toggle="modal" data-target="#btncategoria"><span class="glyphicon glyphicon-plus"></span></button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-4">Ingrese el monto</label>
                    <div class="col-md-6">
                      <input type="text" id="cant_monto" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default" type="button" id="btnAgregarfondo">Agregar</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <table class="table table-striped table-bordered" id="tbFondos">
                      <tr>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                      </tr>
                      <body></body>
                      <tfoot id="pie_monto">
                          <tr>
                            <td class="text-left" colspan="2">Total $</td>
                            <td colspan="2" style="text-align:right;" id="totalEnd">0.00</td>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                        <label for="" class="col-md-4">Digite la categoría</label>
                        <div class="col-md-6">
                            <input type="text" id="cate" class="form-control">
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

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnorganizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Organización
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('organizaciones.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarorganizacion" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
