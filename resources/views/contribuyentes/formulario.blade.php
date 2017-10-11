<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del contribuyente</label>

    <div class="col-md-6">
        {{ Form::text('nombre', null,['class' => 'form-control']) }}

        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('dui') ? ' has-error' : '' }}">
    <label for="dui" class="col-md-4 control-label">Número de DUI</label>

    <div class="col-md-6">
        {{ Form::text('dui', null,['class' => 'form-control']) }}

        @if ($errors->has('dui'))
            <span class="help-block">
                <strong>{{ $errors->first('dui') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
    <label for="nit" class="col-md-4 control-label">Número de NIT</label>

    <div class="col-md-6">
        {{ Form::text('nit', null,['class' => 'form-control']) }}

        @if ($errors->has('nit'))
            <span class="help-block">
                <strong>{{ $errors->first('nit') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
    <label for="direccion" class="col-md-4 control-label">Dirección</label>

    <div class="col-md-6">
        {{ Form::textarea('direccion', null,['class' => 'form-control']) }}

        @if ($errors->has('direccion'))
            <span class="help-block">
                <strong>{{ $errors->first('direccion') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
    <label for="sexo" class="col-md-4 control-label">Sexo</label>

    <div class="col-md-6">
        Másculino
        {{ Form::radio('sexo', 'Másculino',['class' => 'form-control']) }}
        Femenino
        {{ Form::radio('sexo', 'Femenino',['class' => 'form-control']) }}
        @if ($errors->has('sexo'))
            <span class="help-block">
                <strong>{{ $errors->first('sexo') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
    <label for="telefono" class="col-md-4 control-label">Teléfono</label>

    <div class="col-md-6">
        {{ Form::text('telefono', null,['class' => 'form-control']) }}

        @if ($errors->has('telefono'))
            <span class="help-block">
                <strong>{{ $errors->first('telefono') }}</strong>
            </span>
         @endif
    </div>
</div>      
