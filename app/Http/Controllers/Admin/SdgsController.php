<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SdgsModel;
use Illuminate\Http\Request;

class SdgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola SDGs';
        $subtitle = 'Edit SDGs';

        $data_edit = SdgsModel::first();

        return view('admin.sdgs.edit', compact(
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

        $data_up = SdgsModel::findOrFail($id);

        $dataUp['sdgs_1'] = $request->sdgs_1;
        $dataUp['sdgs_2'] = $request->sdgs_2;
        $dataUp['sdgs_3'] = $request->sdgs_3;
        $dataUp['sdgs_4'] = $request->sdgs_4;
        $dataUp['sdgs_5'] = $request->sdgs_5;
        $dataUp['sdgs_6'] = $request->sdgs_6;
        $dataUp['sdgs_7'] = $request->sdgs_7;
        $dataUp['sdgs_8'] = $request->sdgs_8;
        $dataUp['sdgs_9'] = $request->sdgs_9;
        $dataUp['sdgs_10'] = $request->sdgs_10;
        $dataUp['sdgs_11'] = $request->sdgs_11;
        $dataUp['sdgs_12'] = $request->sdgs_12;
        $dataUp['sdgs_13'] = $request->sdgs_13;
        $dataUp['sdgs_14'] = $request->sdgs_14;
        $dataUp['sdgs_15'] = $request->sdgs_15;
        $dataUp['sdgs_16'] = $request->sdgs_16;
        $dataUp['sdgs_17'] = $request->sdgs_17;
        $dataUp['sdgs_18'] = $request->sdgs_18;

        $data_up = SdgsModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('sdgs.index')->with(['success' => 'Data Berhasil Disimpan']);
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
