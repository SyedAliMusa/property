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

Route::get('/my/property/edit/{property}',
    'App\Http\Controllers\frontEnd\Home\HomeController@edit')
    ->middleware(['auth'])->name('editProperty');

Route::post('/my/property/edit/{property}',
    'App\Http\Controllers\frontEnd\Home\HomeController@editStore')
    ->middleware(['auth'])->name('editProperty');

Route::get('/my/property/delete/{id}',
    'App\Http\Controllers\frontEnd\Home\HomeController@delete')
    ->middleware(['auth'])->name('deleteProperty');

Route::get('/my/property/list',
    'App\Http\Controllers\frontEnd\Home\HomeController@list')
    ->middleware(['auth'])->name('myPropertyList');


Route::get('/property/show',
    'App\Http\Controllers\frontEnd\Property\PropertyController@show')
    ->middleware(['auth'])->name('showProperty');

Route::get('/property/detail/{property}',
    'App\Http\Controllers\frontEnd\Property\PropertyController@getProperty')
    ->name('showProperty');

Route::get('/property/list',
    'App\Http\Controllers\frontEnd\Property\PropertyController@show')
    ->name('propertyList');

Route::get('/contact/us', function () {
    return view('frontEnd.views.contact');
})->name('contactUs');

Route::get('/agent/profile/{user}',
    'App\Http\Controllers\frontEnd\Home\HomeController@agent')
    ->name('profile');

/*Route::get('/home', function () {
    return view('frontEnd.views.home');
})->middleware(['auth'])->name('home');*/

require __DIR__.'/auth.php';
