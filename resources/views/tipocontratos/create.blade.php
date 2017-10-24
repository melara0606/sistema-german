@extends('layouts.app')

@section('migasdepan')
<h1>
        Tipos de contrato
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/tipocontratos') }}"><i class="fa fa-dashboard"></i> Tipos de contrato</a></li>
        <li class="active">Registro</li>      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(['action' => 'TipocontratoController@store','class' => 'form-horizontal']) }}
                        {{ Form::hidden('estado',1) }}
                        @include('tipocontratos.formulario')

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