@extends('layouts.app')

@section('migasdepan')
<h1>
        Usuarios
        <small>Ver proveedor <b>{{ $proveedor->nombree }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proveedores') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del Proveedor </div>
                <div class="panel-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
