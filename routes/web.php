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

//Route::group(['domain' => '{username}.nepvent.com'], function() {
//    Route::get('/', 'PagesController@banquet');
//});


Route::get('/', function () {
    return view('index');
});

Route::get('/error', function () {
    return view('error');
});
Route::get('/photohome','PagesController@banquet');
Route::get('/banquet/{id}', 'PagesController@banquet');
Route::post('/book/', 'PagesController@book');
Route::post('user/login','UserController@userlogin');
Route::post('user/register','UserController@userregister');
Route::get('/verify/{id}','UserController@userverify');
Route::post('/portfolio/enquire','PagesController@enquire');
Route::get('/portfolio/{username}','PagesController@portfolio');
Route::post('/portfolio/','PagesController@video');
Route::get('/search/{name}','PagesController@searchaddress');
Route::get('/search/{address}/{hall}','PagesController@searchaddress');
Route::get('/search/{address}/{photographer}/{genre}','PagesController@searchphotographer');

Route::get('/photoindex',function (){
    return view('photohome');
});
Route::post('/config','UserController@configure');
Route::get('/portfolio/{username}','PagesController@portfolio');
Route::post('/autocomplete/fetch','PagesController@fetch')->name('pages.fetch');
Route::post('/autocomplete/fetchaddress','PagesController@fetchaddress')->name('pages.fetchaddress');
Route::post('/autocomplete/fetchaddressphoto','PagesController@fetchaddressphoto')->name('pages.fetchaddressphoto');

Route::post('/banquet/check','BanquetsController@checkusername')->name('banquets.checkusername');

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
Route::get('user/logout','UserController@userlogout');
Route::resource('/photographer','PhotographersController');
Route::post('/photographer/changedp','PhotographersController@changedp');
Route::post('/photographer/addphotos','PhotographersController@addphotos');

Route::group(['middleware' => ['auth','admin']], function() {
    Route::resource('admin/photos','PhotosController');

    Route::get('admin/photos/{id}/delete','PhotosController@destroy');

    Route::get('admin/photos/{id}/selected','PhotosController@selected');

    Route::get('/admin/calendar/{hall}','EventsController@display');

    Route::resource('admin/calendar','EventsController');

    Route::resource('admin/profile','BanquetsController');

});


Auth::routes( ['verify' => true]);

