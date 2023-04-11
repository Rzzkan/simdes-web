<?php

use App\Http\Controllers\Admin\APBDesaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataWargaController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\Admin\KelolaAdminController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\LapakDesaController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PengajuanSuratController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PetaDesaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SdgsController;
use App\Http\Controllers\Admin\StatistikWargaController;
use App\Http\Controllers\Admin\SyaratPengajuanSuratController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'statistik_warga'], function () {
    Route::get('umur_rentang', [StatistikWargaController::class, 'umur_rentang'])
        ->name('statistik_warga.umur_rentang');
    Route::get('umur_kategori', [StatistikWargaController::class, 'umur_kategori'])
        ->name('statistik_warga.umur_kategori');
    Route::get('status_pernikahan', [StatistikWargaController::class, 'status_pernikahan'])
        ->name('statistik_warga.status_pernikahan');
    Route::get('agama', [StatistikWargaController::class, 'agama'])
        ->name('statistik_warga.agama');
    Route::get('jenis_kelamin', [StatistikWargaController::class, 'jenis_kelamin'])
        ->name('statistik_warga.jenis_kelamin');
    Route::get('kewarganegaraan', [StatistikWargaController::class, 'kewarganegaraan'])
        ->name('statistik_warga.kewarganegaraan');
    Route::get('status_penduduk', [StatistikWargaController::class, 'status_penduduk'])
        ->name('statistik_warga.status_penduduk');
    Route::get('penyandang_cacat', [StatistikWargaController::class, 'penyandang_cacat'])
        ->name('statistik_warga.penyandang_cacat');
    Route::get('penyakit_menahun', [StatistikWargaController::class, 'penyakit_menahun'])
        ->name('statistik_warga.penyakit_menahun');
    Route::get('status_vaksin', [StatistikWargaController::class, 'status_vaksin'])
        ->name('statistik_warga.status_vaksin');
    Route::get('sdgs', [StatistikWargaController::class, 'sdgs'])
        ->name('statistik_warga.sdgs');
});

Route::resource('dashboard', DashboardController::class)->middleware(['checkRole:Super Admin,Admin,VIP']);
Route::resource('berita', BeritaController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('pengumuman', PengumumanController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('pengaduan', PengaduanController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('pengajuan_surat', PengajuanSuratController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('sdgs', SdgsController::class)->middleware(['checkRole:Super Admin,Admin']);

Route::resource('data_warga', DataWargaController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('peta_desa', PetaDesaController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('lapak_desa', LapakDesaController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('apb_desa', APBDesaController::class)->middleware(['checkRole:Super Admin,Admin']);

Route::resource('kelola_admin', KelolaAdminController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('jenis_surat', JenisSuratController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('syarat_pengajuan_surat', SyaratPengajuanSuratController::class)->middleware(['checkRole:Super Admin,Admin']);
Route::resource('konfigurasi', KonfigurasiController::class)->middleware(['checkRole:Super Admin']);
Route::resource('profil', ProfilController::class)->middleware(['checkRole:Super Admin']);

require __DIR__ . '/auth.php';
