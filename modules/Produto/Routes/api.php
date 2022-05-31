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

Route::group(['prefix' => 'produto', 'middleware' => ['api']], function () {
    Route::get('/', 'ProdutoController@index')->name('produto.index');
    Route::get('/buscar/{id}','ProdutoController@show')->name('produto.find');
    Route::post('/adicionar', 'ProdutoController@store')->name('produto.post');
    Route::put('/atualizar/{id}', 'ProdutoController@update')->name('produto.update');
});



//Pessoa
Route::group(['prefix' => 'pessoa', 'middleware' => ['api.apoema']], function () {
    Route::get('/', 'Tb1007Controller@index')->name('pessoa.view');
    Route::get('/busca/{id}','Tb1007Controller@show')->name('pessoa.find');
    Route::post('/adicionar', 'Tb1007Controller@store')->name('pessoa.post');
    Route::put('/atualizar/{id}', 'Tb1007Controller@update')->name('pessoa.update');
    Route::delete('/remover/{id}', 'Tb1007Controller@destroy')->name('pessoa.delete');
});
