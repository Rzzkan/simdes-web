<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetaDesaModel;
use Illuminate\Http\Request;

class PetaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Data Desa';
        $title = 'Kelola Peta Desa';
        $subtitle = 'Edit Peta Desa';

        $data_edit = PetaDesaModel::first();

        return view('admin.peta_desa.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
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

        $data_up = PetaDesaModel::findOrFail($id);

        $dataUp['keterangan'] = $request->keterangan;
        $dataUp['url_maps'] = $request->url_maps;

        $data_up = PetaDesaModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('peta_desa.index')->with(['success' => 'Data Berhasil Disimpan']);
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
