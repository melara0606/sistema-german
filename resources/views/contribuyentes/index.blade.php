@extends('layouts.app')

@section('migasdepan')
<h1>
        Contribuyentes

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/contribuyentes') }}"><i class="fa fa-dashboard"></i> Contribuyentes</a></li>
        <li class="active">Listado de contribuyentes</li>
      </ol>
@endsection

@section('content')

<div class="col-xs-12">
    <div class="row">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/contribuyentes/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/contribuyentes?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/contribuyentes?estado=2') }}" class="btn btn-primary">Papelera</a>
                </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              @if($estado == 1 || $estado == 0)
              @include('contribuyentes.tabla1')
              @else
              @include('contribuyentes.tabla2')
              @endif
              
              <div class="pull-right">
              {{-- !!}  {!! str_replace('/?','?', $contribuyentes->appends(Request::only(['nombre','estado']))->render()) !!} --}}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</div>


@endsection
