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
    return view('index');
});

//categoria
Route::get('Categoria', ['as' => 'categoria.get_view', 'uses' => 'CategoriaController@GetView']);
Route::post('CategoriaInsert', ['as' => 'categoria.insert', 'uses' => 'CategoriaController@Insert']);
Route::post('CategoriaUpdate/{id?}', ['as' => 'categoria.update', 'uses' => 'CategoriaController@Update']);
Route::post('CategoriaDelete/{id?}', ['as' => 'categoria.delete', 'uses' => 'CategoriaController@Delete']);
Route::post('CategoriaDataGrid', ['as' => 'categoria.data_grid', 'uses' => 'CategoriaController@DataGrid']);

//produto
Route::get('Produto', ['as' => 'produto.get_view', 'uses' => 'ProdutoController@GetView']);
Route::post('ProdutoInsert', ['as' => 'produto.insert', 'uses' => 'ProdutoController@Insert']);
Route::post('ProdutoUpdate/{id?}', ['as' => 'produto.update', 'uses' => 'ProdutoController@Update']);
Route::post('ProdutoDelete/{id?}', ['as' => 'produto.delete', 'uses' => 'ProdutoController@Delete']);
Route::post('ProdutoDataGrid', ['as' => 'produto.data_grid', 'uses' => 'ProdutoController@DataGrid']);
Route::post('ProdutoGetCategoria', ['as' => 'produto.get_categoria', 'uses' => 'ProdutoController@GetCategoria']);
