<?php

use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\TransientTokenController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;

/*
|--------------------------------------------------------------------------
| OAuth Routes
|--------------------------------------------------------------------------
|
| Manually register Passport routes to better fit with the application
|
*/

Route::prefix('oauth')->name('passport.')->group(function() {
    Route::middleware(['web', 'auth', 'verified'])->name('authorizations.')->group(function() {
        Route::get('/authorize', [AuthorizationController::class, 'authorize'])->name('authorize');
        Route::post('/authorize', [ApproveAuthorizationController::class, 'approve'])->name('approve');
        Route::delete('/authorize', [DenyAuthorizationController::class, 'deny'])->name('deny');
    });

    Route::post('/token', [AccessTokenController::class, 'issueToken'])->name('token')->middleware('throttle');

    Route::middleware(['web', 'auth', 'verified'])->name('tokens.')->group(function() {
        Route::get('/tokens', [AuthorizedAccessTokenController::class, 'forUser'])->name('index');
        Route::delete('/tokens/{token_id}', [AuthorizedAccessTokenController::class, 'destroy'])->name('destroy');
        Route::post('/token/refresh', [TransientTokenController::class, 'refresh'])->name('refresh');
    });
});
