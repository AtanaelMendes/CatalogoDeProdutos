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
    return view('home');
});

Route::resource('/contato', 'ContatoController');
Route::resource('produtos', 'ProdutosController');

Route::post('produtos/buscar', 'ProdutosController@buscar');

Route::get('adicionar-produto', 'ProdutosController@create');
Route::get('produtos/{id}/editar', 'ProdutosController@edit');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
