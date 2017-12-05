<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre de organización</label>

    <div class="col-md-6">
        {{ Form::text('nombre', null,['class' => 'form-control']) }}

        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
         @endif
    </div>
</div>

<div class="form-group{{ $errors->has('direccion') ? 'has-error' : '' }}">
	<label for="direccion" class="col-md-4 control-label">Dirección</label>

	<div class="col-md-6">
		{{ Form::textarea('direccion', null,['class' => 'form-control', 'rows' => 3]) }}
		@if ($errors->has('direccion'))
		<span class="help-block">
			<strong>{{ $errors->first('direccion') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('telefono') ? 'has-error' : '' }}">
	<label for="telefono" class="col-md-4 control-label">Teléfono</label>

	<div class="col-md-6">
		{{ Form::text('telefono', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "9999-9999"','data-mask']) }}

		@if ($errors->has('telefono'))
		<span class="help-block">
			<strong>{{ $errors->first('telefono') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('representante') ? 'has-error' : '' }}">
	<label for="representante" class="col-md-4 control-label">Nombre representante</label>

	<div class="col-md-6">
		{{ Form::text('representante', null, ['class' => 'form-control']) }}
		@if ($errors->has('representante'))
		<span class="help-block">
			<strong>{{ $errors->first('representante') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('tel_representante') ? 'has-error' : '' }}">
	<label for="tel_representante" class="col-md-4 control-label">Teléfono representante</label>

	<div class="col-md-6">
		{{ Form::text('tel_representante', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "9999-9999"','data-mask']) }}
		@if ($errors->has('tel_representante'))
		<span class="help-block">
			<strong>{{ $errors->first('tel_representante') }}</strong>
		</span>
		@endif
	</div>
</div>