<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesTesoreriaController extends Controller
{
    public function pagos($id)
    {
    	$pagos = \App\Pago::findorFile($id);
    	$tipo = "REPORTE DE PAGO DE IMPUESTOS";
    	$pdf = \PDF::loadView('pdf.tesoreria.pago',compact('pagos','tipo'));
    	$pdf->setPaper('letter','portrait');
    	return $pdf->stream('pagos.pdf');
    }
}
