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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@account')->name('account');

Route::group(['prefix' => 'auth'], function() {
    Auth::routes(['verify' => true]);

    Route::get('/welcome', 'Auth\LoginController@welcome')->name('welcome');

    Route::get('/login/{provider}', 'Auth\SocialLoginController@redirect')->name('login.social');

    Route::get('/login/{provider}/callback', 'Auth\SocialLoginController@callback');
});

Route::resource('profile', 'ProfileController')->except(['index']);
Route::get('profile/{profile}/delete', 'ProfileController@delete')->name('profile.delete');

Route::resource('helper', 'HelperController')->except(['index', 'show', 'create', 'store']);
Route::get('profile/{profile}/for/{edition}/helper', 'HelperController@create')->name('helper.create');
Route::post('profile/{profile}/for/{edition}/helper', 'HelperController@store')->name('helper.store');
Route::get('profile/{profile}/for/{edition}/helper/thanks', 'HelperController@thanks')->name('helper.thanks');
Route::get('helper/{helper}/delete', 'HelperController@delete')->name('helper.delete');
Route::post('helper/{helper}/activate', 'HelperController@activate')->name('helper.activate');
Route::post('helper/{helper}/deactivate', 'HelperController@deactivate')->name('helper.deactivate');

Route::resource('edition', 'EditionController')->except(['index', 'show']);
Route::get('edition/{edition}/delete', 'EditionController@delete')->name('edition.delete');

Route::get('/admin', 'AdminController@index')->name('admin.home');
Route::get('/admin/helpers/{edition}/export', 'AdminController@export')->name('admin.export');
Route::get('/admin/profiles', 'AdminController@profiles')->name('admin.profiles');
Route::get('/admin/accounts', 'AdminController@accounts')->name('admin.accounts');
Route::get('/admin/editions', 'EditionController@index')->name('admin.editions');
