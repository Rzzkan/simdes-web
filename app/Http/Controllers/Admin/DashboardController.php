<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LapakDesaModel;
use App\Models\PengaduanModel;
use App\Models\PengajuanSuratModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Statistik Warga';
        $title = 'Data Statistik Warga';
        $subtitle = 'Data Statistik Warga';

        $jumlah_pengaduan = PengaduanModel::count();
        $jumlah_pengajuan_surat = PengajuanSuratModel::count();
        $jumlah_warga = User::where('role', 'warga')->orwhere('role', 'VIP')->count();
        $jumlah_produk = LapakDesaModel::count();

        return view('admin.dashboard.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'jumlah_pengaduan',
            'jumlah_pengajuan_surat',
            'jumlah_warga',
            'jumlah_produk',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
