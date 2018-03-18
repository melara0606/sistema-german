@extends('layouts.app')

@section('migasdepan')
<h1>
        Cuentas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Listado de cuenta</li>
      </ol>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
                <a href="{{ url('/cuentas/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/cuentas?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/cuentas?estado=2') }}" class="btn btn-primary">Papelera</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                  <tr>
                    <th>Numero de la cuenta</th>
                    <th>Nombre del proyecto</th>
                    <th>Banco</th>
                    <th>fecha de apertura</th>
                    <th>Monto inicial</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cuentas as $cuenta)
                  <tr>
                    <td>{{ $cuenta->numero_cuenta }}</td>
                    <td>{{ $cuenta->proyecto->nombre }}</td>
                    <td>{{ $cuenta->banco }}</td>
                    <td>{{ $cuenta->created_at->format('d-m-Y') }}</td>
                    <td>$ {{ number_format($cuenta->monto_inicial) }}</td>
                    <td>
                      <a href="{{url('cuentas/'.$cuenta->id.'/edit')}}" class="btn btn-warning">Editar</a>
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
