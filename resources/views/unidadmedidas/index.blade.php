@extends('layouts.app')

@section('migasdepan')
<h1>
        Unidades de medida
        <small>Control de unidades de medida</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/unidadmedidas') }}"><i class="fa fa-dashboard"></i> Unidades de medida</a></li>
        <li class="active">Listado de unidades de medida</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/unidadmedidas/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Unidad de medida</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  @foreach($unidadmedidas as $unidadmedida)
                  <tr>
                    <td>{{ $unidadmedida->id }}</td>
                    <td>{{ $unidadmedida->nombre_medida }}</td>
                    <td>
                                {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                <a href="{{ url('unidadmedidas/'.$unidadmedida->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{ url('/unidadmedidas/'.$unidadmedida->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$unidadmedida->id.",'unidadmedidas')" }}><span class="glyphicon glyphicon-trash"></span></button>
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
