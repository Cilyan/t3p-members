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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth'], function() {
    Auth::routes(['verify' => true]);

    Route::get('/login/{provider}', 'Auth\SocialLoginController@redirect')->name('login.social');

    Route::get('/login/{provider}/callback', 'Auth\SocialLoginController@callback');
});

Route::resource('profile', 'ProfileController')->except(['index', 'show']);
Route::get('profile/{profile}/delete', 'ProfileController@delete')->name('profile.delete');
