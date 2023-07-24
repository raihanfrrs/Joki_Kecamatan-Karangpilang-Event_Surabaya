<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;


Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['cekUserLogin:rukun warga']], function () {
        Route::controller(RequestController::class)->group(function () {
            /* REQUEST EVENT */
            Route::get('request/event', 'index_event');
            Route::get('request/event/add', 'create_event');
            Route::post('request/event', 'store_event');
            Route::get('request/event/{event}/edit', 'edit_event');
            Route::put('request/event/{event}', 'update_event');
            Route::get('request/event/{event}', 'show_event');
            Route::delete('request/event/{event}', 'destroy_event');
            Route::get('/dataRequestEvent', [RequestController::class, 'dataRequestEvent'])->name('dataRequestEvent');

            /* REQUEST MUSBANGKEL */
            Route::get('request/musbangkel', 'index_musbangkel');
            Route::get('request/musbangkel/add', 'create_musbangkel');
            Route::post('request/musbangkel', 'store_musbangkel');
            Route::get('request/musbangkel/{musbangkel}/edit', 'edit_musbangkel');
            Route::put('request/musbangkel/{musbangkel}', 'update_musbangkel');
            Route::get('request/musbangkel/{musbangkel}', 'show_musbangkel');
            Route::delete('request/musbangkel/{musbangkel}', 'destroy_musbangkel');
            Route::get('/dataRequestMusbangkel', [RequestController::class, 'dataRequestMusbangkel'])->name('dataRequestMusbangkel');
        });
    });

});