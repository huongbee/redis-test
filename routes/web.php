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

// Route::get('/', function () {
//     // print_r(app()->make('redis'));
//     // return;
// });


Route::get('home', [
    'uses'=>'HomeController@getHome',
    'as'=>'index'
]);
Route::post('home', [
    'uses'=>'HomeController@sendData',
    'as'=>'index'
]);
