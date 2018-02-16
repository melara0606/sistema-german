@extends('layouts.app')

@section('migasdepan')
    <h1>
        <small>Tipo de cobros</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/tipocobros') }}"><i class="fa fa-dashboard"></i> Tipos de Cobro</a></li>
        <li class="active">Listado de cobros</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado</h3>
                    <a href="{{ url('/tipocobros/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example2">
                        <thead>
                        <th>Id</th>
                        <th>Nombre del cobro</th>
                        <th>Monto</th>
                        <th>Accion</th>
                        </thead>
                        <tbody>
                        @foreach($tipocobros as $tipocobro)
                            <tr>
                                <td>{{ $tipocobro->id }}</td>
                                <td>{{ $tipocobro->nombre_cobro }}</td>
                                <td>{{ $tipocobro->monto }}</td>
                                <td>
                                    {{ Form::open(['method' => 'POST', 'id' => 'baja', 'class' => 'form-horizontal'])}}
                                        <a href="{{ url('tipocobros/'.$tipocobro->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="{{ url('/tipocobros/'.$tipocobro->id.'/edit') }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-text-size"></span></a>
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
                                $('#baja').attr('action','http://'+dominio+'/sisverapaz/public/tipocobros/baja/'+id+'+'+text);
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
                                $('#alta').attr('action','http://'+dominio+'/sisverapaz/public/tipocobros/alta/'+id);
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
