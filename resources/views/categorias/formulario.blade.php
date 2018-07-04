<div class="form-group{{ $errors->has('item') ? 'has-error' : '' }}">
	<label for="item" class="col-md-4 control-label">Item</label>
	<div class="col-md-6">
		{{ Form::text('item'), null,['id'=>'item', 'class' => 'form-control'] }}
		@if($errors->has('item'))
		<span class="help-block"></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('nombre_categoria') ? 'has-error' : '' }}">
	<label for="nombre_categoria" class="col-md-4 control-label">Nombre categoría</label>
	<div class="col-md-6">
		{{ Form::text('nombre_categoria'), null,['id'=>'nombre', 'class' => 'form-control'] }}
		@if($errors->has('nombre_categoria'))
		<span class="help-block"></span>
		@endif
	</div>
</div>