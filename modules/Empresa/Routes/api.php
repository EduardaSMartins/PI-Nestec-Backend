<?php

use Illuminate\Support\Facades\Route;
use Modules\Empresa\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'cadastro', 'middleware' => ['api']], function () {
    Route::get('/', 'CadastroController@index')->name('cadastro.index');
    Route::post('/adicionar', 'CadastroController@store')->name('cadastro.post');
    Route::get('/buscar/{id}','CadastroController@show')->name('cadastro.find');
    Route::put('/atualizar/{id}', 'CadastroController@update')->name('cadastro.update');
});


Route::group(['prefix' => 'empresa', 'middleware' => ['api']], function () {
    Route::get('/', 'EmpresaController@index')->name('empresa.index');
    Route::post('/adicionar', 'EmpresaController@store')->name('empresa.post');
    Route::get('/buscar/{id}','EmpresaController@show')->name('empresa.find');
    Route::put('/atualizar/{id}', 'EmpresaController@update')->name('empresa.update');
});