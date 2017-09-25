<?php use App\Cargo; 
$cargo=Cargo::vercargo(Auth::user()->cargo);
?>
@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
        <small>Ver Perfil</small>
      </h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del usuario </div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('nombree') ? ' has-error' : '' }}">
                            <label for="nombree" class="col-md-4 control-label">Nombre: </label>
                            <label for="nombree" class="col-md-4 control-label">{{Auth::user()->name}}</label><br>
                            
                        </div>

                         <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Nombre de Usuario: </label>
                            <label for="nombree" class="col-md-4 control-label">{{Auth::user()->username}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('telefonoe') ? ' has-error' : '' }}">
                            <label for="telefonoe" class="col-md-4 control-label">Email: </label>
                            <label for="nombree" class="col-md-4 control-label">{{Auth::user()->email}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('emailr') ? ' has-error' : '' }}">
                            <label for="emailr" class="col-md-4 control-label">Cargo:</label>
                            <label for="nombree" class="col-md-4 control-label">{{$cargo}}</label><br>
                            
                        </div>

                        <a href="{{ url('/perfil/'.Auth::user()->id) }}" class="btn btn-warning">Editar</a> |
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
