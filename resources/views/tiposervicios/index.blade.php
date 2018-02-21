@extends('layouts.app')

@section('migasdepan')
    <h1>
        <small>Tipo de servicios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/tiposervicios') }}"><i class="fa fa-dashboard"></i> Tipos de Servicio</a></li>
        <li class="active">Listado de servicios</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado</h3>
                    <a href="{{ url('/tiposervicios/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
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
                        @foreach($unidaddes as $unidad)
                            <tr>
                                <td>{{ $unidad->id }}</td>
                                <td>{{ $unidad->nombre }}</td>
                                <td>
                                    {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                        <a href="{{ url('tiposervicios/'.$unidad->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="{{ url('/tiposervicios/'.$unidad->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
                                    {{ Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <script>
                        function baja(id)
                        {
                            swal({
                                title: 'Motivo dar de baja',
                                input: 'text',
                                showCancelButton: true,
                                confirmButtonText: 'Dar de baja',
                                showLoaderOnConfirm: true,
                                preConfirm: function (text) {
                                    return new Promise(function (resolve, reject) {
                                        setTimeout(function() {
                                            if (text === '') {
                                                reject('Debe ingresar el motivo')
                                            } else {
                                                resolve()
                                            }
                                        }, 2000)
                                    })
                                },
                                allowOutsideClick: false
                            }).then(function (text) {
                                var dominio = window.location.host;
                                var form = $(this).parents('form');
                                $('#baja').attr('action','http://'+dominio+'/sisverapaz/public/tiposervicios/baja/'+id+'+'+text);
                                //document.getElmentById('baja').submit();
                                $('#baja').submit();
                                swal({
                                    type: 'success',
                                    title: 'Se dio de baja',
                                    html: 'Submitted motivo: ' + text
                                })
                            });
                        }

                        function alta(id)
                        {
                            swal({
                                title: 'Dar de alta',
                                showCancelButton: true,
                                confirmButtonText: 'Dar de alta',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: false
                            }).then(function () {
                                var dominio = window.location.host;
                                var form = $(this).parents('form');
                                $('#alta').attr('action','http://'+dominio+'/sisverapaz/public/tiposervicios/alta/'+id);
                                //document.getElmentById('baja').submit();
                                $('#alta').submit();
                                swal({
                                    type: 'success',
                                    title: 'Se dio de alta',
                                    html: 'Submitted motivo: '
                                })
                            });
                        }
                    </script>
                    <div class="pull-right">

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
