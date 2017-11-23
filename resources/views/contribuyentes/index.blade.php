@extends('layouts.app')

@section('migasdepan')
<h1>
        Contribuyentes

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/contribuyentes') }}"><i class="fa fa-dashboard"></i> Contribuyentes</a></li>
        <li class="active">Listado de contribuyentes</li>
      </ol>
@endsection

@section('content')

<div class="col-xs-12">
    <div class="row">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/contribuyentes/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                <a href="{{ url('/contribuyentes?estado=1') }}" class="btn btn-primary">Activos</a>
                <a href="{{ url('/contribuyentes?estado=2') }}" class="btn btn-primary">Papelera</a>
                </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              @if($estado == 1 || $estado == 0)
              @include('contribuyentes.tabla1')
              @else
              @include('contribuyentes.tabla2')
              @endif
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
                            $('#baja').attr('action','http://'+dominio+'/sisverapaz/public/contribuyentes/baja/'+id+'+'+text);
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
                            $('#alta').attr('action','http://'+dominio+'/sisverapaz/public/contribuyentes/alta/'+id);
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
              {{-- !!}  {!! str_replace('/?','?', $contribuyentes->appends(Request::only(['nombre','estado']))->render()) !!} --}}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</div>


@endsection
