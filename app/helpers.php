<?php
function cantprov()
{
	$proveedores = App\Proveedor::all();
	$count=$proveedores->count();
    return $count;
}
