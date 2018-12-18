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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index')->name('product.index');

Route::get('/products/{id}', 'ProductsController@detail')->name('product.detail');

Route::get('/products/create', 'ProductsController@create')->name('product.create');

Route::post('/products', 'ProductsController@store')->name('product.store');

Route::get('/products/{id}/edit', 'ProductsController@edit')->name('product.edit');

Route::put('/products/{id}', 'ProductsController@update')->name('product.update');

Route::delete('/products/{id}', 'ProductsController@delete')->name('product.delete');

Route::get('/products/{id}/order', 'ProductsController@order')->name('product.order');

Route::post('/products/{id}/buy', 'ProductsController@buy')->name('product.buy');
