@extends('layouts.app')

@section('migasdepan')
  <h1>
   Ordenes de compras
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/ordencompras') }}"><i class="fa fa-dashboard"></i> Ordenes de compra</a></li>
    <li class="active">Ver listado</li>
  </ol>
@endsection
