<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin']);
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');
        Route::resource('instansi', InstansiController::class);
        Route::resource('pengguna', PenggunaController::class);
    });

    Route::group(['middleware' => ['role:pj_dinkes'], 'prefix' => 'dinkes'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dinkes'])->name('dashboard.pj_dinkes');
    });

    Route::group(['middleware' => ['role:pj_puskes'], 'prefix' => 'puskes'], function () {
        Route::get('/dashboard', [DashboardController::class, 'puskes'])->name('dashboard.pj_puskes');
    });

    Route::group(['middleware' => ['role:kabid'], 'prefix' => 'kabid'], function () {
        Route::get('/dashboard', [DashboardController::class, 'kabid'])->name('dashboard.kabid');
    });

    Route::group(['middleware' => ['role:kapus'], 'prefix' => 'kapus'], function () {
        Route::get('/dashboard', [DashboardController::class, 'kapus'])->name('dashboard.kapus');
    });

    Route::group(['middleware' => ['role:kadis'], 'prefix' => 'kadis'], function () {
        Route::get('/dashboard', [DashboardController::class, 'kadis'])->name('dashboard.kadis');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
