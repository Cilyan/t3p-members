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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function() {
    Auth::routes();

    Route::get('/login/{provider}', 'Auth\SocialLoginController@redirect')->name('login.social');

    Route::get('/login/{provider}/callback', 'Auth\SocialLoginController@callback');
});

Route::get('/home', 'HomeController@index')->name('home');
