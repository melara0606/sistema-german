<div class="form-group">
  <label for="" class="col-md-4">Proyecto</label>
  <div class="col-md-6">
    <select class="chosen-select-width" id="proyecto">
      <option value="">Seleccione el proyecto</option>
      @foreach($proyectos as $proyecto)
        <option value="{{$proyecto->id}}">{{$proyecto->proyecto->nombre}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label for="" class="col-md-4">Empleado</label>
  <div class="col-md-6">
    <select class="chosen-select-width" id="empleado">
      <option value="">Seleccione un empleado</option>
    </select>
  </div>
  <div class="col-md-2">
      <button class="btn btn-default" type="button" id="" data-toggle="modal" data-target="#btnempleado" title="Agregar nuevo empleado"><span class="glyphicon glyphicon-plus"></span></button>
  </div>
</div>

<div class="form-group">
  <label for="" class="col-md-4">Fecha de revisión del contrato</label>
  <div class="col-md-6">
    <?php $hoy=date('Y-m-d')?>
    {{Form::date('',null,['class'=>'form-control','id'=>'fecharevision','min'=>$hoy])}}
  </div>
</div>

<div class="form-group">
  <label for="" class="col-md-4">Funciones</label>
  <div class="col-md-6">
    {{Form::textarea('',null,['class' => 'form-control','id'=>'txtfuncion','rows'=>2])}}
  </div>
  <div class="col-md-1">
    <button type="button" id="agregarf" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
  </div>
</div>

<div class="form-group">
  <ol id="funciones">

  </ol>
</div>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="btnempleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Empleado
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('empleados.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarempleado" data-dismiss="modal" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
