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
Route::get('/',
    'App\Http\Controllers\frontEnd\Home\HomeController@index'
)->name('home');

Route::get('/home',
    'App\Http\Controllers\frontEnd\Home\HomeController@index')
    ->name('home');

Route::get('/blogs',
    'App\Http\Controllers\backEnd\Blogs\BlogController@show')
    ->name('blogs');

Route::get('/blog/detail/{blog}',
    'App\Http\Controllers\backEnd\Blogs\BlogController@blogDetail')
    ->name('blogDetail');

Route::get('/property/detail/{property}',
    'App\Http\Controllers\frontEnd\Property\PropertyController@getProperty')
    ->name('showProperty');

Route::get('/property/list',
    'App\Http\Controllers\frontEnd\Property\PropertyController@show')
    ->name('propertyList');

Route::get('/search',
    'App\Http\Controllers\frontEnd\Property\PropertyController@searchProperty')
    ->name('searchProperty');

Route::get('/contact/us', function () {
    return view('frontEnd.views.contact');
})->name('contactUs');

Route::post('/contact/us',
    'App\Http\Controllers\backEnd\ContactUs\ContactController@contactMessage')
    ->name('contactUs');

Route::get('/agent/profile/{user}',
    'App\Http\Controllers\frontEnd\Home\HomeController@agent')
    ->name('profile');

Route::get('/agent/register', function () {
    return view('frontEnd.views.Profile.register');
})->name('signUp');

/* ====================================================== End Open Routes ================================================= */


/* ====================================================== Agent Routes ================================================= */

Route::group(['middleware' => ['auth:agent']], function () {

    Route::get('/property/add', function () {
        return view('frontEnd.views.Property.add_property');
    })->name('propertyForm');

    Route::post('/property/add',
        'App\Http\Controllers\frontEnd\Property\PropertyController@add')
        ->name('addProperty');

    Route::get('/my/property/edit/{property}',
        'App\Http\Controllers\frontEnd\Home\HomeController@edit')
        ->name('editProperty');

    Route::post('/my/property/edit/{property}',
        'App\Http\Controllers\frontEnd\Home\HomeController@editStore')
        ->name('editProperty');

    Route::get('/my/property/delete/{id}',
        'App\Http\Controllers\frontEnd\Home\HomeController@delete')
        ->name('deleteProperty');

    Route::get('/my/property/list',
        'App\Http\Controllers\frontEnd\Home\HomeController@list')
        ->name('myPropertyList');

    Route::get('/property/set/type/{property}',
        'App\Http\Controllers\frontEnd\Home\HomeController@setAsSold')->name('SetAgentPropertyType');

    /*Route::get('/property/show',
        'App\Http\Controllers\frontEnd\Property\PropertyController@show')
        ->name('showProperty');*/

    Route::post('/agent/profile/image',
        'App\Http\Controllers\frontEnd\Home\HomeController@profileImage')
        ->name('profileImage');

    Route::post('/agent/profile/update',
        'App\Http\Controllers\frontEnd\Home\HomeController@profileUpdate')
        ->name('profileUpdate');

    Route::GET('logout',
        [\App\Http\Controllers\backEnd\HomeController::class, 'logout'])
        ->name('logout');

});

/* ====================================================== End Agent Routes ================================================= */


/* ====================================================== Admin Routes ================================================= */

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin/home',
        'App\Http\Controllers\backEnd\HomeController@index')->name('adminHome');

    Route::get('/admin',
        'App\Http\Controllers\backEnd\HomeController@index')->name('adminHome');

    Route::post('/set/type',
        'App\Http\Controllers\backEnd\Featured\FeaturedController@setType')->name('SetType');

    /* ==================================================== Admin Users Routes ============================================= */

    Route::get('/admin/users/list',
        'App\Http\Controllers\backEnd\Users\UserController@showUsers')->name('adminUserList');

    Route::get('/admin/user/profile/{id}',
        'App\Http\Controllers\backEnd\Users\UserController@showUserProfile')->name('adminSeeUserProfile');

    Route::get('/admin/featured/users/list',
        'App\Http\Controllers\backEnd\Users\UserController@showFeaturedUsers')->name('adminFeaturedUserList');

    Route::get('/admin/agent/view/{id}',
        'App\Http\Controllers\backEnd\Users\UserController@showUsers')->name('agentProfileView');

    Route::post('/set/users/activate-type',
        'App\Http\Controllers\backEnd\Users\UserController@setUserAccountActivateType')->name('SetUserActive');


    /* ================================================ End Admin Users Routes ============================================= */

    /* ================================================ Admin Property Routes ============================================== */

    Route::get('/admin/property/list',
        'App\Http\Controllers\backEnd\Property\PropertyController@showProperties')->name('adminPropertyList');

    Route::get('/admin/property/detail/{id}',
        'App\Http\Controllers\backEnd\Property\PropertyController@showPropertyDetails')->name('adminPropertyDetail');

    Route::get('/admin/property/sold/list',
        'App\Http\Controllers\backEnd\Property\PropertyController@showSoldProperties')->name('adminSoldPropertyList');

    Route::get('/admin/property/deleted/list',
        'App\Http\Controllers\backEnd\Property\PropertyController@showDeletedProperties')->name('adminDeletedPropertyList');

    Route::get('/admin/property/featured/list',
        'App\Http\Controllers\backEnd\Property\PropertyController@showFeaturedProperties')->name('adminFeaturedPropertyList');

    Route::get('/admin/property/inactive/list',
        'App\Http\Controllers\backEnd\Property\PropertyController@showInactiveProperties')->name('adminInactivePropertyList');

    Route::post('/set/property/type',
        'App\Http\Controllers\backEnd\Property\PropertyController@setPropertyType')->name('SetPropertyType');

    /* =============================================== End Admin Property Routes =========================================== */

    /* =============================================== Admin Blogs Routes =========================================== */

    Route::get('/admin/blogs/list',
        'App\Http\Controllers\backEnd\Blogs\BlogController@index')->name('adminBlogsList');

    Route::get('/admin/blog/add',
        'App\Http\Controllers\backEnd\Blogs\BlogController@addBlog')->name('adminAddBlogHtml');

    Route::post('/admin/blog/add',
        'App\Http\Controllers\backEnd\Blogs\BlogController@addBlog')->name('adminAddBlog');

    Route::get('/admin/blog/edit/{blog}',
        'App\Http\Controllers\backEnd\Blogs\BlogController@editBlog')->name('adminEditBlogHtml');

    Route::post('/admin/blog/edit/{blog}',
        'App\Http\Controllers\backEnd\Blogs\BlogController@editBlog')->name('adminEditBlog');

    Route::get('/admin/blog/delete/{blog}',
        'App\Http\Controllers\backEnd\Blogs\BlogController@deleteBlog')->name('adminDeleteBlog');

    Route::post('/admin/blog/comment',
        'App\Http\Controllers\backEnd\Blogs\BlogController@addBlogComment')->name('addBlogComment');

    Route::post('/admin/blog/category/add',
        'App\Http\Controllers\backEnd\Blogs\BlogController@addBlogCategory')->name('addBlogCategory');

    Route::Get('/admin/blog/category/add',
        'App\Http\Controllers\backEnd\Blogs\BlogController@addBlogCategory')->name('addBlogCategory');

    Route::Get('/admin/blog/category/show',
        'App\Http\Controllers\backEnd\Blogs\BlogController@showCategory')->name('showCategory');

    Route::Get('/admin/blog/category/{cat}',
        'App\Http\Controllers\backEnd\Blogs\BlogController@changeCategoryStatus')->name('changeCategoryStatus');

    /* =============================================== End Admin Blogs Routes =========================================== */

    /* =============================================== Admin Contact Us Routes =========================================== */

    Route::get('/admin/contact-us/list',
        'App\Http\Controllers\backEnd\ContactUs\ContactController@show')->name('adminContactUsList');

    Route::get('/admin/contact-us/list/actioned',
        'App\Http\Controllers\backEnd\ContactUs\ContactController@showActioned')->name('adminContactUsActionedList');

    Route::get('/admin/contact-us/list/closed',
        'App\Http\Controllers\backEnd\ContactUs\ContactController@showClosed')->name('adminContactUsClosedList');

    Route::post('/admin/contact-us/set/action',
        'App\Http\Controllers\backEnd\ContactUs\ContactController@setAction')->name('adminContactUsSetActioned');

    Route::post('/admin/contact-us/ticket/closed',
        'App\Http\Controllers\backEnd\ContactUs\ContactController@setTicketClosed')->name('adminContactUsTicketClosed');


    /* =============================================== End Admin Contact Us Routes =========================================== */

});

/* ====================================================== End Admin Routes ============================================= */

require __DIR__.'/auth.php';
