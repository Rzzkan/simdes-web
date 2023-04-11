<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSuratModel;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Pengajuan Surat';
        $subtitle = 'Data Pengajuan Surat';

        $all_data = DB::table('pengajuan_surat')
            ->select('pengajuan_surat.*', 'users.name as nama_user', 'jenis_surat.nama as nama_surat')
            ->leftJoin('users', 'users.id', '=', 'pengajuan_surat.id_user')
            ->leftJoin('jenis_surat', 'jenis_surat.id', '=', 'pengajuan_surat.id_jenis_surat')
            ->orderby('id', 'DESC')
            ->get();

        return view('admin.pengajuan_surat.index', compact(
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
        $title = 'Pengajuan Surat';
        $subtitle = 'Edit Pengajuan Surat';

        $data_edit = DB::table('pengajuan_surat')
            ->select('pengajuan_surat.*', 'users.name as nama_user', 'jenis_surat.nama as nama_surat')
            ->leftJoin('users', 'users.id', '=', 'pengajuan_surat.id_user')
            ->leftJoin('jenis_surat', 'jenis_surat.id', '=', 'pengajuan_surat.id_jenis_surat')
            ->where('pengajuan_surat.id', $id)
            ->first();

        $data_syarat = DB::table('syarat_pengajuan_surat')
            ->select('syarat_pengajuan_surat.*', 'syarat_pengajuan_surat_user.berkas as berkas')
            ->leftJoin('syarat_pengajuan_surat_user', function (JoinClause $join) use ($data_edit) {
                $join->on('syarat_pengajuan_surat_user.id_syarat', '=', 'syarat_pengajuan_surat.id')
                    ->where('syarat_pengajuan_surat_user.id_user', '=', $data_edit->id_user)
                    ->where('syarat_pengajuan_surat_user.id_pengajuan_surat', '=', $data_edit->id);
            })
            ->where('syarat_pengajuan_surat.id_jenis_surat', $data_edit->id_jenis_surat)
            ->get();

        $dataUp['status_notif'] = '1';

        $data_up = PengajuanSuratModel::findOrFail($id);
        $data_up->update($dataUp);

        return view('admin.pengajuan_surat.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
            'data_syarat',
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

        $data_up = PengajuanSuratModel::findOrFail($id);

        $fileName = $data_up->gambar;

        if ($file = $request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['berkas'] = 'berkas/' . $fileName;
        }

        $dataUp['tindakan'] = $request->tindakan;
        $dataUp['catatan'] = $request->catatan;

        $data_up->update($dataUp);
        return redirect()->route('pengajuan_surat.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = PengajuanSuratModel::find($id);
        $data_del->delete();
        return redirect()->route('pengajuan_surat.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
