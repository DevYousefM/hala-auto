<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\StyleController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::prefix('yf-admin')->name('dashboard.')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/add', [ProductController::class, 'create'])->name('products.create');
            Route::post('/store', [ProductController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::post('/upload-image/{id}', [ProductController::class, 'uploadImage'])->name('products.uploadImage');
            Route::post('/delete-image', [ProductController::class, 'deleteImage'])->name('products.deleteImage');
            Route::post("/change-status/{id}", [ProductController::class, 'changeStatus'])->name('products.changeStatus');
            Route::post('/save-variants/{id}', [ProductController::class, 'save_variants'])->name('products.save_variants');
            Route::post('/delete-variants/{id}', [ProductController::class, 'delete_variant'])->name('products.delete_variant');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        });
    });

    require __DIR__ . '/auth.php';
});
