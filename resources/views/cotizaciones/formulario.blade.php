<div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Proveedor</label>
    <div class="col-md-6">
        <select name="proveedor" id="proveedor" required class="form-control chosen-select">
            <option value="">Seleccione un proveedor</option>
            @foreach($proveedores as $proveedor)
            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Proyecto</label>
    <div class="col-md-6">
        <select name="proyecto_id" id="proyecto" class="form-control chosen-select">
            <option value="">Seleccione un proyecto</option>
            @foreach($proyectos as $proyecto)
            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
    <label for="descripcion" class="col-md-4 control-label">Forma de pago</label>

    <div class="col-md-6">
        {!!Form::text('descripcion',null,['required','class'=>'form-control','id'=>'descripcion','autofocus','rows'=>3])!!}
    </div>
</div>
<div class="table-responsive">
  <table class="table table-striped" id="tabla" display="block;">
      <thead>
          <tr>
              <th width="50%">Descripción</th>
              <th width="10%">Unidad de medida</th>
              <th width="10%">Cantidad</th>
              <th width="10%">Marca</th>
              <th width="10%">Precio unitario</th>
              <th width="10%">Total</th>
          </tr>
      </thead>
      <tbody id="cuerpo"></tbody>
  </table>
</div>
