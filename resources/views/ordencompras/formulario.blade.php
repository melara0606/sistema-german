<div class="form-group{{ $errors->has('tiposervicio_id') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del servicio Municipal</label>

    <div class="col-md-6">

        <select name="tiposervicio_id" id="" class="form-control">
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->proveedor_id }}">{{ $proveedor->proveedor_id}}</option>
            @endforeach
        </select>

        @if ($errors->has('tiposervicio_id'))
            <span class="help-block">
                <strong>{{ $errors->first('tiposervicio_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Direccion de entrega</label>

    <div class="col-md-6">

        {!!Form::text('direccion',null,['class'=>'form-control','id'=>'direccion','autofocus'])!!}

        @if ($errors->has('direccion'))
            <span class="help-block">
                <strong>{{ $errors->first('direccion') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('adminorden') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del administrador de la orden</label>

    <div class="col-md-6">

        {!!Form::text('adminorden',null,['class'=>'form-control','id'=>'adminorden','autofocus'])!!}

        @if ($errors->has('adminorden'))
            <span class="help-block">
                <strong>{{ $errors->first('adminorden') }}</strong>
            </span>
        @endif
    </div>
</div>