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

Route::get('/medicos', 'MedicosController@index')
    ->name('medicos.index');

Route::post('/medicos', 'MedicosController@store');

Route::get('/especialidades', 'EspecialidadesController@index')
    ->name('especialidades.index');

Route::get('/medicos/cadastrar', 'MedicosController@create')
    ->name('form_cadastrar_medico');

Route::get('/medicos/cadastrar_especialidade', 'EspecialidadesController@create')
    ->name('form_cadastrar_especialidade');

Route::post('/medicos/cadastrar', 'MedicosController@store');

Route::post('/medicos/cadastrar_especialidade', 'EspecialidadesController@store');

Route::post('/medicos/remover/{id}', 'MedicosController@destroy');

Route::get('medicos/modal', 'MedicosControler@modal');