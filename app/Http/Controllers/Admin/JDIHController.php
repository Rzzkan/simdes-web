<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JDIHModel;
use Illuminate\Http\Request;

class JDIHController extends Controller
{
    public function index()
    {
        $toptitle = 'Data Desa';
        $title = 'Dok. JDIH';
        $subtitle = 'Data Dok. JDIH';

        $all_data = JDIHModel::with('user')
            ->orderby('id', 'DESC')
            ->get();

        return view('admin.jdih.index', compact(
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
        $title = 'Dok. JDIH';
        $subtitle = 'Tambah Dok. JDIH';

        return view('admin.jdih.create', compact(
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
            'berkas' => 'required|mimes:pdf',
        ]);

        $berkas = "";
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $berkas = 'berkas/' . $fileName;
        }

        $data_input = JDIHModel::create([
            'id_user' => auth()->user()->id,
            'judul' => $request->judul,
            'berkas' => $berkas,
        ]);

        return redirect()->route('jdih.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Dok. JDIH';
        $subtitle = 'Edit Dok. JDIH';

        $data_edit = JDIHModel::where('id', $id)->first();

        return view('admin.jdih.edit', compact(
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

        $data_up = JDIHModel::findOrFail($id);

        $fileName = $data_up->berkas;

        if ($request->hasFile('berkas')) {
            $request->validate([
                'berkas' => 'required|mimes:pdf',
            ]);

            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['berkas'] = 'berkas/' . $fileName;
        }

        $dataUp['judul'] = $request->judul;

        $data_up = JDIHModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('jdih.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = JDIHModel::find($id);
        $data_del->delete();
        return redirect()->route('jdih.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
