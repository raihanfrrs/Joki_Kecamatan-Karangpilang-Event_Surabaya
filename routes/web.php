<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegisterController;

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

Route::controller(LayoutController::class)->group(function () {
    Route::get('/', 'index');
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'store');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'index')->name('register');
        Route::post('register', 'store');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(LogoutController::class)->group(function () {
        Route::get('logout', 'index');
    });

    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::controller(MasterController::class)->group(function () {
            Route::get('rw', 'rw_index');
            Route::get('rw/add', 'rw_create');
            Route::post('rw', 'rw_store');
            Route::get('rw/{rw}/edit', 'rw_edit');
            Route::put('rw/{rw}', 'rw_update');
            Route::get('rw/{photo}', 'rw_show');
            Route::delete('rw/{rw}', 'rw_delete');
            Route::get('/dataRukunWarga', [MasterController::class, 'dataRukunWarga'])->name('dataRukunWarga');
        });

        Route::controller(DocumentController::class)->group(function () {
            Route::get('photo', 'photo_index');
            Route::get('photo/add', 'photo_create');
            Route::post('photo', 'photo_store');
            Route::get('photo/{photo}/edit', 'photo_edit');
            Route::put('photo/{photo}', 'photo_update');
            Route::get('photo/{photo}', 'photo_show');
            Route::delete('photo/{photo}', 'photo_delete');
            Route::get('/dataPhoto', [DocumentController::class, 'dataPhoto'])->name('dataPhoto');
            
            Route::get('video', 'video_index');
            Route::get('video/add', 'video_create');
            Route::post('video', 'video_store');
            Route::get('video/{video}/edit', 'video_edit');
            Route::put('video/{video}', 'video_update');
            Route::get('video/{video}', 'video_show');
            Route::delete('video/{video}', 'video_delete');
            Route::get('/dataVideo', [DocumentController::class, 'dataVideo'])->name('dataVideo');
        });

        Route::controller(PengajuanController::class)->group(function () {
            Route::get('event', 'event_index');
            Route::get('event/{event}/edit', 'event_edit');
            Route::put('event/{event}', 'event_update');
            Route::get('event/{event}', 'event_show');
            Route::delete('event/{event}', 'event_delete');
            Route::get('/dataEvent', [PengajuanController::class, 'dataEvent'])->name('dataEvent');

            Route::get('musbangkel', 'musbangkel_index');
            Route::get('musbangkel/{musbangkel}/edit', 'musbangkel_edit');
            Route::put('musbangkel/{musbangkel}', 'musbangkel_update');
            Route::get('musbangkel/{musbangkel}', 'musbangkel_show');
            Route::delete('musbangkel/{musbangkel}', 'musbangkel_delete');
            Route::get('/dataMusbangkel', [PengajuanController::class, 'dataMusbangkel'])->name('dataMusbangkel');
        });
    });
});
