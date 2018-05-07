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

<div class="form-group">
    <label for="" class="col-md-4 control-label">Tipo pago</label>
    <div class="col-md-6">
        <select name="tipopago_id" id="tipopago" class="form-control">
            <option value="">Seleccione un pago</option>
            @foreach($pagos as $pago)
            <option value="{{$pago->id}}">{{$pago->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#formpago"><span class="glyphicon glyphicon-plus"></span></button>
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

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="formcargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Cargo
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="panel-body">
                    @include('cargos.formulario')
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarcargo" data-dismiss="modal" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>