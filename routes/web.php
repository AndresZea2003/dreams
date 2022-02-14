<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest')->name('welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/user-disabled', 'auth.user-disabled')->middleware('user.disabled')->name('user-disabled');

    Route::group(['middleware' => ['user.enabled']], function () {
        Route::view('/home', 'home')->name('home');
        Route::view('/profile', 'profile')->name('profile');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::view('panel', 'panel')->name('panel');
            Route::resource('users', UserController::class);
            Route::patch('users/{user}/toggle-status', [UserController::class, 'toggle'])->name('user-status.toggle');
//            Route::resource('products', ProductController::class);
        });
    });
});
