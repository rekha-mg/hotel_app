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
Route::get('/FoodController','FoodController@index');
Route::get('/FoodController/{fid}','FoodController@show');
Route::get('/FoodController/{fname},{price}','FoodController@insert');
Route::put('/FoodController/{fid}','FoodController@edit');
Route::delete('/FoodController/{fid}','FoodController@destroy');

Route::get('/OrdersController','OrdersController@index');
Route::get('/OrdersController/{fid}','OrdersController@show');
Route::get('/OrdersController/{uname},{fname},{quantity},{price},{amount}','OrdersController@insert');
Route::put('/OrdersController/{fid}','OrdersController@edit');
Route::delete('/OrdersController/{fid}','OrdersController@destroy');