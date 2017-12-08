@extends('layouts.app')

@section('migasdepan')
<h1>
	<small>Ver Cargo<b> {{$cargos->cargo}} </b></small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/cargos') }}"><i class="fa fa-dashboard"></i> Cargos</a></li>
	<li class="active">Ver</li>
</ol>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11">
			<div class="panel panel-primary">
				<div class="panel-heading">Datos de la organización</div>
				<div class="panel-body">
					<div class="form-group {{ $errors->has('cargo') ? ' has-error ' : '' }}">
						<label for="cargo" class="col-md-4 control-label">Nombre de la organización</label>
						<label for="cargo" class="col-md-4 control-label">{{$cargos->cargo}}</label><br>
					</div>

					 {{Form::open(['route' => ['cargos.destroy', $cargos->id], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
					 <a href="{{ url('/cargos/'.$cargos->id.'/edit') }}" class="btn btn-warning"> <span class="glyphicon glyphicon-text-size"></span> Editar</a> |
					 <button class="btn btn-danger" type="button" onclick="return
					 swal({
					 title: 'Eliminar organización',
					 text: '¿Está seguro de eliminar el registro?',
					 type: question,
					 showCancelButton: true,
					 confirmButtonText: 'Sí, eliminar',
					 cancelButtonText: 'No, mantener',
					 confirmButtonClass: 'btn btn-danger',
					 cancelButtonClass: 'btn btn-default',
					 buttonsStyling: false
					}).then(function (){
					submit();
					swal('Hecho', 'El registro ha sido eliminado', 'success')
				}, function(dismiss){
				if(dismiss == 'cancel'){
				swal('Cancelado', 'El registro se mantiene', 'info')
			}
			});"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
			{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection