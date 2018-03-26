<div class="form-group{{ $errors->has('tipopago_id') ? ' has-error' : '' }}">
	<label for="" class="col-md-4 control-label">Seleccione pago</label>
	<div class="col-md-6">
		<select name="tipopago_id" id="tipopago" class="form-control">
			<option value="">Seleccione tipo de pago</option>
			@foreach($tipopagos as $tipopago)
			<option value="{{$tipopago->id}}">{{$tipopago->nombre}}</option>
			@endforeach
		</select>
		@if ($errors->has('tipopago_id'))
		<span class="help-block">
			<strong>{{ $errors->first('tipopago_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('cuenta_id') ? ' has-error' : '' }}">
	<label for="" class="col-md-4 control-label">Seleccione cuenta</label>
	<div class="col-md-6">
		<select name="cuenta_id" id="cuenta" class="form-control">
			<option value="">Seleccione cuenta</option>
			@foreach($cuentas as $cuenta)
			<option value="{{$cuenta->id}}">{{$cuenta->numero_cuenta}}</option>
			@endforeach
		</select>
		@if ($errors->has('cuenta_id'))
		<span class="help-block">
			<strong>{{ $errors->first('cuenta_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('monto') ? 'has-error' : '' }}">
	<label for="monto" class="col-md-4 control-label">Monto a pagar</label>

	<div class="col-md-6">
		{{ Form::text('monto', null, ['class' => 'form-control']) }}
		@if ($errors->has('monto'))
		<span class="help-block">
			<strong>{{ $errors->first('monto') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{$errors->has('num_factura') ? 'has-error' : '' }}">
	<label for="num_factura" class="col-md-4 control-label">Número de factura</label>

	<div class="col-md-6">
		{{ Form::text('num_factura', null, ['class' => 'form-control']) }}

		@if ($errors->has('num_factura'))
		<span class="help-block">
			<strong>{{ $errors->first('num_factura') }}</strong>
		</span>
		@endif
	</div>
</div>