<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;



Route::controller(LayoutController::class)->group(function () {
    Route::get('/', 'index');
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'store');
    });

    Route::controller(WargaController::class)->group(function () {
        Route::get('read/photo', 'photo');
        Route::get('read/video', 'video');
        Route::get('pengajuan', 'index');
        Route::post('pengajuan', 'store');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(LogoutController::class)->group(function () {
        Route::get('logout', 'index');
    });
});