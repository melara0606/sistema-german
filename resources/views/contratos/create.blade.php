@extends('layouts.app')

@section('migasdepan')
<h1>
        Contrato
        <small>Control de Contrato</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/contratos') }}"><i class="fa fa-dashboard"></i> Contrato</a></li>
        <li class="active">Registro</li>      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro de Contrato</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'ContratoController@store','class' => 'form-horizontal']) }}
                    {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}"> --}}
                        {{ csrf_field() }}

                        @include('contratos.formulario')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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