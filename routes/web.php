<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialLoginController;

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

Route::get('/',                               [HomeController::class, 'index'])->name('home');
Route::get('/account',                        [HomeController::class, 'account'])->name('account');

Route::group(['prefix' => 'auth'], function() {
    Auth::routes(['verify' => true]);
    Route::get('/welcome',                    [LoginController::class, 'welcome'])->name('welcome');
    Route::get('/login/{provider}',           [SocialLoginController::class, 'redirect'])->name('login.social');
    Route::get('/login/{provider}/callback',  [SocialLoginController::class, 'callback']);
});

Route::resource('profile', ProfileController::class)->except(['index']);
Route::get('profile/{profile}/delete',        [ProfileController::class, 'delete'])->name('profile.delete');

Route::resource('helper', HelperController::class)->except(['index', 'show', 'create', 'store']);
Route::get('profile/{profile}/for/{edition}/helper',        [HelperController::class, 'create'])->name('helper.create');
Route::post('profile/{profile}/for/{edition}/helper',       [HelperController::class, 'store'])->name('helper.store');
Route::get('profile/{profile}/for/{edition}/helper/thanks', [HelperController::class, 'thanks'])->name('helper.thanks');
Route::get('helper/{helper}/delete',                        [HelperController::class, 'delete'])->name('helper.delete');
Route::post('helper/{helper}/activate',                     [HelperController::class, 'activate'])->name('helper.activate');
Route::post('helper/{helper}/deactivate',                   [HelperController::class, 'deactivate'])->name('helper.deactivate');

Route::resource('edition', EditionController::class)->except(['index', 'show']);
Route::get('edition/{edition}/delete',        [EditionController::class, 'delete'])->name('edition.delete');

Route::get('/admin',                          [AdminController::class,   'index'])->name('admin.home');
Route::get('/admin/helpers/{edition}/export', [AdminController::class,   'export'])->name('admin.export');
Route::get('/admin/profiles',                 [AdminController::class,   'profiles'])->name('admin.profiles');
Route::get('/admin/accounts',                 [AdminController::class,   'accounts'])->name('admin.accounts');
Route::get('/admin/editions',                 [EditionController::class, 'index'])->name('admin.editions');

Route::get('/account/{user}',                 [AdminController::class,   'account'])->name('account.show');
