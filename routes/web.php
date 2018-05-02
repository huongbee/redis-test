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


Route::get('collect',function(){
    $items = [
        ['name' => 'David Charleston', 'member' => 1, 'active' => 1],
        ['name' => 'Blain Charleston', 'member' => 0, 'active' => 0],
        ['name' => 'Megan Tarash', 'member' => 1, 'active' => 1],
        ['name' => 'Jonathan Phaedrus', 'member' => 1, 'active' => 1],
        ['name' => 'Paul Jackson', 'member' => 0, 'active' => 1]
    ];
    // return collect($items)
    //         ->where('active', 1)
    //         ->tap(function($collection){
    //             return var_dump($collection->pluck('name'));
    //         })
    //         ->where('member', 1)
    //         ->tap(function($collection){
    //             return var_dump($collection->pluck('name'));
    //         });    
    return collect($items)
            ->where('active', 1)
            ->pipe(function ($collection) {
                return $collection->push(['name' => 'John Doe']);
            });
});