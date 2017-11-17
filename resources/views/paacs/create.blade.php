@extends('layouts.app')

@section('migasdepan')
    <h1>
        Rubro
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/proyectos') }}"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Registro</li>      </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro del plan anual de contratación</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'PaacController@store','class' => 'form-horizontal','id' => 'paac']) }}
                    @include('paacs.formulario')
                    @include('paacs.tabla')
                    <input type="hidden" name="total" id="total" readonly>
                    <input type="hidden" name="contador" id="contador" readonly>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span>    Registrar
                            </button>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('js/paac.js') !!}
@endsection
