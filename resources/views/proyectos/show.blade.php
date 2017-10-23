@extends('layouts.app')

@section('migasdepan')
<h1>
        
        <small>Ver proyecto <b>{{ $proyecto->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proyectos') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos del Proveedor </div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre del Proyecto: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->nombre}}</label><br>
                            
                        </div>

                         <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <label for="monto" class="col-md-4 control-label">Monto del proyecto: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->monto}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección donde se ejecutará: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->direccion}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label for="fecha_inicio" class="col-md-4 control-label">Fecha inicio: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->fecha_inicio}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label for="fecha_fin" class="col-md-4 control-label">Fecha finalización: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->fecha_fin}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('id_organizacion') ? ' has-error' : '' }}">
                            <label for="id_organizacion" class="col-md-4 control-label">Organización colaboradora: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->id_organizacion}}</label><br>
                            
                        </div>

                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado: </label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->estado}}</label><br>
                           
                        </div>

                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label for="motivo" class="col-md-4 control-label">Motivo:</label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->motivo}}</label><br>
                            
                        </div>

                        <!--<div class="form-group{{ $errors->has('fechabaja') ? ' has-error' : '' }}">
                            <label for="fechabaja" class="col-md-4 control-label">Fecha baja:</label>
                            <label for="nombre" class="col-md-4 control-label">{{$proyecto->fechabaja}}</label><br>
                            
                        </div>-->

                      {{ Form::open(['route' => ['proyectos.destroy', $proyecto->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                      <a href="{{ url('/proyectos/'.$proyecto->id.'/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span> Editar</a> |
                        <button class="btn btn-danger" type="button" onclick="
                        return swal({
                          title: 'Eliminar proyecto',
                          text: '¿Está seguro de eliminar proyecto?',
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonText: 'Si, Eliminar',
                          cancelButtonText: 'No, Mantener',
                          confirmButtonClass: 'btn btn-danger',
                          cancelButtonClass: 'btn btn-default',
                          buttonsStyling: false
                        }).then(function(){
                          submit();
                          swal('Hecho', 'El registro a sido eliminado','success')
                        }, function(dismiss){
                          if(dismiss == 'cancel'){
                            swal('Cancelado', 'El registro se mantiene','info')
                          }
                        })";><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                      {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection