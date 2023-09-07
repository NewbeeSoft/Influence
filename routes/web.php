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
    //return view('welcome');
    return redirect('https://welcome.twhive.com');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/checks', 'Auth\LoginController@actionLogin')->name('check');
//Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/forgot', 'Auth\ForgotPasswordController@index')->name('forgot');
Route::post('/forgot', 'Auth\ForgotPasswordController@forgot');
Route::get('/reset', 'Auth\ResetPasswordController@index')->name('reset');
Route::post('/reset', 'Auth\ResetPasswordController@reset');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/verify', 'Auth\VerificationController@index')->name('verify');
Route::post('/verify', 'Auth\VerificationController@resend')->name('resend');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/edit', 'ProfileController@edit')->name('profileEdit');
Route::post('/profile/edit', 'ProfileController@save')->name('profileSave');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/verify/auth/instagram', 'VerifyController@verifyInstagram');
Route::post('/verify/auth/facebook', 'VerifyController@verifyFacebook');

Route::get('/verify/auth/email', 'VerifyController@verifyEmail');


Route::get('/search', 'SearchController@index')->name('search')->middleware('auth');
Route::post('/data/search/profile', 'SearchController@search')->middleware('auth');

Route::post('/data/search/location/list', 'Data\GoogleController@locationList')->middleware('auth');
Route::post('/data/search/keytopic/list', 'Data\JsonController@keytopicList')->middleware('auth');

Route::get('/test', 'TestController@test');



