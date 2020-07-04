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
Route::get('/FoodController','FoodController@insert');
Route::get('/FoodController/{fid}','FoodController@update');
//Route::get('insert','StudInsertController@insertform');
//Route::post('create','StudInsertController@insert');