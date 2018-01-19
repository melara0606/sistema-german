@extends('layouts.app')

@section('migasdepan')
<h1>
	Registro de cuentas
</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/cuentas') }}"><i class="fa fa-dashboard"></i>Catalogo</a></li>
	<li class="active">Registro</li> </ol>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1" >
			<div class="panel panel-primary">
				<div class="panel-heading">Administrar retenciones</div>
				<div class="panel-body">
          @if($retencion != null)
            {{ Form::model($retencion, array('method' => 'put', 'class' => 'form-horizontal' , 'route' => array('retenciones.update', $retencion->id))) }}
            @include('retenciones.formulario')
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-floppy-disk">Modificar</span>
                </button>
              </div>
            </div>
            {{ Form::close() }}
          @else
            {{ Form::open(['action'=> 'RetencionController@store', 'class' => 'form-horizontal']) }}
            @include('retenciones.formulario')
            <div class="form-group">
  						<div class="col-md-6 col-md-offset-4">
  							<button type="submit" class="btn btn-success">
  								<span class="glyphicon glyphicon-floppy-disk">Registrar</span>
  							</button>
  						</div>
  					</div>
            {{ Form::close() }}
          @endif


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
