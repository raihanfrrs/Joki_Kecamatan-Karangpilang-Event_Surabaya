<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\WargaController;

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

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index');
    Route::put('profile/identity', 'update_identity');
    Route::put('profile/setting', 'update_setting');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard/countRukunWarga', 'countRukunWarga');
    Route::get('dashboard/countPhoto', 'countPhoto');
    Route::get('dashboard/countEvent', 'countEvent');
    Route::get('dashboard/countMusbangkel', 'countMusbangkel');

    Route::get('dashboard/countRequest', 'countRequest');
    Route::get('dashboard/countAccepted', 'countAccepted');
    Route::get('dashboard/countRejected', 'countRejected');
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

    Route::group(['middleware' => ['cekUserLogin:rukun warga']], function () {
        Route::controller(RequestController::class)->group(function () {
            Route::get('request', 'index');
            Route::get('request/add', 'create');
            Route::post('request', 'store');
            Route::get('request/{request}/edit', 'edit');
            Route::put('request/{musbangkel}', 'update'); // put ya patch
            Route::get('request/{request}', 'show');
            Route::delete('request/{request}', 'destroy');
            Route::get('/dataRequest', [RequestController::class, 'dataRequest'])->name('dataRequest');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::controller(MasterController::class)->group(function () {
            Route::get('rw', 'rw_index');
            Route::get('rw/add', 'rw_create');
            Route::post('rw', 'rw_store');
            Route::get('rw/{rw}/edit', 'rw_edit');
            Route::put('rw/{rw}', 'rw_update');
            Route::delete('rw/{rw}', 'rw_destroy');
            Route::get('/dataRukunWarga', [MasterController::class, 'dataRukunWarga'])->name('dataRukunWarga');

            Route::get('admin', 'admin_index');
            Route::get('/dataAdmin', [MasterController::class, 'dataAdmin'])->name('dataAdmin');
        });

        Route::controller(DocumentController::class)->group(function () {
            Route::get('photo', 'photo_index');
            Route::get('photo/add', 'photo_create');
            Route::post('photo', 'photo_store');
            Route::get('photo/{photo}/edit', 'photo_edit');
            Route::put('photo/{photo}', 'photo_update');
            Route::get('photo/{photo}', 'photo_show');
            Route::delete('photo/{photo}', 'photo_destroy');
            Route::get('/dataPhoto', [DocumentController::class, 'dataPhoto'])->name('dataPhoto');
            
            Route::get('video', 'video_index');
            Route::get('video/add', 'video_create');
            Route::post('video', 'video_store');
            Route::get('video/{video}/edit', 'video_edit');
            Route::put('video/{video}', 'video_update');
            Route::get('video/{video}', 'video_show');
            Route::delete('video/{video}', 'video_destroy');
            Route::get('/dataVideo', [DocumentController::class, 'dataVideo'])->name('dataVideo');
        });

        Route::controller(PengajuanController::class)->group(function () {
            Route::get('event', 'event_index');
            Route::get('event/{event}/edit', 'event_edit');
            Route::put('event/{event}', 'event_update');
            Route::put('event/{event}/proposal', 'event_update_proposal');
            Route::put('event/{event}/permohonan', 'event_update_permohonan');
            Route::put('event/{event}', 'event_update');
            Route::get('event/{event}/status', 'event_update_status');
            Route::get('event/{event}', 'event_show');
            Route::delete('event/{event}', 'event_destroy');
            Route::get('/dataEvent', [PengajuanController::class, 'dataEvent'])->name('dataEvent');

            Route::get('musbangkel', 'musbangkel_index');
            Route::get('musbangkel/{musbangkel}/edit', 'musbangkel_edit');
            Route::put('musbangkel/{musbangkel}', 'musbangkel_update');
            Route::get('musbangkel/{musbangkel}/status', 'musbangkel_update_status');
            Route::get('musbangkel/{musbangkel}', 'musbangkel_show');
            Route::delete('musbangkel/{musbangkel}', 'musbangkel_destroy');
            Route::get('/dataMusbangkel', [PengajuanController::class, 'dataMusbangkel'])->name('dataMusbangkel');
        });
    });
});
