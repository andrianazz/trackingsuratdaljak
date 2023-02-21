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


    //Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::post('/store/pengguna', [PenggunaController::class, 'store'])->name('store-pengguna');

    //Jenis Surat
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat');
    Route::post('/store/jenis-surat', [JenisSuratController::class, 'store'])->name('store-jenis-surat');
    Route::delete('/jenis-surat/{id}/destroy', [JenisSuratController::class, 'destroy'])->name('destroy-jenis-surat');

    //Sub Bidang
    Route::get('/sub-bidang', [SubBidangController::class, 'index'])->name('sub-bidang');
    Route::post('/store/sub-bidang', [SubBidangController::class, 'store'])->name('store_sub-bidang');
    Route::delete('/sub-bidang/{id}/destroy', [SubBidangController::class, 'destroy'])->name('destroy_sub-bidang');

    //Bidang
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
    Route::post('/store/bidang', [BidangController::class, 'store'])->name('store_bidang');
    Route::delete('/bidang/{id}/destroy', [BidangController::class, 'destroy'])->name('destroy_bidang');
});
