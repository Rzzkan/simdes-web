<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\APBDesaModel;
use Illuminate\Http\Request;

class APBDesaController extends Controller
{
    public function index()
    {
        $toptitle = 'Data Desa';
        $title = 'Dok. Realisasi APB Desa';
        $subtitle = 'Data Dok. Realisasi APB Desa';

        $all_data = APBDesaModel::all();

        return view('admin.apb_desa.index', compact(
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
        $title = 'Dok. Realisasi APB Desa';
        $subtitle = 'Tambah Dok. Realisasi APB Desa';

        return view('admin.apb_desa.create', compact(
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
        ]);

        $berkas = "";
        if ($file = $request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $berkas = 'berkas/' . $fileName;
        }

        $data_input = APBDesaModel::create([
            'id_user' => auth()->user()->id,
            'judul' => $request->judul,
            'berkas' => $berkas,
        ]);

        return redirect()->route('apb_desa.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Dok. Realisasi APB Desa';
        $subtitle = 'Edit Dok. Realisasi APB Desa';

        $data_edit = APBDesaModel::where('id', $id)->first();

        return view('admin.apb_desa.edit', compact(
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
        ]);

        $data_up = APBDesaModel::findOrFail($id);

        $fileName = $data_up->berkas;

        if ($file = $request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['berkas'] = 'berkas/' . $fileName;
        }

        $dataUp['judul'] = $request->judul;

        $data_up = APBDesaModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('apb_desa.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = APBDesaModel::find($id);
        $data_del->delete();
        return redirect()->route('apb_desa.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
