<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\Api\AuthApiController@login');
Route::middleware('auth:api')->post('/update_profil', 'App\Http\Controllers\Api\AuthApiController@update');

Route::middleware('auth:api')->get('/berita', 'App\Http\Controllers\Api\BeritaApiController@get');
Route::middleware('auth:api')->get('/banner', 'App\Http\Controllers\Api\BeritaApiController@banner');
Route::middleware('auth:api')->get('/pengumuman', 'App\Http\Controllers\Api\PengumumanApiController@get');
Route::middleware('auth:api')->get('/top_pengumuman', 'App\Http\Controllers\Api\PengumumanApiController@top_5');
Route::middleware('auth:api')->get('/pengaduan', 'App\Http\Controllers\Api\PengaduanApiController@get');
Route::middleware('auth:api')->post('/pengaduan', 'App\Http\Controllers\Api\PengaduanApiController@create');
Route::middleware('auth:api')->get('/pengajuan_surat', 'App\Http\Controllers\Api\PengajuanSuratApiController@get');
Route::middleware('auth:api')->get('/pengajuan_surat/jenis_surat', 'App\Http\Controllers\Api\PengajuanSuratApiController@jenis_surat');
Route::middleware('auth:api')->post('/pengajuan_surat/syarat_surat', 'App\Http\Controllers\Api\PengajuanSuratApiController@syarat_surat');
Route::middleware('auth:api')->post('/pengajuan_surat/create_pengajuan_surat', 'App\Http\Controllers\Api\PengajuanSuratApiController@create_pengajuan_surat');
Route::middleware('auth:api')->post('/pengajuan_surat/create_syarat_surat', 'App\Http\Controllers\Api\PengajuanSuratApiController@create_syarat_surat');
Route::middleware('auth:api')->get('/konfigurasi', 'App\Http\Controllers\Api\KonfigurasiApiController@get');
Route::middleware('auth:api')->get('/peta_desa', 'App\Http\Controllers\Api\PetaDesaApiController@get');
Route::middleware('auth:api')->get('/lapak_desa', 'App\Http\Controllers\Api\LapakDesaApiController@get');
Route::middleware('auth:api')->get('/top_lapak_desa', 'App\Http\Controllers\Api\LapakDesaApiController@top_5');
Route::middleware('auth:api')->get('/apb_desa', 'App\Http\Controllers\Api\RealisasiAPBDesaApiController@get');
Route::middleware('auth:api')->get('/top_apb_desa', 'App\Http\Controllers\Api\RealisasiAPBDesaApiController@top_5');
Route::middleware('auth:api')->get('/jdih', 'App\Http\Controllers\Api\JDIHApiController@get');
Route::middleware('auth:api')->get('/top_jdih', 'App\Http\Controllers\Api\JDIHApiController@top_5');
