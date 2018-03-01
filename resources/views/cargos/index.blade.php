@extends('layouts.app')

@section('migasdepan')
<h1>
        Cargos
        <small>Control de cargos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/cargos') }}"><i class="fa fa-dashboard"></i> Cargos</a></li>
        <li class="active">Listado de cargos</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/cargos/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Cargo</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  @foreach($cargos as $cargo)
                  <tr>
                    <td>{{ $cargo->id }}</td>
                    <td>{{ $cargo->cargo }}</td>
                    <td>
                                {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                <a href="{{ url('cargos/'.$cargo->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{ url('/cargos/'.$cargo->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                <button class="btn btn-danger btn-xs" type="button" onclick={{ "baja(".$cargo->id.",'cargos')" }}><span class="glyphicon glyphicon-trash"></span></button>
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
