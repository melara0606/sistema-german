<?php
use App\Bitacora;
use App\Presupuesto;
use App\Cargo;

function invertir_fecha($fecha)
{
	$inicio = $fecha; //dd-mm-yy
    $invert = explode("-",$inicio);
    $nueva = $invert[2]."-".$invert[1]."-".$invert[0];
    return $nueva;
}

function cantprov()
{
	$proveedores = App\Proveedor::all()->where('estado',1);
	$count=$proveedores->count();
    return $count;
}

function empleado_prestamo($id)
{
	$empleado=App\Empleado::where('id',$id)->first();
	$nombre=$empleado->nombre;
	return $nombre;
}

function nombre_proyecto($id)
{
	$proyecto = App\Proyecto::where('id',$id)->first();
	return $proyecto->nombre;
}

function cantcontri()
{
    $contribuyentes = App\Contribuyente::all()->where('estado',1);
    $count=$contribuyentes->count();
    return $count;
}

function prestamos($id)
{
	$prestamo = App\Prestamo::where('empleado_id',$id)->first();
	dd($prestamo->monto);
	$monto = $prestamo->monto;
	return $monto;
}

function bitacora($accion)
{

	$bitacora = new Bitacora;
	$bitacora->registro = date('Y-m-d');
	$bitacora->hora = date('H:i:s');
	$bitacora->accion = $accion;
	$bitacora->user_id = Auth()->user()->id;
	$bitacora->save();
}

function usuario($id)
{
	$empleado = App\Empleado::where('id',$id)->first();
	return $empleado->nombre;
}

function vercargo($cargo)
{
	switch ($cargo) {
		case '1':
			return 'Administrador';
			break;
		case '2':
			return 'Jefe UACI';
			break;
		case '3':
			return 'Jefe Tesorería';
				break;
		case '4':
			return 'Jefe Registro y Control Tributario';
			break;
		case '5':
			return 'Colecturía';
			break;
		default:

			break;
	}
}

function presupuesto($proyecto_id)
{
	$presupuesto = App\Presupuesto::all()->where('proyecto_id',$proyecto_id);
	$count=$presupuesto->count();
    return $count;
}
