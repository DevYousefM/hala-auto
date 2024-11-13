<?php

use App\Http\Controllers\Landing\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', [MainController::class, 'index'])->name('landing');
