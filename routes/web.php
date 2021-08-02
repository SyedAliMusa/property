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


Route::get('/agent/register', function () {
    return view('frontEnd.views.Profile.register');
})->name('signUp');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('frontEnd.views.home');
})->name('home');

Route::get('/', function () {
    return view('frontEnd.views.home');
})->name('home');

Route::get('/property/add', function () {
    return view('frontEnd.views.Property.add_property');
})->name('addProperty');

/*Route::get('/home', function () {
    return view('frontEnd.views.home');
})->middleware(['auth'])->name('home');*/

require __DIR__.'/auth.php';
