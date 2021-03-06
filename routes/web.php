<?php

use Illuminate\Support\Facades\Redirect;
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

// Login Page


// Pre-Login Routes
Route::get('/', function() {
    return redirect()->route('login');
});
Route::middleware('guest')->group(function() {

    // Login
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@authenticate')->name('authenticate');

    // Register
    Route::get('register', 'RegisterController@index')->name('register');
    Route::post('register', 'RegisterController@store')->name('register.store');
});

// Post-Login Routes
Route::middleware('auth')->group(function() {

    // Home
    Route::get('home', 'PagesController@showHome')->name('home');

    // Logout
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Appointment
    Route::resource('appointment', 'AppointmentController')->except([
        'create', 'show'
    ])->middleware('owner:appointment');

    // Contact
    Route::resource('contact', 'ContactController')->except([
        'create', 'show'
    ])->middleware('owner:contact');
    Route::get('contact/{contact}/appointment', 'ContactController@appointment')->name('contact.appointment')->middleware('owner:contact');

    // Task
    Route::resource('task', 'TasksController')->except([
        'create', 'show'
    ])->middleware('owner:task');
    Route::put('task/{task}/mark', 'TasksController@mark')->name('task.mark')->middleware('owner:task');
});
