@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Respaldos</h3>
                <div class="btn-group pull-right">
                  <a href="{{ route('backup.create') }}" class="btn btn-primary pull-right"><i
                    class="fa fa-plus"></i> Crear nuevo respaldo
                  </a>
                </div>
            </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                @if (count($respaldos))

                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                       <th>N°</th>
                        <th>Archivo</th>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha de creación</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($respaldos as $key => $respaldo)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$respaldo['directorio']}}</td>
                          <td>{{$respaldo['nombre']}}</td>
                          <td>{{tamaniohumano($respaldo['tamanio'])}}</td>
                          <td>{{fechaCastellano(date ("Y-m-d", $respaldo['fecha']))}}, {{date ("H:i:s.", $respaldo['fecha'])}}</td>
                          <td>
                            <div class="btn-group">
                              <a href="{{ url('backups/restaurar/'.$respaldo['nombre']) }}" class="btn btn-primary btn-xs"><i class="fa fa-upload"></i></a>
                              <a href="{{ url('backups/descargar/'.$respaldo['nombre']) }}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
                              <a href="{{ url('backups/eliminar/'.$respaldo['nombre']) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>No existen respaldos</h4>
                </div>
            @endif
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
  </div>
@endsection
