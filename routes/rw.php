<?php 

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['cekUserLogin:rukun warga']], function () {
        Route::controller(RequestController::class)->group(function () {
            Route::get('request', 'index');
            Route::get('request/add', 'create');
            Route::post('request', 'store');
            Route::get('request/{request}/edit', 'edit');
            Route::put('request/{musbangkel}', 'update');
            Route::get('request/{request}', 'show');
            Route::delete('request/{request}', 'destroy');
            Route::get('/dataRequest', [RequestController::class, 'dataRequest'])->name('dataRequest');
        });
    });

});