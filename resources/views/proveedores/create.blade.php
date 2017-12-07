@extends('layouts.app')

@section('migasdepan')
<h1>
        Proveedor
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/proveedores') }}"><i class="fa fa-user-circle-o"></i> Proveedores</a></li>
        <li class="active">Registro</li>    
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(['action' => 'ProveedorController@store','class' => 'form-horizontal']) }}
                        @include('proveedores.formulario')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
@endsection
