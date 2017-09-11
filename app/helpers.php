<?php
use App\Proveedor;
function cantprov()
{
	$proveedores = Proveedor::all();
	$count=$proveedores->count();
    return $count;
}
