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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('usuarios','UsuariosController@index');

Route::get('usuarios/registrar','UsuariosController@registro');

Route::get('usuarios/{id}', 'UsuariosController@buscar');

Route::post('usuarios/save','UsuariosController@save');

Route::put('usuarios/update','UsuariosController@update');

Route::get('usuarios/borrar/{id}','UsuariosController@borrar');

Route::put('usuarios/destoy','UsuariosController@destroy');
route::get('home/perfil','UsuariosController@perfil');
route::get('perfil/{id}','UsuariosController@modificarperfil');
Route::put('updateperfil','UsuariosController@updateperfil');

Route::Resource('bitacoras' , 'BitacoraController');

Route::delete('proveedores/restore/{id}','ProveedorController@restore')->name('proveedores.restore');
Route::get('proveedores/eliminados','ProveedorController@eliminados');
Route::Resource('proveedores','ProveedorController');

Route::delete('contratos/restore/{id}','ContratoController@restore')->name('contratos.restore');
Route::get('contratos/eliminados','ContratosController@eliminados');
Route::Resource('contratos','ContratosController');