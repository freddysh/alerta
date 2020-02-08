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
    return view('welcome');
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
