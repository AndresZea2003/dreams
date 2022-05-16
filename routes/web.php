<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest')->name('welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/user-disabled', 'auth.user-disabled')->middleware('user.disabled')->name('user-disabled');

    Route::group(['middleware' => ['user.enabled']], function () {
        Route::resource('home', HomeController::class);
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::view('/profile', 'profile')->name('profile');
        Route::resource('products', ProductController::class);
        Route::view('/shop', 'shop')->name('shop');
        Route::view('/payment', 'payment')->name('payment');
        Route::resource('payments', PaymentController::class);
        Route::post('payments/{payment}/try-payment', [PaymentController::class, 'TryPayment'])->name('payment.try-payment');
        Route::post('getRequestInformation', [PaymentController::class, 'GetRequestInformation'])->name('payment.get-request-information');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::view('panel', 'panel')->name('panel');
            Route::resource('users', UserController::class);
            Route::patch('users/{user}/toggle-status', [UserController::class, 'toggle'])->name('user-status.toggle');
            Route::view('/imports', 'imports')->name('imports');
            Route::view('/imports-exports','imports-exports')->name('imports-exports');
            Route::post('/imports', [ImportController::class, 'import']);
            Route::view('/exports', 'exports')->name('exports');
            Route::get('/export-download', [ExportController::class, 'export'])->name('export-download');
            Route::post('/update-imports', [ImportController::class, 'updateImport'])->name('update-imports');
            Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
            Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
            Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
        });
    });
});



















