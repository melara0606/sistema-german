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
    //$users=DB::select('select * from users');
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuarios','UsuariosController@index')->middleware('Admin');
Route::get('usuarios/registrar','UsuariosController@registro')->middleware('Admin');
Route::get('usuarios/{id}', 'UsuariosController@buscar')->middleware('Admin');
Route::post('usuarios/save','UsuariosController@save')->middleware('Admin');
Route::put('usuarios/update','UsuariosController@update')->middleware('Admin');
Route::get('usuarios/borrar/{id}','UsuariosController@borrar')->middleware('Admin');
Route::put('usuarios/destoy','UsuariosController@destroy')->middleware('Admin');

route::get('home/perfil','UsuariosController@perfil');
route::get('perfil/{id}','UsuariosController@modificarperfil');
Route::put('updateperfil','UsuariosController@updateperfil');

//Route::Resource('bitacoras' , 'BitacoraController');
Route::get('bitacoras','BitacoraController@index');
Route::get('bitacoras/general','BitacoraController@general');
Route::get('bitacoras/usuario','BitacoraController@usuario');

Route::delete('proveedores/restore/{id}','ProveedorController@restore')->name('proveedores.restore');
Route::get('proveedores/eliminados','ProveedorController@eliminados');
Route::Resource('proveedores','ProveedorController');

/*Route::delete('contratos/restore/{id}','ContratoController@restore')->name('contratos.restore');
Route::get('contratos/eliminados','ContratosController@eliminados');
Route::Resource('contratos','ContratosController');*/