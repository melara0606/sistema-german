<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $users=\App\User::all()->count();
        if($users==0){
            return view('auth/register');

        }else{
            return view('auth/login');
        }
});

Route::get('pdf',function(){
	$usuarios = \App\Proveedor::where('estado',1)->get();
  $unidad = "Unidad de Adquicisiones Institucionales";
  $pdf = \PDF::loadView('pdf.pdf',compact('usuarios','unidad'));
  $pdf->setPaper('letter', 'portrait');
  //$canvas = $pdf ->get_canvas();
//$canvas->page_text(0, 0, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
  return $pdf->stream('reporte.pdf');
});



Auth::routes();

Route::post('authenticate','Auth\loginController@authenticate')->name('authenticate');

Route::get('/home', 'HomeController@index')->name('home');
//administrador
Route::post('usuarios/baja/{id}','UsuarioController@baja')->name('usuarios.baja');
Route::post('usuarios/alta/{id}','UsuarioController@alta')->name('usuarios.alta');
Route::Resource('usuarios','UsuarioController');

//Route::Resource('bitacoras' , 'BitacoraController');
Route::get('bitacoras','BitacoraController@index');
Route::get('bitacoras/general','BitacoraController@general');
Route::get('bitacoras/usuario','BitacoraController@usuario');
Route::get('bitacoras/fecha','BitacoraController@fecha');

//Perfil de usuario
route::get('home/perfil','UsuarioController@perfil');
route::get('perfil/{id}','UsuarioController@modificarperfil');
Route::put('updateperfil','UsuarioController@updateperfil');
Route::get('avatar','UsuarioController@avatar');
Route::post('usuarios/updateprofile', 'UsuarioController@actualizaravatar');


//////////////////////////////////// UACI /////////////////////////////////////////////////////
Route::post('proveedores/baja/{id}','ProveedorController@baja')->name('proveedores.baja');
Route::post('proveedores/alta/{id}','ProveedorController@alta')->name('proveedores.alta');
Route::Resource('proveedores','ProveedorController');

Route::post('contratos/baja/{id}','ContratoController@alta')->name('contratos.alta');
Route::post('contratos/alta/{id}','ContratoController@baja')->name('contratos.baja');
Route::get('contratos/listarempleados','ContratoController@listarEmpleados');
Route::get('contratos/listartipos','ContratoController@listarTipos');
Route::get('contratos/listarcargos','ContratoController@listarCargos');
Route::post('contratos/guardartipo','ContratoController@guardarTipo');
Route::post('contratos/guardarcargo','ContratoController@guardarCargo');
Route::post('contratos/guardarempleado','ContratoController@guardarEmpleado');
Route::Resource('contratos','ContratoController');

Route::post('proyectos/baja/{id}','ProyectoController@baja')->name('proyectos.baja');
Route::post('proyectos/alta/{id}','ProyectoController@alta')->name('proyectos.alta');
Route::get('proyectos/listarorganizaciones','ProyectoController@listarOrganizaciones');
Route::post('proyectos/guardarorganizacion','ProyectoController@guardarOrganizacion');
Route::get('proyectos/listarfondos','ProyectoController@listarFondos');
Route::post('proyectos/guardarcategoria','ProyectoController@guardarCategoria');
Route::get('proyectos/getMontos/{id}','ProyectoController@getMontos');
Route::delete('proyectos/deleteMonto/{id}','ProyectoController@deleteMonto');
Route::post('proyectos/addMonto','ProyectoController@addMonto');
Route::Resource('proyectos','ProyectoController');

Route::post('tipocontratos/baja/{id}','TipocontratoController@baja')->name('tipocontratos.baja');
Route::post('tipocontratos/alta/{id}','TipocontratoController@alta')->name('tipocontratos.alta');
Route::Resource('tipocontratos','TipocontratoController');

Route::post('ordencompras/baja/{id}','OrdencompraController@baja')->name('ordencompras.baja');
Route::post('ordencompras/alta/{id}','OrdencompraController@alta')->name('ordencompras.alta');
Route::get('ordencompras/cotizaciones/{id}','OrdencompraController@getCotizacion');
Route::get('ordencompras/montos/{id}','OrdencompraController@getMonto');
Route::Resource('ordencompras','OrdencompraController');

Route::get('presupuestos/crear/{id}','PresupuestoController@crear');
Route::get('presupuestos/getcategorias','PresupuestoController@getCategorias');
Route::post('presupuestos/guardarcategoria','PresupuestoController@guardarCategoria');
Route::get('presupuestos/getcatalogo','PresupuestoController@getCatalogo');
Route::post('presupuestos/guardardescripcion','PresupuestoController@guardarDescripcion');
Route::Resource('presupuestos','PresupuestoController');

Route::get('cotizaciones/ver/cuadros','CotizacionController@cuadros');
Route::get('cotizaciones/ver/{id}', 'CotizacionController@cotizar');
Route::post('cotizaciones/seleccionar','CotizacionController@seleccionar');
Route::post('cotizaciones/baja/{id}','CotizacionController@baja')->name('cotizaciones.baja');
Route::post('cotizaciones/alta/{id}','CotizacionController@alta')->name('cotizaciones.alta');
Route::get('cotizaciones/realizarcotizacion/{id}','CotizacionController@realizarCotizacion');
Route::Resource('cotizaciones','CotizacionController');

Route::get('paacs/crear','PaacController@crear');
route::post('paacs/guardar','PaacController@guardar');
Route::Resource('paacs','PaacController');
Route::Resource('paacdetalles','PaacdetalleController');

Route::Resource('detallecotizaciones','DetallecotizacionController');

Route::post('formapagos/baja/{id}','FormapagoController@baja')->name('formapagos.baja');
Route::post('formapagos/alta/{id}','FormapagoController@alta')->name('formapagos.alta');
Route::Resource('formapagos','FormapagoController');

Route::post('solicitudcotizaciones/baja/{id}','SolicitudcotizacionController@baja')->name('solicitudcotizaciones.baja');
Route::post('solicitudcotizaciones/alta/{id}','SolicitudcotizacionController@alta')->name('solicitudcotizaciones.alta');
Route::get('solicitudcotizaciones/getcategorias/{id}','SolicitudcotizacionController@getCategorias');
Route::get('solicitudcotizaciones/getpresupuesto/{id}','SolicitudcotizacionController@getPresupuesto');
Route::Resource('solicitudcotizaciones','SolicitudcotizacionController');

Route::Resource('requisiciones','RequisicionController');
Route::get('requisiciondetalles/create/{id}','RequisiciondetalleController@create');
Route::Resource('requisiciondetalles','RequisiciondetalleController');

Route::Resource('organizaciones','OrganizacionController');
Route::Resource('calendarizaciones','CalendarizacionController');

////////////////triburario /////////////////////////////////////////////////////////////////////////
Route::post('contribuyentes/baja/{id}','ContribuyenteController@baja')->name('contribuyentes.baja');
Route::post('contribuyentes/alta/{id}','ContribuyenteController@alta')->name('contribuyentes.alta');
Route::get('contribuyentes/eliminados','ContribuyenteController@eliminados');
Route::Resource('contribuyentes','ContribuyenteController');

Route::Resource('tiposervicios','TiposervicioController');
Route::post('impuestos/baja/{id}','impuestoController@baja')->name('impuestos.baja');
Route::post('impuestos/alta/{id}','ImpuestoController@alta')->name('impuestos.alta');
Route::Resource('impuestos','ImpuestoController');

Route::post('rubros/baja/{id}','RubroController@baja')->name('rubros.baja');
Route::post('rubros/alta/{id}','RubroController@alta')->name('rubros.alta');
Route::Resource('rubros','RubroController');

Route::Resource('negocios','NegocioController');

Route::post('inmuebles/baja/{id}','InmuebleController@baja')->name('inmuebles.baja');
Route::post('inmuebles/alta/{id}','InmuebleController@alta')->name('inmuebles.alta');
Route::Resource('inmuebles','InmuebleController');

Route::Resource('construcciones','ConstruccionController');

////////// Tesoreria //////////////////////////////////
Route::Resource('empleados','EmpleadoController');

Route::Resource('retenciones','RetencionController');

Route::Resource('planillas','PlanillaController');
Route::Resource('prestamos','PrestamoController');

Route::Resource('cargos','CargoController');

Route::Resource('cuentas','CuentaController');
Route::Resource('cuentaprincipal','CuentaprincipalController');

Route::Resource('tipopagos','TipopagoController');

Route::Resource('pagos','PagoController');

Route::Resource('tipopagos', 'TipopagoController');








































Route::Resource('unidades','UnidadAdminController');
Route::Resource('presupuestounidades','PresupuestoUnidadController');



/**
 * Rutas para el mapa
*/

Route::get('negocio/mapa/{id}', 'NegocioController@viewMapa');
Route::post('negocio/mapa/create', 'NegocioController@mapas');
Route::get('mapa', 'NegocioController@mapa');
Route::post('mapa/all', 'NegocioController@mapasAll');
