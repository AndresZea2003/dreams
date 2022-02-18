<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified', 'user.enabled', 'role:admin']], function () {
    Route::resource('products', ProductController::class);
    Route::patch('products/{product}/toggle', [ProductController::class, 'toggle'])->name('product.toggle');
});
