@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/usuarios') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Cambiar imagen de perfil</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Usuarios</div>
                <div class="panel-body">
				<h1>Cambiar imagen de perfil</h1>
				<img src="{{ asset('img/'.Auth::user()->avatar) }}" width="150" height="200" class="user-image" alt="User Image">
				<form method='post' action='{{url("usuarios/updateprofile")}}' enctype='multipart/form-data'>
					{{csrf_field()}}
					<div class='form-group'>
						<label for='image'>Imagen: </label>
						<input type="file" name="avatar" />
						<div class='text-danger'>{{$errors->first('avatar')}}</div>
					</div>
					<button type='submit' class='btn btn-primary'>Actualizar imagen de perfil</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection