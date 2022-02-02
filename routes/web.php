<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
})->middleware(['guest']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::View('/home', 'home')->name('home');

    Route::View('/profile', 'profile')->name('profile');
});

Route::group(['middleware' => ['auth', 'verified', 'role:admin']], function () {
    Route::view('panel', 'panel')->name('panel');

    Route::resource('users', UserController::class);

    Route::patch('users/{user}/toggle-status', [UserController::class, 'toggle'])->name('user-status.toggle');
});
