<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SyaratPengajuanSuratModel;
use Illuminate\Http\Request;

class SyaratPengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama' => 'required',
        ]);

        $status = 0;
        if ($request->status == 1) {
            $status = $request->status;
        }

        $data_input = SyaratPengajuanSuratModel::create([
            'id_jenis_surat' => $request->id_jenis_surat,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status' => $status,
        ]);

        return redirect()->route('jenis_surat.show', $request->id_jenis_surat)->with(['success' => 'Data Berhasil Disimpan']);
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
        $toptitle = 'Pengaturan';
        $title = 'Kelola Jenis Surat';
        $subtitle = 'Edit Syarat Pengajuan Surat';

        $data_edit = SyaratPengajuanSuratModel::where('id', $id)->first();

        return view('admin.syarat_pengajuan_surat.edit', compact(
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

        $status = 0;
        if ($request->status == 1) {
            $status = $request->status;
        }

        $data_up = SyaratPengajuanSuratModel::findOrFail($id);

        $dataUp['nama'] = $request->nama;
        $dataUp['keterangan'] = $request->keterangan;
        $dataUp['status'] = $status;

        $data_up->update($dataUp);
        return redirect()->route('jenis_surat.show', $data_up->id_jenis_surat)->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = SyaratPengajuanSuratModel::find($id);
        $data_del->delete();
        return redirect()->route('jenis_surat.show', $data_del->id_jenis_surat)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
