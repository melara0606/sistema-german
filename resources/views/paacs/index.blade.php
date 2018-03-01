@extends('layouts.app')

@section('migasdepan')
<h1>
        Plan anual de compras
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li class="active">Plan anual</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/paacs/crear') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
          <thead>
                  <th>Id</th>
                  <th>Año</th>
                  <th>descripcion</th>
                  <th>total</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                  @foreach($paacs as $paac)
                  <tr>
                    <td>{{ $paac->id }}</td>
                    <td>{{ $paac->anio }}</td>
                    <td>{{ $paac->descripcion }}</td>
                    <td>$ {{ $paac->total }}</td>
                    <td>
                      <a href="{{ url('paacs/'.$paac->id) }}" class="btn btn-primary">Ver detalle</a>
                      <a href="{{ url('paacs/'.$paac->id.'/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-text-size"></span></a>
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
