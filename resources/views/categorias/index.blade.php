@extends('layouts.app')

@section('migasdepan')
<h1>
	Categorías
</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
</ol>
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-tittle">Listado</h3>
				<a href="{{ url('/categorias/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>Agregar</a>
				<a href="{{ url('/categorias?estado=1') }}" class="btn btn-primary">Activos</a>
				<a href="{{ url('/categorias?estado=2') }}" class="btn btn-primary">Papelera</a>
			</div>

			<div class="box-body table-responsive">
				<table class="table table-striped table-bordered table-hover" id="example2">
					<thead>
						<tr>
							<th>Item</th>
							<th>Nombre categoría</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorias as $categoria)
						<tr>
							<td>{{ $categoria->item}}</td>
							<td>{{ $categoria->nombre_categoria}}</td>
							<td>
								<a href="{{ url('categorias/'.$categoria->id.'/edit')}}">Editar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="pull-right">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection