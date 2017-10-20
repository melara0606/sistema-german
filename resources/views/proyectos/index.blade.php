@extends('layouts.app')

@section('migasdepan')
<h1>
        Proyectos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/proyectos') }}"><i class="fa fa-dashboard"></i>Proyectos</a></li>
        <li class="active">Listado de proyectos</li>
      </ol>
@endsection

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado</h3>
              	<a href="{{ url('/proyectos/create') }}" class="btn btn-primary">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="{{ url('proyectos/eliminados') }}" class="btn btn-warning">Ver eliminados</a> 
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
                	@foreach($proyectos as $proyecto)
                	<tr>
                		<td>{{ $proyecto->id }}</td>
                		<td>{{ $proyecto->nombree }}</td>
                		<td>{{ $proyecto->direccion }}</td>
                		<td>{{ $proyecto->emaile }}</td>
                    <td>{{ $proyecto->telefonoe }}</td>
                    <td>{{ $proyecto->nitempresa }}</td>
                		<td>
                    <a href="{{ url('proyectos/'.$proyecto->id) }}" class="btn btn-warning">Ver</a> |
                			<a href="{{ url('/proyectos/'.$proyectos->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                      {{ Form::open(['route' => ['proyectos.destroy', $proyecto->id ], 'method' => 'DELETE', 'class' => 'form-horizontal'])}}
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                      {{ Form::close()}}
                    </td>
                	</tr>
                	@endforeach 
                </tbody>
              </table>
                 {{ $proyectos->links() }} 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endsection
