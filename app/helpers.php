<?php
use App\Bitacora;
use App\Cargo;
function cantprov()
{
	$proveedores = App\Proveedor::all();
	$count=$proveedores->count();
    return $count;
}

function bitacora($accion)
{
	
	$bitacora = new Bitacora;
	$bitacora->registro = date('Y-m-d');
	$bitacora->hora = date('H:i:s');
	$bitacora->accion = $accion;
	$bitacora->idusuario = Auth()->user()->id;
	$bitacora->save();
}


