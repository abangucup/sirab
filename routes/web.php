<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JadwalPelayananController;
use App\Http\Controllers\KabkotController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin']);
});


Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => ['role:super_admin'], 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.super_admin');
        Route::resource('instansi', InstansiController::class);
        Route::resource('pengguna', PenggunaController::class);

        Route::group(['prefix' => 'wilayah'], function() {
            Route::resource('provinsi', ProvinsiController::class);
            Route::resource('kabkot', KabkotController::class);
            Route::resource('kecamatan', KecamatanController::class);
        });
    });

    Route::group(['middleware' => ['role:pj_dinkes_kota'], 'prefix' => 'dinkeskota'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dinkeskota'])->name('dashboard.pj_dinkes_kota');
    });

    Route::group(['middleware' => ['role:pj_dinkes_prov'], 'prefix' => 'dinkesprov'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dinkesprov'])->name('dashboard.pj_dinkes_prov');
    });

    Route::group(['middleware' => ['role:pj_puskes'], 'prefix' => 'puskes'], function () {
        Route::get('/dashboard', [DashboardController::class, 'puskes'])->name('dashboard.pj_puskes');
    });

    // CRUD JADWAL PELAYANAN
    Route::resource('petugas', PetugasController::class);

    // CRUD JADWAL PELAYANAN
    Route::resource('jadwal', JadwalPelayananController::class);

    // FITUR PENGADUAN
    Route::resource('pengaduan', PengaduanController::class)->only('create', 'edit', 'update', 'show', 'destroy');

    // FITUR TANGGAPAN
    Route::resource('tanggapan', TanggapanController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// YANG SUDAH LOGIN DAN BELUM LOGIN DAPAT MELAKUKAN PENGADUAN
Route::resource('pengaduan', PengaduanController::class)->only('index', 'store');
Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'detailPengaduan'])->name('pengaduan.detail');
