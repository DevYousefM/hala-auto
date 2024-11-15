<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('yf-admin')->name('dashboard.')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::prefix('offers')->group(function () {
            Route::get('/', [OffersController::class, 'index'])->name('products.index');
            Route::get('/add', [OffersController::class, 'create'])->name('products.create');
            Route::post('/store', [OffersController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [OffersController::class, 'edit'])->name('products.edit');
            Route::put('/update/{id}', [OffersController::class, 'update'])->name('products.update');
            Route::post('/upload-image/{id}', [OffersController::class, 'uploadImage'])->name('products.uploadImage');
            Route::post('/delete-image', [OffersController::class, 'deleteImage'])->name('products.deleteImage');
            Route::post("/change-status/{id}", [OffersController::class, 'changeStatus'])->name('products.changeStatus');
            Route::post('/save-variants/{id}', [OffersController::class, 'save_variants'])->name('products.save_variants');
            Route::post('/delete-variants/{id}', [OffersController::class, 'delete_variant'])->name('products.delete_variant');
            Route::delete('/{id}', [OffersController::class, 'destroy'])->name('products.destroy');
        });
        Route::prefix('sliders')->group(function () {
            Route::get('/', [SlidersController::class, 'index'])->name('sliders.index');
            Route::get('/add', [SlidersController::class, 'create'])->name('sliders.create');
            Route::post('/store', [SlidersController::class, 'store'])->name('sliders.store');
            Route::get('/edit/{id}', [SlidersController::class, 'edit'])->name('sliders.edit');
            Route::put('/update/{id}', [SlidersController::class, 'update'])->name('sliders.update');
            Route::post("/change-status/{id}", [SlidersController::class, 'changeStatus'])->name('sliders.changeStatus');
            Route::delete('/{id}', [SlidersController::class, 'destroy'])->name('sliders.destroy');
        });
        Route::prefix('branches')->group(function () {
            Route::get('/', [BranchesController::class, 'index'])->name('branches.index');
            Route::get('/add', [BranchesController::class, 'create'])->name('branches.create');
            Route::post('/store', [BranchesController::class, 'store'])->name('branches.store');
            Route::get('/edit/{id}', [BranchesController::class, 'edit'])->name('branches.edit');
            Route::put('/update/{id}', [BranchesController::class, 'update'])->name('branches.update');
            Route::post("/change-status/{id}", [BranchesController::class, 'changeStatus'])->name('branches.changeStatus');
            Route::delete('/{id}', [BranchesController::class, 'destroy'])->name('branches.destroy');
        });
        Route::prefix('terms')->group(function () {
            Route::get('/', [TermsAndConditionsController::class, 'index'])->name('terms.index');
            Route::put('/update/{id}', [TermsAndConditionsController::class, 'update'])->name('terms.update');
        });
    });

    require __DIR__ . '/auth.php';
});
