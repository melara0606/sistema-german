@extends('layouts.app')

@section('migasdepan')
<h1>
        Bitacora
        <small>Control de bitacora</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/bitacoras') }}"><i class="fa fa-dashboard"></i> Bitacoras</a></li>
        <li class="active">Listado de bitacoras</li>
      </ol>
@endsection

@section('content')
  <div class="row">
            <div class="panel-header">
              <h3 class="panel-title"></h3>
            </div>
              <div class="row">
                <div class="col-md-8">
                  {{ Form::open(['action' => 'BitacoraController@general', 'method' => 'GET'])}}
                  <label for="" class="cmbusuario control-label col-md-3">Empleado</label>
                  <label for="" class="txtdia control-label col-md-4">Fecha</label>
                  <div class="col-md-5">
                    <select class="cmbusuario form-control" id="cmbusuario"  name="usuario">
                      <option value="">Seleccione un usuario</option>
                      @foreach($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->empleado->nombre}}</option>
                      @endforeach
                    </select>
                    <input type="text" id="txtdia" name="dia" class="txtdia form-control">
                  </div>


                  <div class="col-md-3">
                      <label for="fecha_inicio" class="txtinicio control-label">Fecha de inicio</label>
                      {!!Form::text('inicio',null,['class'=>'txtinicio form-control','id'=>'txtinicio'])!!}
                  </div>
                  <div class="col-md-3">
                    <label for="fecha_fin" class="txtfin control-label">Fecha de finalización</label>
                      {!!Form::text('fin',null,['class'=>'txtfin form-control','id'=>'txtfin'])!!}
                  </div>
                </div>


              <div class="col-md-1">
                <button class="btn btn-primary" id="consultar" type="button">Consultar</button>
              </div>

              <div class="btn-group col-md-3 pull-right">
                <button onclick="busqueda('e');" class="btn" type="button">Empleado</button>
                <button onclick="busqueda('d');" class="btn" type="button">Día</button>
                <button onclick="busqueda('p');" class="btn" type="button">Periodo</button>
              </div>
              {{Form::close()}}
              {{Form::hidden('',$ultimo->registro->format('Y-m-d'),['id'=>'ultimo'])}}
              </div>

              <div class="panel-body">
                <table class="table table-hover" id="bitaco">
                   <thead>
                    <th>N°</th>
                    <th>Fecha de actividad</th>
                    <th>Hora de la actividad</th>
                    <th>Acción</th>
                    <th>Usuario</th>
                    <th>Opción</th>
                  </thead>
                  <tbody id="bita">
                    @foreach($bitacoras as $key => $bitacora)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ fechaCastellano($bitacora->registro) }}</td>
                      <td>{{ $bitacora->hora }}</td>
                      <td>{{ $bitacora->accion }}</td>
                      <td>{{ $bitacora->user->empleado->nombre}}</td>
                      <td>
                      <a href="{{ url('bitacora/'.$bitacora->id) }}" class="btn btn-primary">Ver</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

</div>

@endsection
@section("scripts")
{{Html::script('js/bitacora.js')}}
@endsection
