<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PengajuanController;


Route::middleware('auth')->group(function () {

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
            Route::put('event/{event}/feedback', 'event_update_feedback');
            Route::get('event/{event}', 'event_show');
            Route::delete('event/{event}', 'event_destroy');
            Route::get('/dataEvent', [PengajuanController::class, 'dataEvent'])->name('dataEvent');

            Route::get('musbangkel', 'musbangkel_index');
            Route::get('musbangkel/{musbangkel}/edit', 'musbangkel_edit');
            Route::put('musbangkel/{musbangkel}', 'musbangkel_update');
            Route::get('musbangkel/{musbangkel}/status', 'musbangkel_update_status');
            Route::get('musbangkel/{musbangkel}', 'musbangkel_show');
            Route::put('musbangkel/{musbangkel}/feedback', 'musbangkel_update_feedback');
            Route::delete('musbangkel/{musbangkel}', 'musbangkel_destroy');
            Route::get('/dataMusbangkel', [PengajuanController::class, 'dataMusbangkel'])->name('dataMusbangkel');
        });
    });
    
});