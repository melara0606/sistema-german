@extends('layouts.app')

@section('migasdepan')
<h1>
Ver datos del proyecto:
        <small> <b>{{ $proyecto->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="{{ url('/proyectos') }}"><i class="fa fa-industry"></i> Proyectos</a></li>
        <li class="active">Ver proyecto</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del Proyecto </div>
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <td>Nombre del proyecto</td>
                      <td>{{$proyecto->nombre}}</td>
                    </tr>
                    <tr>
                      <td>Origen de los fondos:</td>
                      <td>
                        @foreach($proyecto->fondo as $fondo)
                        <tr>
                            <td>{{$fondo->fondocat->categoria}}</td>
                            <td>${{number_format($fondo->monto,2)}}</td>
                        </tr>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td>Monto total</td>
                      <td>${{number_format($proyecto->monto,2)}}</td>
                    </tr>
                    <tr>
                      <td>Dirección donde se ejecutará</td>
                      <td>{{$proyecto->direccion}}</td>
                    </tr>
                    <tr>
                      <td>Fecha de inicio</td>
                      <td>{{$proyecto->fecha_inicio->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                      <td>Fecha de finalización</td>
                      <td>{{$proyecto->fecha_fin->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                      <td>Motivo</td>
                      <td>{{$proyecto->motivo}}</td>
                    </tr>
                  </table>
                      <a href="{{ url('proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
