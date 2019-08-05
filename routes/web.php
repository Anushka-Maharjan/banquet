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

Route::group(['domain' => '{subdomain}.basicwebsite.com.np'], function() {
        Route::get('/', function ($subdomain) {
       return $subdomain;
    });
});


Route::get('/', function () {
    return view('index');
});

Route::get('/banquet/{id}', 'PagesController@banquet');

Route::get('/autocomplete/', 'PagesController@autocomplete');

Route::post('/book/', 'PagesController@book');
Route::post('user/login','UserController@userlogin');
Route::post('user/register','UserController@userregister');
Route::get('/verify/{id}','UserController@userverify');
Route::post('/portfolio/enquire','PagesController@enquire');
Route::get('/portfolio/{username}','PagesController@portfolio');
Route::post('/portfolio/','PagesController@video');

Route::get('/photoindex',function (){
    return view('photohome');
});
Route::post('/config','UserController@configure');
Route::get('/portfolio/{username}','PagesController@portfolio');
Route::post('/autocomplete/fetch','PagesController@fetch')->name('pages.fetch');
Route::post('/autocomplete/fetchaddress','PagesController@fetchaddress')->name('pages.fetchaddress');

Route::post('/banquet/check','BanquetsController@checkusername')->name('banquets.checkusername');
//Route::post('/register','RegisterController@register');

Route::get('login/{service}','SocialAuthController@redirect');
Route::get ( '/login/{service}/callback', 'SocialAuthController@callback' );

Route::get ( '/compress', 'PagesController@compressimage' );
Route::get ( '/register-success', function (){
    return view('successregister');
});
Route::get('admin/login','Auth\LoginController@showLoginFormAdmin');

Route::post('photo/register','UserController@photoregister');


Route::post('admin/login','UserController@adminverify');

Route::get('admin/register','UserController@showAdminRegister');

Route::get('admin/logout','UserController@adminlogout');
Route::get('logout','UserController@userlogout');

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
