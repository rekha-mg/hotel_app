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


Route::get('/food','FoodController@showAll');
Route::get('/food/{fid}','FoodController@showOne');
Route::post('/food','FoodController@insert');
Route::patch('/food/{food_id}','FoodController@edit');
Route::delete('/food/{food_id}','FoodController@deleteFood');


Route::get('/OrdersController','OrdersController@index');

Route::put('/order/{order_id}','OrdersController@show');

Route::get('/newOrder/{uid}/{fnm}/{qty}','OrdersController@insert');

Route::get('/orderedit/{oid}/{fname}/{qty}/{amt}','OrdersController@edit');
//http://127.0.0.1:8000/orderedit/1/dosa/1/45


Route::get('/orderdel/{fid}','OrdersController@destroy');
//http://127.0.0.1:8000/orderdel/1

Route::get('/UserController','UserController@index');
Route::get('/UserController/{uname}/{phone}/{location}','UserController@insert');