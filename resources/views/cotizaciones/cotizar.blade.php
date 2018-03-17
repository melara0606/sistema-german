@extends('layouts.app')

@section('migasdepan')
<h1>        
        <small>Proceso libre gestion <b>{{ $proyecto->nombre }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/cotizaciones') }}"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
        <li class="active">Ver</li>
      </ol>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Cuadro comparativo de ofertas </div>
                <div class="panel-body">

                        <div style="overflow-x:auto;">
                          <table rules="all" class="table table-bordered table-striped table-hover table-condensed" width="100%">
                            <tr>
                              <td>
                                <table rules="all" width="100%">
                                  <thead>
                                    <tr>
                                      <th colspan="3"><center><small>CONDICIONES</small></center></th>
                                    </tr>
                                    <tr>
                                      <th width="25%"><small>RUBRO</small></th>
                                      <th width="25%"><small>CANTIDAD</small></th>
                                      <th width="50%"><small>DESCRIPCIÓN</small></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($presupuesto->presupuestodetalle as $detalle)
                                      <tr>
                                        <td><small>Adquisic</small></td>
                                        <td><small>{{$detalle->cantidad}}</small></td>
                                        <td><small>{{$detalle->material}}</small></td> 
                                      </tr> 
                                    @endforeach                                      
                                  </tbody>
                                  <tfoot>
                                    <tr><th colspan="3"><small>Total de la oferta</small></th></tr>
                                    <tr><th colspan="3"><small>Plazo de la oferta</small></th></tr>
                                    <tr><th colspan="3"><small>Forma de pago</small></th></tr>
                                  </tfoot>
                                </table>
                              </td>
                              
                              @foreach($cotizaciones as $cotizacion)
                               <td>         
                                        
                                <table border="1px" width="100%" class="">
                                  <?php $total=0.0;?>
                                  <thead>
                                    <tr>
                                      <th heigth="5px" colspan="3">
                                        <center><small>OFERENTE: {{$cotizacion->proveedor->nombre}}</small></center>
                                      </th>
                                    </tr>
                                    <tr>
                                      <th width="50%"><small>MARCA</small></th>
                                      <th width="25%"><small>PRECIO</small></th>
                                      <th width="25%"><small>TOTAL</small></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($cotizacion->detallecotizacion as $detalle2)
                                    <?php
                                      $total=$total+$detalle2->cantidad*$detalle2->precio_unitario;
                                    ?>
                                      <tr>
                                        <td><small>{{$detalle2->marca}}</small></td>
                                        <td><small>${{number_format($detalle2->precio_unitario,2)}}</small></td>
                                        <td><small>${{number_format($detalle2->cantidad*$detalle2->precio_unitario,2)}}</small></td>
                                      </tr>
                                    @endforeach
                                  </tbody>   
                                  <tfoot>
                                    <tr>
                                      <th colspan="2"></th>
                                      <th><small>${{number_format($total,2)}}</small></th>
                                    </tr>
                                    <tr><th colspan="3"><small>Plazo de la oferta</small></th></tr>
                                    <tr><th colspan="3"><small>{{$cotizacion->descripcion}}</small></th></tr>
                                  </tfoot>  
                                </table>
                                </td>
                              @endforeach 

                          </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection