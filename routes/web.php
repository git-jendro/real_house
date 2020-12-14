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

Route::get('/', 'HomeController@welcome');
Route::get('/list', 'HomeController@list');
Route::get('/detail/{id}', 'HomeController@detail');
Route::get('/360/{id}', 'HomeController@tiga');
Route::get('/vr/{id}', 'HomeController@vr');
Route::get('/buy/{id}', 'HomeController@buy');
Route::get('/buy/{uuid}/{id}/ref', 'ResellerController@buy');
Route::get('/ref/{uuid}', 'ResellerController@show');



// Dashboard Controller --------------------------------------------------------------------------
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard.route')->middleware(['auth', 'dashboard']);

//User Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/user', 'UserController@index');
    Route::get('/dashboard/user/create', 'UserController@create');
    Route::post('/dashboard/user/store', 'UserController@store');
    Route::get('/dashboard/user/{id}', 'UserController@show');
    Route::get('/dashboard/user/{id}/edit', 'UserController@edit');
    Route::patch('/dashboard/user/{id}', 'UserController@update');
    Route::get('/dashboard/user/{id}/delete', 'UserController@destroy');
});


//Project Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/project', 'ProjectController@index');
    Route::get('/dashboard/project/create', 'ProjectController@create');
    Route::post('/dashboard/project/store', 'ProjectController@store');
    Route::get('/dashboard/project/{id}', 'ProjectController@show');
    Route::get('/dashboard/project/{id}/edit', 'ProjectController@edit');
    Route::patch('/dashboard/project/{id}', 'ProjectController@update');
    Route::get('/dashboard/project/{id}/delete', 'ProjectController@destroy');
});

//Building Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/building', 'BuildingController@index');
    Route::get('/dashboard/building/create', 'BuildingController@create');
    Route::post('/dashboard/building/store', 'BuildingController@store');
    Route::get('/dashboard/building/{id}', 'BuildingController@show');
    Route::get('/dashboard/building/{id}/edit', 'BuildingController@edit');
    Route::patch('/dashboard/building/{id}', 'BuildingController@update');
    Route::get('/dashboard/building/{id}/delete', 'BuildingController@destroy');
    Route::get('/dashboard/building/{building}/{facility}', 'BuildingController@facility');
});

//Facility Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/facility', 'FacilityController@index');
    Route::get('/dashboard/facility/create', 'FacilityController@create');
    Route::post('/dashboard/facility/store', 'FacilityController@store');
    Route::get('/dashboard/facility/{id}', 'FacilityController@show');
    Route::get('/dashboard/facility/{id}/edit', 'FacilityController@edit');
    Route::patch('/dashboard/facility/{id}', 'FacilityController@update');
    Route::get('/dashboard/facility/{id}/delete', 'FacilityController@destroy');
});

//Amenity Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/amenity', 'AmenityController@index');
    Route::get('/dashboard/amenity/create', 'AmenityController@create');
    Route::post('/dashboard/amenity/store', 'AmenityController@store');
    Route::get('/dashboard/amenity/{id}', 'AmenityController@show');
    Route::get('/dashboard/amenity/{id}/edit', 'AmenityController@edit');
    Route::patch('/dashboard/amenity/{id}', 'AmenityController@update');
    Route::get('/dashboard/amenity/{id}/delete', 'AmenityController@destroy');
});

//Unit Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/unit', 'UnitController@index');
    Route::get('/dashboard/unit/create', 'UnitController@create');
    Route::post('/dashboard/unit/store', 'UnitController@store');
    Route::get('/dashboard/unit/{id}', 'UnitController@show');
    Route::get('/dashboard/unit/{id}/edit', 'UnitController@edit');
    Route::patch('/dashboard/unit/{id}', 'UnitController@update');
    Route::get('/dashboard/unit/{id}/delete', 'UnitController@destroy');
});

//Reseller Route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::get('/dashboard/reseller', 'ResellerController@index');
    Route::post('/dashboard/reseller/generate', 'ResellerController@generate');
    Route::get('/dashboard/reseller/{id}/delete', 'ResellerController@destroy');
});