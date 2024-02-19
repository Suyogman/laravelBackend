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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', App\Http\Controllers\Employee1Controller::class);
Route::get('/form', \App\Http\Controllers\UserController::class.'@index');
Route::post('/form', \App\Http\Controllers\UserController::class.'@store')->name('form');
Route::get('/login', \App\Http\Controllers\UserController::class.'@login')->name('login')
->middleware('guest');
Route::post('/login', \App\Http\Controllers\UserController::class.'@logsubmit')->name('logsubmit');

Route::get('/logout', \App\Http\Controllers\UserController::class.'@logout')->name('logout');

// Route::get('/profile', \App\Http\Controllers\UserController::class.'@profile')->name('profile')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\UserController::class.'@dashboard')->name('dashboard');

    //


    Route::get('/profile', \App\Http\Controllers\UserController::class.'@profile')->name('profile');
     
});
