<?php
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

// Welcome Page
Route::get('/', 'PagesController@showWelcome');

// Login Page
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@authenticate');
Route::post('logout', 'LoginController@logout');


// Register Page
Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@store');

// Task Page
Route::get('task', 'TasksController@index');
Route::post('task', 'TasksController@store');
Route::delete('task/{id}', 'TasksController@destroy');
Route::get('task/{id}/edit', 'TasksController@edit');
Route::put('task/{id}/mark', 'TasksController@mark');
Route::put('task/{id}/update', 'TasksController@update');
