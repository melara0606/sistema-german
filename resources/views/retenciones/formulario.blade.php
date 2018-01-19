<div class="form-group{{ $errors->has('isss') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Instituto Salvadoreño del Seguro Social</label>

    <div class="col-md-6">
      {{ Form::text('isss', null,['class' => 'form-control']) }}
      @if ($errors->has('isss'))
          <span class="help-block">
              <strong>{{ $errors->first('isss') }}</strong>
          </span>
       @endif
    </div>
</div>

<div class="form-group{{ $errors->has('afp') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Administradora de Fondo para Pensiones</label>

    <div class="col-md-6">
      {{ Form::text('afp', null,['class' => 'form-control']) }}
      @if ($errors->has('afp'))
          <span class="help-block">
              <strong>{{ $errors->first('afp') }}</strong>
          </span>
       @endif
    </div>
</div>

<div class="form-group{{ $errors->has('insaforp') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Instituto Salvadoreño de Formación Profesional</label>

    <div class="col-md-6">
      {{ Form::text('insaforp', null,['class' => 'form-control']) }}
      @if ($errors->has('insaforp'))
          <span class="help-block">
              <strong>{{ $errors->first('insaforp') }}</strong>
          </span>
       @endif
    </div>
</div>
