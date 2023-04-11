<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilModel;
use App\Models\SdgsModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikWargaController extends Controller
{
    public function sdgs()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data SDGs';

        $data_edit = SdgsModel::first();

        return view('admin.statistik_warga.sdgs', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
        ));
    }

    public function status_vaksin()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Status Vaksin';

        $dataPernikahan = DB::table('profil')
            ->select('status_vaksin', DB::raw('count(id) as total'))
            ->groupBy('status_vaksin')
            ->orderBy('status_vaksin')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.status_vaksin', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function penyakit_menahun()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Penyakit Menahun';

        $totalWarga = [
            'balita' => 0,
            'kanak_kanak' => 0,
            'remaja' => 0,
            'dewasa' => 0,
            'lansia' => 0,
        ];

        $tanggalLahirList = ProfilModel::select('Tanggal_lahir', 'penyakit_menahun')
            ->where('Tanggal_lahir', '!=', null)
            ->where('penyakit_menahun', '!=', null)
            ->get();

        foreach ($tanggalLahirList as $tanggalLahir) {
            $usia = Carbon::parse($tanggalLahir->Tanggal_lahir)->age;
            if ($usia <= 5) {
                $totalWarga['balita']++;
            } elseif ($usia <= 11) {
                $totalWarga['kanak_kanak']++;
            } elseif ($usia <= 25) {
                $totalWarga['remaja']++;
            } elseif ($usia <= 45) {
                $totalWarga['dewasa']++;
            } else {
                $totalWarga['usia61_plus']++;
            }
        }

        $get_data = $totalWarga;

        return view('admin.statistik_warga.penyakit_menahun', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function penyandang_cacat()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Penyandang Cacat';

        $totalWarga = [
            'balita' => 0,
            'kanak_kanak' => 0,
            'remaja' => 0,
            'dewasa' => 0,
            'lansia' => 0,
        ];

        $tanggalLahirList = ProfilModel::select('Tanggal_lahir', 'penyandang_cacat')
            ->where('Tanggal_lahir', '!=', null)
            ->where('penyandang_cacat', '!=', null)
            ->get();

        foreach ($tanggalLahirList as $tanggalLahir) {
            $usia = Carbon::parse($tanggalLahir->Tanggal_lahir)->age;
            if ($usia <= 5) {
                $totalWarga['balita']++;
            } elseif ($usia <= 11) {
                $totalWarga['kanak_kanak']++;
            } elseif ($usia <= 25) {
                $totalWarga['remaja']++;
            } elseif ($usia <= 45) {
                $totalWarga['dewasa']++;
            } else {
                $totalWarga['usia61_plus']++;
            }
        }

        $get_data = $totalWarga;

        return view('admin.statistik_warga.penyandang_cacat', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function status_penduduk()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Status Penduduk';

        $dataPernikahan = DB::table('profil')
            ->select('status_penduduk', DB::raw('count(id) as total'))
            ->groupBy('status_penduduk')
            ->orderBy('status_penduduk')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.status_penduduk', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function kewarganegaraan()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Kewarganegaraan';

        $dataPernikahan = DB::table('profil')
            ->select('kewarganegaraan', DB::raw('count(id) as total'))
            ->groupBy('kewarganegaraan')
            ->orderBy('kewarganegaraan')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.kewarganegaraan', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function jenis_kelamin()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Jenis Kelamin';

        $dataPernikahan = DB::table('profil')
            ->select('jenis_kelamin', DB::raw('count(id) as total'))
            ->groupBy('jenis_kelamin')
            ->orderBy('jenis_kelamin')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.jenis_kelamin', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function agama()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Agama';

        $dataPernikahan = DB::table('profil')
            ->select('agama', DB::raw('count(id) as total'))
            ->groupBy('agama')
            ->orderBy('agama')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.agama', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function status_pernikahan()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Status Pernikahan';

        $dataPernikahan = DB::table('profil')
            ->select('status_perkawinan', DB::raw('count(id) as total'))
            ->groupBy('status_perkawinan')
            ->orderBy('status_perkawinan')
            ->get();

        $get_data = $dataPernikahan;

        return view('admin.statistik_warga.status_pernikahan', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function umur_kategori()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Umur (Kategori)';

        $totalWarga = [
            'balita' => 0,
            'kanak_kanak' => 0,
            'remaja' => 0,
            'dewasa' => 0,
            'lansia' => 0,
        ];

        $tanggalLahirList = DB::table('profil')->pluck('Tanggal_lahir');

        foreach ($tanggalLahirList as $tanggalLahir) {
            $usia = Carbon::parse($tanggalLahir)->age;
            if ($usia <= 5) {
                $totalWarga['balita']++;
            } elseif ($usia <= 11) {
                $totalWarga['kanak_kanak']++;
            } elseif ($usia <= 25) {
                $totalWarga['remaja']++;
            } elseif ($usia <= 45) {
                $totalWarga['dewasa']++;
            } else {
                $totalWarga['usia61_plus']++;
            }
        }

        $get_data = $totalWarga;

        return view('admin.statistik_warga.umur_kategori', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }

    public function umur_rentang()
    {
        $toptitle = 'Fitur';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Umur (Rentang)';

        $totalWarga = [
            'usia0_5' => 0,
            'usia6_20' => 0,
            'usia21_40' => 0,
            'usia41_50' => 0,
            'usia51_60' => 0,
            'usia61_plus' => 0,
        ];

        $tanggalLahirList = DB::table('profil')->pluck('Tanggal_lahir');

        foreach ($tanggalLahirList as $tanggalLahir) {
            $usia = Carbon::parse($tanggalLahir)->age;
            if ($usia <= 5) {
                $totalWarga['usia0_5']++;
            } elseif ($usia <= 20) {
                $totalWarga['usia6_20']++;
            } elseif ($usia <= 40) {
                $totalWarga['usia21_40']++;
            } elseif ($usia <= 50) {
                $totalWarga['usia41_50']++;
            } elseif ($usia <= 60) {
                $totalWarga['usia51_60']++;
            } else {
                $totalWarga['usia61_plus']++;
            }
        }

        $get_data = $totalWarga;

        return view('admin.statistik_warga.umur_rentang', compact(
            'toptitle',
            'title',
            'subtitle',
            'get_data',
        ));
    }
}
