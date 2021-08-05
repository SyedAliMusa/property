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

Route::get('/',
    'App\Http\Controllers\frontEnd\Home\HomeController@index'
);

Route::get('/home',
    'App\Http\Controllers\frontEnd\Home\HomeController@index')
    ->name('home');

Route::get('/property/add', function () {
    return view('frontEnd.views.Property.add_property');
})->middleware(['auth'])->name('propertyForm');

Route::post('/property/add',
    'App\Http\Controllers\frontEnd\Property\PropertyController@add')
    ->middleware(['auth'])->name('addProperty');

Route::get('/property/show',
    'App\Http\Controllers\frontEnd\Property\PropertyController@show')
    ->middleware(['auth'])->name('showProperty');

Route::get('/property/detail/{$id}',
    'App\Http\Controllers\frontEnd\Property\PropertyController@show')
    ->middleware(['auth'])->name('showProperty');

/*Route::get('/home', function () {
    return view('frontEnd.views.home');
})->middleware(['auth'])->name('home');*/

require __DIR__.'/auth.php';
