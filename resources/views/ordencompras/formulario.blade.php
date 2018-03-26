<div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del proyecto o proceso</label>

    <div class="col-md-6">
        <select id="proyecto" class="form-control chosen-select">
            <option value="">Seleccione un proyecto</option>
           @foreach($proyectos as $proyecto)
                <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
           @endforeach
        </select>
    </div>
</div>

<div class="form-group{{ $errors->has('proveedor') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del proveedor</label>

    <div class="col-md-6">
        {!!Form::text('',null,['class'=>'form-control','id'=>'proveedor','autofocus','readonly'])!!}
        {!!Form::hidden('cotizacion_id',null,['class'=>'form-control','id'=>'cotizacion_id','autofocus','readonly'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">NIT del proveedor</label>

    <div class="col-md-6">
        {!!Form::text('',null,['class'=>'form-control','id'=>'nit','autofocus','readonly'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Condiciones de pago</label>

    <div class="col-md-6">
        {!!Form::text('',null,['class'=>'form-control','id'=>'pago','autofocus','readonly'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('adminorden') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del administrador de la orden</label>

    <div class="col-md-6">
        {!!Form::text('adminorden',null,['class'=>'form-control','id'=>'adminorden','autofocus'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Direccion de entrega</label>

    <div class="col-md-6">
        {!!Form::text('direccion_entrega',null,['class'=>'form-control','id'=>'direccion','autofocus'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Periodo de entrega</label>

    <div class="col-md-2">
        {!!Form::text('fecha_inicio',null,['class'=>'form-control','id'=>'fecha_inicio','autofocus'])!!}
    </div>
    <div class="col-md-1"><label for="">al</label></div>
    <div class="col-md-2">
        {!!Form::text('fecha_fin',null,['class'=>'form-control','id'=>'fecha_fin','autofocus'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Observaciones</label>

    <div class="col-md-6">
        {!!Form::text('observaciones',null,['class'=>'form-control','autofocus'])!!}
    </div>
</div>
