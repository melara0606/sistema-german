@extends('layouts.app')

@section('migasdepan')
<h1>
        Proyectos
        <small>Modificar datos del proyecto {{ $proyecto->nombree }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proyectos') }}"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Edición</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Modificación de proyecto</div>
                <div class="panel-body">
                    {{ Form::model($proyectoto, array('method' => 'put', 'class' => 'form-horizontal' , 'route' => array('contratos.update', $contrato->id))) }} 
                    {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}"> --}}
                        {{ csrf_field() }}

                        @include('contratos.formulario')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>    Modificar
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
