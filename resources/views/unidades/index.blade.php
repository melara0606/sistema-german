@extends('layouts.app')

@section('migasdepan')
    <h1>
        <small>Tipo de servicios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/unidades') }}"><i class="fa fa-dashboard"></i> Unidad administrativas</a></li>
        <li class="active">Listado de unidades</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado</h3>
                    <a href="{{ url('/unidades/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example2">
                        <thead>
                        <th>Id</th>
                        <th>Nombre de la unidad</th>
                        <th>Accion</th>
                        </thead>
                        <tbody>
                        @foreach($unidades as $unidad)
                            <tr>
                                <td>{{ $unidad->id }}</td>
                                <td>{{ $unidad->nombre_unidad }}</td>
                                <td>
                                    {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                        <a href="{{ url('unidades/'.$unidad->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="{{ url('/unidades/'.$unidad->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" onclick={{ "baja(".$unidad->id.",'unidades')" }}><span class="glyphicon glyphicon-trash"></span></button>
                                    {{ Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
