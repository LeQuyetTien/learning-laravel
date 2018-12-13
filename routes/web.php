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

Route::get('/', 'HomeController@index');

Route::get('/products', [
    'as'    => 'product.index',
    'uses'  => 'ProductsController@index'
]);

Route::get('/products/create', [
    'as'    => 'product.create',
    'uses'  => 'ProductsController@create'
]);

Route::post('/products', [
    'as'    => 'product.store',
    'uses'  => 'ProductsController@store'
]);

Route::get('/products/{id}', [
    'as'    => 'product.detail',
    'uses'  => 'ProductsController@detail'
]);
