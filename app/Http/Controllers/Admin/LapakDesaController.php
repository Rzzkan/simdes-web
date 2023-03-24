<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LapakDesaModel;
use Illuminate\Http\Request;

class LapakDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Data Desa';
        $title = 'Lapak Desa';
        $subtitle = 'Data Lapak Desa';

        $all_data = LapakDesaModel::with('user')->get();

        return view('admin.lapak_desa.index', compact(
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
        $toptitle = 'Data Desa';
        $title = 'Lapak Desa';
        $subtitle = 'Tambah Lapak Desa';

        return view('admin.lapak_desa.create', compact(
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
            'harga' => 'required',
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

        $data_input = LapakDesaModel::create([
            'id_user' => auth()->user()->id,
            'id_kategori' => 1,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('lapak_desa.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $toptitle = 'Data Desa';
        $title = 'Lapak Desa';
        $subtitle = 'Edit Lapak Desa';

        $data_edit = LapakDesaModel::where('id', $id)->first();

        return view('admin.lapak_desa.edit', compact(
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

        $data_up = LapakDesaModel::findOrFail($id);

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
        $dataUp['harga'] = $request->harga;
        $dataUp['deskripsi'] = $request->deskripsi;

        $data_up = LapakDesaModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('lapak_desa.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = LapakDesaModel::find($id);
        $data_del->delete();
        return redirect()->route('lapak_desa.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
