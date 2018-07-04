<div class="form-group{{ $errors->has('nombre') ? 'has-error' : '' }}">
	<label for="nombre" class="col-md-4 control-label">Nombre catálogo</label>
	<div class="col-md-6">
		{{ Form::text('nombre'), null,['id'=>'nomb', 'class' => 'form-control'] }}
		@if($errors->has('nombre'))
		<span class="help-block"></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('unidad_medida') ? 'has-error' : '' }}">
	<label for="unidad_medida" class="col-md-4 control-label">Unidad de medida</label>
	<div class="col-md-6">
		{{ Form::text('unidad_medida'), null,['id'=>'unidad', 'class' => 'form-control'] }}
		@if($errors->has('unidad_medida'))
		<span class="help-block"></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('categoria_id') ? ' has-error' : '' }}">
	<label for="" class="col-md-4 control-label">Seleccione categoría</label>
	<div class="col-md-6">
		<select name="categoria_id" id="categoria" class="form-control">
			<option value="">Seleccione categoría</option>
			@foreach($categorias as $categoria)
			<option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
			@endforeach
		</select>
		@if ($errors->has('categoria_id'))
		<span class="help-block">
			<strong>{{ $errors->first('categoria_id') }}</strong>
		</span>
		@endif
	</div>
</div>