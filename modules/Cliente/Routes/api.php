<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'cliente', 'middleware' => ['api']], function () {
    Route::post('/adicionar', 'ClienteController@store')->name('cliente.post');
    Route::get('/buscar/{id}','ClienteController@show')->name('cliente.find');
    Route::put('/atualizar/{id}', 'ClienteController@update')->name('cliente.update');
});