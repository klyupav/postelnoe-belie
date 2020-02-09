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

Route::get('/parseit/start', 'ParseitController@start');
Route::get('/parseit/product_sources', 'ParseitController@product_sources');
Route::get('/parseit/product_data', 'ParseitController@product_data');
Route::get('/parseit/sources', 'ParseitController@sources');
Route::get('/parseit/products', 'ParseitController@products');
Route::get('/parseit/export', 'ParseitController@exportToWp');
Route::get('/parseit/delete', 'ParseitController@removeAll');