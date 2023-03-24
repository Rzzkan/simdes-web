<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KonfigurasiModel;
use Exception;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Pengaturan';
        $title = 'Konfigurasi Sistem';
        $subtitle = 'Setting Konfigurasi';

        $data_edit = KonfigurasiModel::first();

        return view('admin.konfigurasi.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit'
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
        $konfigurasi = KonfigurasiModel::findOrFail($id);

        $logo = $konfigurasi->logo;

        if ($file = $request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/logo';
            $file->move($destinationPath, $fileName);
            try {
                unlink(public_path() . '/' . $logo);
            } catch (Exception $e) {
            }
            $logo = 'logo/' . $fileName;
        }

        $dataUp['kontak'] = $request->kontak;
        $dataUp['nama_sistem'] = $request->nama_sistem;
        $dataUp['nama_sekolah'] = $request->nama_sekolah;
        $dataUp['logo'] = $logo;

        $konfigurasi->update($dataUp);
        return redirect()->route('konfigurasi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
