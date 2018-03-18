<div class="form-group{{ $errors->has('numero_cuenta') ? ' has-error' : '' }}">
    <label for="numero_cuenta" class="col-md-4 control-label">Número de Cuenta</label>
    <div class="col-md-6">
        {{ Form::text('numero_cuenta', null,['id'=>'num_cuenta','class' => 'form-control','data-inputmask' => '"mask": "999999999999"','data-mask']) }}
        @if ($errors->has('numero_cuenta'))
        <span class="help-block">
            <strong>{{ $errors->first('numero_cuenta') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Proyecto</label>

    <div class="col-md-6">
        <select name="proyecto_id" id="proyecto" class="form-control">
            <option value="">Seleccione proyecto</option>
            @foreach($proyectos as $proyecto)
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
    <label for="banco" class="col-md-4 control-label">Banco</label>

    <div class="col-md-6">
        {{ Form::text('banco', null,['id'=>'nomb_banco','class' => 'form-control']) }}
        @if ($errors->has('banco'))
        <span class="help-block">
            <strong>{{ $errors->first('banco') }}</strong>
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
