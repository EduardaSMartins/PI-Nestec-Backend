<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'cadastro', 'middleware' => ['api']], function () {
    Route::get('/', 'ClienteController@index')->name('cadastro.index');
    Route::get('/busca/{id}','ClienteController@show')->name('cadastro.find');
    Route::post('/adicionar', 'ClienteController@store')->name('cadastro.post');
    Route::put('/atualizar/{id}', 'ClienteController@update')->name('cadastro.update');
});