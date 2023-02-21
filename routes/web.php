<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SubBidangController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login/auth', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Input Surat
    Route::get('/input-surat', [SuratController::class, 'index'])->name('input-surat');
    Route::post('/input-surat/store', [SuratController::class, 'store'])->name('input-surat-store');


    //Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna-store');

    //Jenis Surat
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat');
    Route::post('/jenis-surat/store', [JenisSuratController::class, 'store'])->name('jenis-surat-store');
    Route::delete('/jenis-surat/destroy/{id}', [JenisSuratController::class, 'destroy'])->name('jenis-surat-destroy');

    //Sub Bidang
    Route::get('/sub-bidang', [SubBidangController::class, 'index'])->name('sub-bidang');
    Route::post('/sub-bidang/store', [SubBidangController::class, 'store'])->name('sub-bidang-store');
    Route::delete('/sub-bidang/destroy/{id}', [SubBidangController::class, 'destroy'])->name('sub-bidang-destroy');

    //Bidang
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
    Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidang-store');
    Route::delete('/bidang/destroy/{id}', [BidangController::class, 'destroy'])->name('bidang-destroy');
});
