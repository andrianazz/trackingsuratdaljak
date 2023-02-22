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
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Input Surat
    Route::get('/input-surat', [SuratController::class, 'index'])->name('input-surat');
    Route::post('/input-surat/store', [SuratController::class, 'store'])->name('input-surat-store');

    //Disposisi Surat
    Route::get('/disposisi-surat', [SuratController::class, 'disposisiSurat'])->name('disposisi-surat');
    Route::put('/disposisi-surat/{id}', [SuratController::class, 'disposisiSuratUpdate'])->name('disposisi-surat-update');

    //Disposisi Selesai
    Route::get('/disposisi-selesai', [SuratController::class, 'disposisiSelesai'])->name('disposisi-selesai');

    //Disposisi Subid
    Route::get('/disposisi-surat-subbid', [SuratController::class, 'disposisiSuratSubbid'])->name('disposisi-surat-subbid');
    Route::put('/disposisi-surat-subbid/{id}', [SuratController::class, 'disposisiSuratSubbidUpdate'])->name('disposisi-surat-subbid-update');

    //Surat Selesai Subbid
    Route::get('/surat-selesai-subbid', [SuratController::class, 'suratSelesaiSubbid'])->name('surat-selesai-subbid');
    Route::put('/surat-selesai-subbid/{id}', [SuratController::class, 'suratSelesaiSubbidUpdate'])->name('surat-selesai-subbid-update');

    //Surat Selesai Kabid
    Route::get('/surat-selesai', [SuratController::class, 'suratSelesaiKabid'])->name('surat-selesai-kabid');
    Route::put('/surat-selesai/{id}', [SuratController::class, 'suratSelesaiKabidUpdate'])->name('surat-selesai-kabid-update');

    //Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna-store');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna-update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna-destroy');

    //Jenis Surat
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat');
    Route::post('/jenis-surat/store', [JenisSuratController::class, 'store'])->name('jenis-surat-store');
    Route::put('/jenis-surat/{id}', [JenisSuratController::class, 'update'])->name('jenis-surat-update');
    Route::delete('/jenis-surat/{id}', [JenisSuratController::class, 'destroy'])->name('jenis-surat-destroy');

    //Sub Bidang
    Route::get('/sub-bidang', [SubBidangController::class, 'index'])->name('sub-bidang');
    Route::post('/sub-bidang/store', [SubBidangController::class, 'store'])->name('sub-bidang-store');
    Route::put('/sub-bidang/{id}', [SubBidangController::class, 'update'])->name('sub-bidang-update');
    Route::delete('/sub-bidang/{id}', [SubBidangController::class, 'destroy'])->name('sub-bidang-destroy');

    //Bidang
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
    Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidang-store');
    Route::put('/bidang/{id}', [BidangController::class, 'update'])->name('bidang-update');
    Route::delete('/bidang/{id}', [BidangController::class, 'destroy'])->name('bidang-destroy');
});
