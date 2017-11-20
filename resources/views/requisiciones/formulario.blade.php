                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Unidad administrativa</label>
                            <div class="col-md-6">
                                <input type="text" name="unidad_admin" id="unidad_admin" class="form-control">
                            </div>
                      </div>

                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Linea de trabajo</label>
                            <div class="col-md-6">
                                <input id="linea_trabajo" type="text" class="form-control" name="linea_trabajo" />
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Fuente de financiamiento</label>
                            <div class="col-md-6">
                                <input id="fuente_financiamiento" type="text" class="form-control" name="fuente_financiamiento" />
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Justificación</label>
                            <div class="col-md-6">
                                <input id="justificacion" type="text" class="form-control" name="justificacion" />
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                          Agregar requisiciones
                        </button>
                        

                        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Necesidad de la requisicion</h4>
      </div>
      <div class="modal-body">
        @include('requisiciones.detalle')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="agregar" data-dismiss="modal" class="btn btn-success">Agregar</button>
      </div>
    </div>
  </div>
</div>
