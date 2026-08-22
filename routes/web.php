<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;

// RUTE AUTENTIKASI
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return redirect()->route('dashboard'); });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // DATA KEGIATAN (Terpusat di KegiatanController)
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/tambah', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan/simpan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    
    // RUTE CETAK
    Route::get('/kegiatan/cetak-semua', [KegiatanController::class, 'cetakSemua'])->name('kegiatan.cetakSemua');

    // LAPORAN LAINNYA
    Route::get('/kontrak', [DashboardController::class, 'kontrakPage'])->name('kontrak.index');
    Route::get('/laporan-spm', [DashboardController::class, 'spmPage'])->name('laporan.spm');
    Route::get('/laporan-kontrak', [DashboardController::class, 'kontrakPage'])->name('laporan.kontrak');
    
    Route::get('/pembayaran', [DashboardController::class, 'pembayaranPage'])->name('pembayaran.index');
    Route::get('/dokumen', [DashboardController::class, 'dokumenPage'])->name('dokumen.index');
    Route::get('/kalender', [DashboardController::class, 'kalenderPage'])->name('kalender.index');
});