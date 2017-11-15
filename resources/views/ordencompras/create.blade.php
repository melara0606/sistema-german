@extends('layouts.app')

@section('migasdepan')
    <h1>
        Rubro
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/cotizaciones') }}"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
        <li class="active">Registro</li>      </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Orden de compra</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'OrdencompraController@store','class' => 'form-horizontal']) }}
                    @include('ordencompras.formulario')
                    @include('ordencompras.cotizacion')

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span>    Registrar
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection