@extends('pdf.plantilla')
@section('reporte')
@include('pdf.uaci.cabecera')
@include('pdf.uaci.pie')
  <div class="container">
      <div class="row">
          <div class="col-md-11">
              <div class="panel panel-primary">
                  <div class="panel-body">
                      <table width="100%" border="" rules="all">
                        <colgroup></colgroup>
                        <colgroup></colgroup>
                        <tbody>
                          <tr>
                            <td>Señores: <p></p> <b>{{$ordencompra->cotizacion->proveedor->nombre}}</b>
                              <p></p> NIT: <p></p> <b>{{$ordencompra->cotizacion->proveedor->nit}}</b>
                            </td>
                            <td>Orden N°: <b>{{$ordencompra->numero_orden}}</b>
                              <p></p> Solicitud N°: <b>{{$ordencompra->cotizacion->presupuestosolicitud->solicitudcotizacion->numero_solicitud}}</b>
                              <p></p> Fecha: <b>{{$ordencompra->created_at->format('d-m-Y')}}</b>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                      Ruego a ustedes se sirvan entregar de inmediato y en días hábiles, después de recibir la presente Orden de Compra, en las instalaciones de <b>Alcaldía Municipal de Verapaz, ubicada en C. Norberto Marroquín B° Mercedes Verapaz.</b>
                      <br>
                      <div class="table-responsive">
                        <table width="100%" border="1" rules="all">
                          <thead>
                            <tr>
                              <th width="5%">N°</th>
                              <th width="50%">DESCRIPCIÓN</th>
                              <th width="10%">UNIDAD DE MEDIDA</th>
                              <th width="10%">CANTIDAD</th>
                              <th width="10%">PRECIO UNITARIO</th>
                              <th width="15%">SUBTOTAL</th>
                              @php
                                $correlativo=0;
                                $total=0.0;
                              @endphp
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($ordencompra->cotizacion->detallecotizacion as $detalle)
                              <tr>
                                @php
                                  $correlativo++;
                                  $total=$total+$detalle->precio_unitario*$detalle->cantidad;
                                @endphp
                                <td><center>{{$correlativo}}</center></td>

                                <td>{{$detalle->descripcion}}</td>
                                <td><center>{{$detalle->unidad_medida}}</center> </td>
                                <td><center>{{$detalle->cantidad}}</center></td>
                                <td><p align="right">${{number_format($detalle->precio_unitario,2)}}</p> </td>
                                <td><p align="right">${{number_format($detalle->precio_unitario*$detalle->cantidad,2)}}</p> </td>
                              </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"><center> Total en letras: <b>{{numaletras($total)}}</b></center></td>
                              <th><p align="right">${{number_format($total,2)}}</p></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <br>
                      <table width="100%" border="" rules="all">
                        <tbody>
                          <tr>
                            <th>Observaciones</th>
                            <td>{{$ordencompra->observaciones}}</td>
                          </tr>
                          <tr>
                            <th>Lugar de entrega</th>
                            <td>{{$ordencompra->direccion_entrega}}</td>
                          </tr>
                          <tr>
                            <th>Condición de pago</th>
                            <td>{{$ordencompra->cotizacion->presupuestosolicitud->solicitudcotizacion->formapago->nombre}}</td>
                          </tr>
                          <tr>
                            <th width="40%">Fuente de financiamiento / Proyecto</th>
                            <td width="60%">
                              @foreach($ordencompra->cotizacion->presupuestosolicitud->presupuesto->proyecto->fondo as $fondos)
                                {{$fondos->fondocat->categoria}} / Contrapartida Municipal para
                              @endforeach
                              {{$ordencompra->cotizacion->presupuestosolicitud->presupuesto->proyecto->nombre}}
                            </td>
                          </tr>
                          <tr>
                            <th>Fecha de entrega de los productos o servicios</th>
                            <td>
                              @if($ordencompra->fecha_fin == "")
                              {{$orden->fecha_inicio->format('d-m-Y')}}
                            @else
                              Desde {{$ordencompra->fecha_inicio->format('l d')}} de {{$ordencompra->fecha_inicio->format('F')}} del {{$ordencompra->fecha_inicio->format('Y')}} al {{$ordencompra->fecha_fin->format('l d')}} de {{$ordencompra->fecha_fin->format('F')}} del {{$ordencompra->fecha_fin->format('Y')}}
                            @endif
                            </td>
                          </tr>
                        </tbody>
                      </table><p></p>

                      <table width="100%" border="" rules="all">
                        <tbody>
                          <tr>
                            <td>Autorizó
                              <p>TITULAR O DELEGADO. Firma y sello</p>
                            </td>
                            <td>Es conforme:
                              <p>SUMINISTRANTE. Firma y sello</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection