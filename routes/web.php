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

////                  redis                 
Route::get('home', [
    'uses'=>'HomeController@getHome',
    'as'=>'index'
]);
Route::post('home', [
    'uses'=>'HomeController@sendData',
    'as'=>'index'
]);


//             boadcasting
Route::get('projects/{project}',function (\App\Project $project){
    $project->load('tasks');
    return view('projects.show', compact($project));
});



// auth

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logoutOthers', function(){
    auth()->logoutOtherDevices('password'); //logoutOtherDevices is a function be added in SessionGuard class 
    return redirect('/');
});