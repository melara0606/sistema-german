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

