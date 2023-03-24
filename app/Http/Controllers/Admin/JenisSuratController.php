<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSuratModel;
use App\Models\SyaratPengajuanSuratModel;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Pengaturan';
        $title = 'Kelola Jenis Surat';
        $subtitle = 'Data Jenis Surat';

        $all_data = JenisSuratModel::all();

        return view('admin.jenis_surat.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toptitle = 'Pengaturan';
        $title = 'Kelola Jenis Surat';
        $subtitle = 'Tambah Jenis Surat';

        return view('admin.jenis_surat.create', compact(
            'toptitle',
            'title',
            'subtitle',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data_input = JenisSuratModel::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('jenis_surat.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toptitle = 'Pengaturan';
        $title = 'Kelola Jenis Surat';
        $subtitle = 'Syarat Pengajuan Surat';

        $data_show = JenisSuratModel::where('id', $id)->with('syarat')->first();

        return view('admin.jenis_surat.show', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_show',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toptitle = 'Pengaturan';
        $title = 'Kelola Jenis Surat';
        $subtitle = 'Edit Jenis Surat';

        $data_edit = JenisSuratModel::where('id', $id)->first();

        return view('admin.jenis_surat.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
        ));
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
        $request->validate([
            'nama' => 'required',
        ]);

        $data_up = JenisSuratModel::findOrFail($id);

        $dataUp['nama'] = $request->nama;
        $dataUp['keterangan'] = $request->keterangan;

        $data_up = JenisSuratModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('jenis_surat.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = JenisSuratModel::find($id);
        $data_del->delete();
        return redirect()->route('jenis_surat.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
