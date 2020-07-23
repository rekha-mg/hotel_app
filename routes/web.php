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

Route::get('/zomoto', function () {
    return view('welcome');
});

Route::get('/zomoto/food', function () {
    return view('food');
});

Route::get('/ajax', function () {
    return view('message');
});
Route::post('/getmsg', 'AjaxController@index');
