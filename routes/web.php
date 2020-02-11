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

Route::get('/home/planta', 'PlantaController@index')->name('planta');
Route::get('/home/planta/create', 'PlantaController@create')->name('planta.create');
Route::post('/home/planta/store', 'PlantaController@store')->name('planta.store');
Route::get('/home/planta/edit/{id}', 'PlantaController@edit')->name('planta.edit');
Route::put('/home/planta/update/{id}', 'PlantaController@update')->name('planta.update');
Route::get('/home/planta/destroy/{id}', 'PlantaController@destroy')->name('planta.destroy');

Route::get('/home/sistema', 'SistemaController@index')->name('sistema');
Route::get('/home/sistema/create', 'SistemaController@create')->name('sistema.create');
Route::post('/home/sistema/store', 'SistemaController@store')->name('sistema.store');
Route::get('/home/sistema/edit/{id}', 'SistemaController@edit')->name('sistema.edit');
Route::put('/home/sistema/update/{id}', 'SistemaController@update')->name('sistema.update');
Route::get('/home/sistema/destroy/{id}', 'SistemaController@destroy')->name('sistema.destroy');
Route::post('/home/sistema/mostrar-sistemas', 'SistemaController@mostrar_sistemas')->name('sistema.mostrar-sistemas');

Route::get('/home/equipo', 'EquipoController@index')->name('equipo');
Route::get('/home/equipo/create', 'EquipoController@create')->name('equipo.create');
Route::post('/home/equipo/store', 'EquipoController@store')->name('equipo.store');
Route::get('/home/equipo/edit/{id}', 'EquipoController@edit')->name('equipo.edit');
Route::put('/home/equipo/update/{id}', 'EquipoController@update')->name('equipo.update');
Route::get('/home/equipo/destroy/{id}', 'EquipoController@destroy')->name('equipo.destroy');
Route::post('/home/equipo/mostrar-equipos', 'EquipoController@mostrar_equipos')->name('equipo.mostrar-equipos');

Route::get('/home/componente', 'ComponenteController@index')->name('componente');
Route::get('/home/componente/create', 'ComponenteController@create')->name('componente.create');
Route::post('/home/componente/store', 'ComponenteController@store')->name('componente.store');
Route::get('/home/componente/edit/{id}', 'ComponenteController@edit')->name('componente.edit');
Route::put('/home/componente/update/{id}', 'ComponenteController@update')->name('componente.update');
Route::get('/home/componente/destroy/{id}', 'ComponenteController@destroy')->name('componente.destroy');

Route::get('/home/lectura', 'LecturaController@index')->name('lectura');
Route::get('/home/lectura/{id}/show', 'LecturaController@show')->name('lectura.mostrar');
Route::post('/home/lectura/{id}/store', 'LecturaController@store')->name('lectura.store');
Route::post('/home/lectura/buscar', 'LecturaController@buscar')->name('lectura.buscar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
