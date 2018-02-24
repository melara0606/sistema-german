@extends('layouts.app')

@section('migasdepan')
<h1>
	Calendarización
</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/calendarizaciones') }}"><i class="fa fa-dashboard"></i>Calendarización</a></li>
	<li class="active">Registro</li> </ol>
	{{ Form::open(['action'=> 'CalendarizacionController@store', 'class' => 'form-horizontal']) }}
@endsection

@section('content')
	@include('calendarizaciones.modal')

	{{ Form::close() }}

<div id="calendario">
	
</div>
@endsection
@section('scripts')
{{Html::script('js/calendarizacion.js')}}
@endsection