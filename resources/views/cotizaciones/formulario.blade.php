<div class="form-group{{ $errors->has('proveedor_id') ? ' has-error' : '' }}">
    <label for="" class="col-md-4 control-label">Proveedor</label>
    <div class="col-md-6">
        <select name="proveedor_id" id="proveedor" class="form-control chosen-select">
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
    <label for="descripcion" class="col-md-4 control-label">Descripción de cotización</label>

    <div class="col-md-6">
        {!!Form::text('descripcion',null,['class'=>'form-control','id'=>'descripcion','autofocus','rows'=>3])!!}
    </div>
</div>

<table class="table table-striped" id="tabla" display="block;">
    <thead>
        <tr>
            <th width="5%">Item</th>
            <th width="55%">Descripción</th>
            <th width="10%">Unidad de medida</th>
            <th width="10%">Cantidad</th>
            <th width="10%">Precio unitario</th>
            <th width="10%">Total</th>
        </tr>
    </thead>
    <tbody id="cuerpo"></tbody>
</table>