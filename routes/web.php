<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('home')->name('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// Dashboard Controller --------------------------------------------------------------------------
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard.route')->middleware('dashboard');

//User Route
Route::middleware('dashboard')->group(function () {
    Route::get('/dashboard/user', 'UserController@index');
    Route::get('/dashboard/user/create', 'UserController@create');
    Route::post('/dashboard/user/store', 'UserController@store');
    Route::get('/dashboard/user/{id}', 'UserController@show');
    Route::get('/dashboard/user/{id}/edit', 'UserController@edit');
    Route::patch('/dashboard/user/{id}', 'UserController@update');
    Route::get('/dashboard/user/{id}/delete', 'UserController@destroy');
});


//Project Route
Route::middleware('dashboard')->group(function () {
    Route::get('/dashboard/project', 'ProjectController@index');
    Route::get('/dashboard/project/create', 'ProjectController@create');
    Route::post('/dashboard/project/store', 'ProjectController@store');
    Route::get('/dashboard/project/{id}', 'ProjectController@show');
    Route::get('/dashboard/project/{id}/edit', 'ProjectController@edit');
    Route::patch('/dashboard/project/{id}', 'ProjectController@update');
    Route::get('/dashboard/project/{id}/delete', 'ProjectController@destroy');
});

//Building Route
Route::middleware('dashboard')->group(function () {
    Route::get('/dashboard/building', 'BuildingController@index');
    Route::get('/dashboard/building/create', 'BuildingController@create');
    Route::post('/dashboard/building/store', 'BuildingController@store');
    Route::get('/dashboard/building/{id}', 'BuildingController@show');
    Route::get('/dashboard/building/{id}/edit', 'BuildingController@edit');
    Route::patch('/dashboard/building/{id}', 'BuildingController@update');
    Route::get('/dashboard/building/{id}/delete', 'BuildingController@destroy');
});
