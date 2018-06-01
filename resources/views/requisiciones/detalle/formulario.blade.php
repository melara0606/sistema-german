<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : ''}}">
  <label for="" class="col-md-4 control-label">Descripcion</label>
    <div class="col-md-6">
      {!!Form::text('descripcion',null,['class' => 'form-control', 'id' => 'descripcion' ])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('unidad_medida') ? ' has-error' :''}}">
  <label for="" class="col-md-4 control-label">Unidad de medida</label>
  <div class="col-md-6">
    <select name="unidad_medida" id="unidad_medida" class="chosen-select-width">
      <option value="">Seleccione una unidad administrativa</option>
      @foreach($medidas as $medida)
        <option>{{$medida->nombre_medida}}</option>
      @endforeach
    </select>
  </div>
</div>


<div class="form-group{{ $errors->has('cantidad') ? ' has-error' :''}}">
  <label for="" class="col-md-4 control-label">Cantidad</label>
    <div class="col-md-6">
      {!!Form::text('cantidad',null,['class' => 'form-control', 'id' => 'cantidad' ])!!}
    </div>
</div>
