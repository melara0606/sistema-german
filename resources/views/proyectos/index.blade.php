@extends('layouts.app')

@section('migasdepan')
<h1>
        Proyectos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Listado de Proyectos</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              <div class="btn-group pull-right">
                <a href="{{ url('/proyectos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="{{ url('/proyectos') }}" class="btn btn-primary">Todos</a>
                <a href="{{ url('/proyectos?estado=1') }}" class="btn btn-primary">Aprobados</a>
                <a href="{{ url('/proyectos?estado=2') }}" class="btn btn-primary">Inactivos</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <th with="5%">N°</th>
                  <th with="20%">Nombre Proyecto</th>
                  <th with="10%">Monto</th>
                  <th with="25%">Dirección</th>
                  <th with="10%">Inicio</th>
                  <th with="10%">Fin</th>
                  <th with="10%">Estado</th>
                  <th with="10%">Accion</th>
                  <?php $contador=0; ?>
                </thead>
                <tbody>
                  @foreach($proyectos as $proyecto)
                  <tr>
                    <?php $contador++; ?>
                    <td>{{ $contador }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>${{ number_format($proyecto->monto,2) }}</td>
                    <td>{{ $proyecto->direccion }}</td>
                    <td>{{ $proyecto->fecha_inicio->format('d-m-Y') }}</td>
                    <td>{{ $proyecto->fecha_fin->format('d-m-Y') }}</td>
                    <td>
                      <span class="label-{{estilo_proyecto($proyecto->estado)}}">{{proyecto_estado($proyecto->estado)}}</span>
                    </td>
                    <td>
                      @if($estado == "")
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <div class="btn-group">
                          <a href="{{ url('proyectos/'.$proyecto->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                          @if($proyecto->estado == 1)
                          <a href="{{ url('presupuestos/crear/'.$proyecto->id) }}" class="btn btn-success btn-xs"><span class="fa fa-balance-scale"></span></a>
                        @elseif($proyecto->estado==3)
                          <a href="{{ url('solicitudcotizaciones/create') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-align-right"></span></a>
                        @endif
                          <a href="{{ url('proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$proyecto->id.",'proyectos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                        {{ Form::close()}}

                      @endif
                      @if($estado == 1)
                        {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                        <div class="btn-group">
                          <a href="{{ url('proyectos/'.$proyecto->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                          <a href="{{ url('presupuestos/crear/'.$proyecto->id) }}" class="btn btn-success btn-xs"><span class="fa fa-balance-scale"></span></a>
                          <a href="{{ url('proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$proyecto->id.",'proyectos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                        {{ Form::close()}}
                      @endif
                      @if($estado==2)
                        {{ Form::open(['method' => 'POST', 'id' => 'alta', 'class' => 'form-horizontal'])}}
                          <button class="btn btn-success btn-xs" type="button" onclick={{ "alta(".$proyecto->id.",'proyectos')" }}><span class="glyphicon glyphicon-trash"></span></button>
                        {{ Form::close()}}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>
@endsection
