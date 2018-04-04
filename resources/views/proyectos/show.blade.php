@extends('layouts.app')

@section('migasdepan')
<h1>Ver datos del proyecto:</h1>
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
                      <th>Nombre del proyecto</th>
                      <th>{{$proyecto->nombre}}</th>
                    </tr>
                    <tr>
                      <th>Justificación</th>
                      <th>{{$proyecto->motivo}}</th>
                    </tr>
                    <tr>
                      <th>Dirección donde se ejecutará</th>
                      <th>{{$proyecto->direccion}}</th>
                    </tr>
                    <tr>
                      <th>Origen de los fondos:</th>
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
                      <th>Monto total</th>
                      <th>${{number_format($proyecto->monto,2)}}</th>
                    </tr>
                    <tr>
                      <th>Fecha de inicio</th>
                      <th>{{$proyecto->fecha_inicio->format('l d, F Y')}}</th>
                    </tr>
                    <tr>
                      <th>Fecha de finalización</th>
                      <th>{{$proyecto->fecha_fin->format('l d, F Y')}}</th>
                    </tr>
                    <tr>
                      <th>Beneficiarios</th>
                      <th>{{$proyecto->beneficiarios}}</th>
                    </tr>
                  </table>
                      <a href="{{ url('proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
