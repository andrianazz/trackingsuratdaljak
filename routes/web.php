<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SubBidangController;
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

    //Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');

    //Jenis Surat
    Route::get('/jenissurat', [JenisSuratController::class, 'index'])->name('jenissurat');
    Route::post('/store/jenissurat', [JenisSuratController::class, 'store'])->name('store_jenissurat');

    //Sub Bidang
    Route::get('/subbidang', [SubBidangController::class, 'index'])->name('subbidang');

    //Bidang
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
});
