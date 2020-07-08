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
//Route::get('/FoodController','FoodController@index');
Route::get('/FoodController/{fid}','FoodController@show');
Route::get('/newfood/{nm}/{pr}','FoodController@insert');
//http://127.0.0.1:8000/newfood/parota/70
Route::put('/itemedit/{nm}/{pr}/{fid}','FoodController@edit');
//Route::delete('/FoodController/{fid}','FoodController@destroy');
//Route::put('user/{id}', 'UserController@update');
Route::get('/OrdersController','OrdersController@index');
Route::get('/OrdersController/{fid}','OrdersController@show');
Route::get('/OrdersController1/{uname}/{fname}/{quantity}/{price}/{amount}','OrdersController@insert');
Route::put('/OrdersController/{fid}','OrdersController@edit');
Route::delete('/OrdersController/{fid}','OrdersController@destroy');


Route::get('/UserController','UserController@index');
Route::get('/UserController/{uname}/{phone}/{location}','UserController@insert');