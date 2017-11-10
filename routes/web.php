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


/*Route::get('/', function () {
    return view('auth.login');
});
*/


Auth::routes();

Route::post('authenticate','Auth\loginController@authenticate')->name('authenticate');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('usuarios/baja/{id}','UsuarioController@baja')->name('usuarios.baja');
Route::post('usuarios/alta/{id}','UsuarioController@alta')->name('usuarios.alta');
Route::Resource('usuarios','UsuarioController');


route::get('home/perfil','UsuarioController@perfil');
route::get('perfil/{id}','UsuarioController@modificarperfil');
Route::put('updateperfil','UsuarioController@updateperfil');
Route::get('avatar','UsuarioController@avatar');
Route::post('usuarios/updateprofile', 'UsuarioController@actualizaravatar');

//Route::Resource('bitacoras' , 'BitacoraController');
Route::get('bitacoras','BitacoraController@index');
Route::get('bitacoras/general','BitacoraController@general');
Route::get('bitacoras/usuario','BitacoraController@usuario');
Route::get('bitacoras/fecha','BitacoraController@fecha');

Route::post('proveedores/baja/{id}','ProveedorController@baja')->name('proveedores.baja');
Route::post('proveedores/alta/{id}','ProveedorController@alta')->name('proveedores.alta');
Route::Resource('proveedores','ProveedorController');

Route::post('contribuyentes/baja/{id}','ContribuyenteController@baja')->name('contribuyentes.baja');
Route::post('contribuyentes/alta/{id}','ContribuyenteController@alta')->name('contribuyentes.alta');
Route::get('contribuyentes/eliminados','ContribuyenteController@eliminados');
Route::Resource('contribuyentes','ContribuyenteController');

Route::post('contratos/baja/{id}','ContratoController@alta')->name('contratos.alta');
Route::post('contratos/alta/{id}','ContratoController@baja')->name('contratos.baja');
Route::Resource('contratos','ContratoController');

Route::post('proyectos/baja/{id}','ProyectoController@baja')->name('proyectos.baja');
Route::post('proyectos/alta/{id}','ProyectoController@alta')->name('proyectos.alta');
Route::Resource('proyectos','ProyectoController');

Route::post('tipocontratos/baja/{id}','TipocontratoController@baja')->name('tipocontratos.baja');
Route::post('tipocontratos/alta/{id}','TipocontratoController@alta')->name('tipocontratos.alta');
Route::Resource('tipocontratos','TipocontratoController');

Route::Resource('tiposervicios','TiposervicioController');
Route::post('impuestos/baja/{id}','impuestoController@baja')->name('impuestos.baja');
Route::post('impuestos/alta/{id}','ImpuestoController@alta')->name('impuestos.alta');
Route::Resource('impuestos','ImpuestoController');

Route::post('rubros/baja/{id}','RubroController@baja')->name('rubros.baja');
Route::post('rubros/alta/{id}','RubroController@alta')->name('rubros.alta');
Route::Resource('rubros','RubroController');

Route::post('inmuebles/baja/{id}','InmuebleController@baja')->name('inmuebles.baja');
Route::post('inmuebles/alta/{id}','InmuebleController@alta')->name('inmuebles.alta');
Route::Resource('inmuebles','InmuebleController');

Route::post('cotizaciones/baja/{id}','CotizacionController@baja')->name('cotizaciones.baja');
Route::post('cotizaciones/alta/{id}','CotizacionController@alta')->name('cotizaciones.alta');
Route::Resource('cotizaciones','CotizacionController');