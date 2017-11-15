@extends('layouts.app')

@section('migasdepan')
<h1>
        Detalle
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/detallecotizaciones') }}"><i class="fa fa-dashboard"></i> Detalles</a></li>
        <li class="active">Registro</li>      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(['action' => 'DetallecotizacionController@store','class' => 'form-horizontal']) }}
                        @include('detallecotizaciones.formulario')

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