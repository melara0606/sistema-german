<div class="form-group{{ $errors->has('numero_de_cuenta') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Numero de cuenta</label>

    <div class="col-md-6">
        {{ Form::text('numero_de_cuenta', null,['class' => 'form-control']) }}

        @if ($errors->has('numero_de_cuenta'))
            <span class="help-block">
                <strong>{{ $errors->first('numero_de_cuenta') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Proyecto</label>

    <div class="col-md-6">
        <select class="form-control" name="proyecto_id">
          @foreach ($proyectos as $proyecto)
            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
          @endforeach
        </select>
        @if ($errors->has('proyecto_id'))
            <span class="help-block">
                <strong>{{ $errors->first('proyecto_id') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('banco') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre del banco</label>

    <div class="col-md-6">
        {{ Form::text('banco', null,['class' => 'form-control']) }}

        @if ($errors->has('banco'))
            <span class="help-block">
                <strong>{{ $errors->first('banco') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('fecha_de_apertura') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Fecha de apertura</label>

    <div class="col-md-6">
        {{ Form::date('fecha_de_apertura', null,['class' => 'form-control']) }}

        @if ($errors->has('fecha_de_apertura'))
            <span class="help-block">
                <strong>{{ $errors->first('fecha_de_apertura') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('monto_inicial') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Monto inicial</label>

    <div class="col-md-6">
        {{ Form::text('monto_inicial', null,['class' => 'form-control']) }}

        @if ($errors->has('monto_inicial'))
            <span class="help-block">
                <strong>{{ $errors->first('monto_inicial') }}</strong>
            </span>
         @endif
    </div>
</div>
