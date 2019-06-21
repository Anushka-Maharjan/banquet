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


//Route::domain('{account}.' . env('APP_URL', 'basicwebsite.com.np'))->group(function () {
//    Route::get('/', function ($account) {
//        return $account;
//    });
//});

//Route::domain('{account}.basicwebsite.com.np')->group(function () {
//    Route::get('/', function ($account) {
//       return $account;
//    });
//});

Route::group(['domain' => '{subdomain}.basicwebsite.com.np'], function() {
        Route::get('/', function ($subdomain) {
       return $subdomain;
    });
});


Route::get('/', function () {
    return view('index');
});

Route::get('/{username}', 'PagesController@banquet');

Route::get('/table', function () {
    return view('table');
});

Route::get('/banquet/{id}', 'PagesController@banquet');

Route::get('/autocomplete/', 'PagesController@autocomplete');

Route::post('/autocomplete/fetch','PagesController@fetch')->name('pages.fetch');

Route::post('/banquet/check','BanquetsController@checkusername')->name('banquets.checkusername');




Route::get('admin/login','Auth\LoginController@showLoginFormAdmin');

Route::post('admin/login','UserController@adminverify');

Route::get('admin/register','UserController@showAdminRegister');

Route::get('admin/logout','UserController@adminlogout');

Route::group(['middleware' => ['auth','admin']], function() {
    Route::resource('admin/photos','PhotosController');

    Route::get('admin/photos/{id}/delete','PhotosController@destroy');

    Route::get('admin/photos/{id}/selected','PhotosController@selected');

    Route::get('/admin/calendar/{hall}','EventsController@display');

    Route::resource('admin/calendar','EventsController');

    Route::resource('admin/profile','BanquetsController');

});


Auth::routes( ['verify' => true]);

Route::get('/admin/home', 'DashboardController@index');
