<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengumumanModel;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Pengumuman';
        $subtitle = 'Data Pengumuman';

        $all_data = PengumumanModel::all();

        return view('admin.pengumuman.index', compact(
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
        $toptitle = 'Fitur';
        $title = 'Kelola Pengumuman';
        $subtitle = 'Tambah Pengumuman';

        return view('admin.pengumuman.create', compact(
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $gambar = "";
        if ($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $gambar = 'berkas/' . $fileName;
        }

        $data_input = PengumumanModel::create([
            'id_user' => auth()->user()->id,
            'id_kategori' => 1,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kelola Pengumuman';
        $subtitle = 'Edit Pengumuman';

        $data_edit = PengumumanModel::where('id', $id)->first();

        return view('admin.pengumuman.edit', compact(
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $data_up = PengumumanModel::findOrFail($id);

        $fileName = $data_up->gambar;

        if ($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['gambar'] = 'berkas/' . $fileName;
        }

        $dataUp['id_kategori'] = 1;
        $dataUp['judul'] = $request->judul;
        $dataUp['deskripsi'] = $request->deskripsi;

        $data_up = PengumumanModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = PengumumanModel::find($id);
        $data_del->delete();
        return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
