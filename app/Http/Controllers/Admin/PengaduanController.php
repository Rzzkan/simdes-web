<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Pengaduan';
        $subtitle = 'Data Pengaduan';

        $all_data = PengaduanModel::with('user')
            ->orderby('id', 'DESC')
            ->get();

        return view('admin.pengaduan.index', compact(
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
        $toptitle = 'Fitur';
        $title = 'Kelola Pengaduan';
        $subtitle = 'Edit Pengaduan';

        $dataUp['status_notif'] = '1';

        $data_up = PengaduanModel::findOrFail($id);
        $data_up->update($dataUp);

        $data_edit = $data_up;

        return view('admin.pengaduan.edit', compact(
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
            'tindakan' => 'required',
        ]);

        $data_up = PengaduanModel::findOrFail($id);

        $dataUp['tindakan'] = $request->tindakan;
        $dataUp['catatan'] = $request->catatan;

        $data_up->update($dataUp);
        return redirect()->route('pengaduan.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = PengaduanModel::find($id);
        $data_del->delete();
        return redirect()->route('pengaduan.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
