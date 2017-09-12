<?php use App\Bitacora;?>
@extends('layouts.app')

@section('migasdepan')
<h1>
        Bitacora
        <small>Control de bitacora</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/bitacoras') }}"><i class="fa fa-dashboard"></i> Bitacoras</a></li>
        <li class="active">Listado de bitacoras</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
  				<thead>
                  <th>ID</th>
                  <th>Fecha de actividad</th>
                  <th>Hora de la actividad</th>
                  <th>Accion</th>
                  <th>Usuario</th>
                  <th colspan="3">Accion</th>
                </thead>
                <tbody>
                	@foreach($bitacoras as $bitacora)
                	<tr>
                		<td>{{ $bitacora->id }}</td>
                		<td>{{ $bitacora->registro }}</td>
                		<td>{{ $bitacora->hora }}</td>
                		<td>{{ $bitacora->accion }}</td>
                    <?php 
                     $nombre= Bitacora::vernombre($bitacora->idusuario);
                    ?>
                    <td>{{ $nombre }}</td>
                		<td colspan="3">
                    <a href="{{ url('bitacora/'.$bitacora->id) }}" class="btn btn-primary">Ver</a>
                      
                      {{-- {!! link_to_route('proveedores.destroy', 'ELiminar', [$proveedor->id]) !!}
                			<a class="btn btn-primary" href ="{{ route('proveedores.destroy', $proveedor->id) }}" role="button" >Eliminar </a> --}}
                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
                 {{ $bitacoras->links() }} 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
