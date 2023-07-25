<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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

require __DIR__.'/authenticate.php';
require __DIR__.'/admin.php';
require __DIR__.'/rw.php';

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

    Route::get('dashboard/countAcceptedMusbangkel', 'countAcceptedMusbangkel');
    Route::get('dashboard/countAcceptedEvent', 'countAcceptedEvent');
    Route::get('dashboard/countRejectedMusbangkel', 'countRejectedMusbangkel');
    Route::get('dashboard/countRejectedEvent', 'countRejectedEvent');
});