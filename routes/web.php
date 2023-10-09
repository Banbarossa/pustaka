<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggotaPegawaiController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UnduhKunjungan;
use App\Http\Livewire\DaftarPengunjung;
use App\Http\Livewire\Pengunjung;
use App\Http\Livewire\Welcome;
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

Route::get('/', Welcome::class)->name('welcome');
Route::resource('anggota', AnggotaController::class);
Route::resource('anggota-pegawai', AnggotaPegawaiController::class);
Route::get('anggota-trashed', [AnggotaController::class, 'trashed'])->name('anggota.trashed');
Route::get('anggota-restore/{id}', [AnggotaController::class, 'restore'])->name('anggota.restore');
Route::get('anggota-card/{id}', [AnggotaController::class, 'card'])->name('anggota.card');
Route::get('anggota-export-excel', [AnggotaController::class, 'exportExcel'])->name('anggota.export.excel');
Route::get('anggota-export-pdf/{role}', [AnggotaController::class, 'exportPdf'])->name('anggota.export.pdf');
Route::get('kunjungan', Pengunjung::class)->name('kunjungan.index');
Route::get('unduh-kunjungan/{startDate}/{endDate}', [UnduhKunjungan::class, 'unduhKunjungan'])->name('kunjungan.unduh');
Route::get('daftar-pengunjung', DaftarPengunjung::class)->name('kunjungan.daftar');
Route::get('card/{role}', [CardController::class, 'index'])->name('card.index');
