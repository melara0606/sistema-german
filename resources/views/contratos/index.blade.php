@extends('layouts.app')

@section('migasdepan')
<h1>
        Contratos
        <small>Control de contratos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/contratos') }}"><i class="fa fa-dashboard"></i>Contratos</a></li>
        <li class="active">Listado de contratos</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/contratos/create') }}" class="btn btn-primary">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="{{ url('contratos/eliminados') }}" class="btn btn-warning">Ver eliminados</a> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
  				<thead>
                  <th>ID</th>
                  <th>Nombre de Contrato</th>
                  <th>Direción</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                	@foreach($contratos as $contrato)
                	<tr>
                		<td>{{ $contrato->id }}</td>
                		<td>{{ $contrato->nombree }}</td>
                		<td>{{ $contrato->direccion }}</td>
                		<td>{{ $contrato->emaile }}</td>
                    <td>{{ $contrato->telefonoe }}</td>
                    <td>{{ $contrato->nitempresa }}</td>
                		<td>
                    <a href="{{ url('contratos/'.$contrato->id) }}" class="btn btn-warning">Ver</a> |
                			<a href="{{ url('/contratos/'.$contratos->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                      {{ Form::open(['route' => ['contratos.destroy', $contrato->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                      {{ Form::close()}}
                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
                 {{ $contratos->links() }} 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
