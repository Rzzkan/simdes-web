<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenisSuratModel;
use App\Models\PengajuanSuratModel;
use App\Models\SyaratPengajuanSuratModel;
use App\Models\SyaratPengajuanSuratUserModel;
use Illuminate\Http\Request;

class PengajuanSuratApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = PengajuanSuratModel::with('surat')->where('id_user', auth()->user()->id)
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function jenis_surat(Request $request)
    {
        $all_data = JenisSuratModel::where('status', '1')
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function syarat_surat(Request $request)
    {
        $request->validate([
            'id_pengajuan_surat' => 'required',
        ]);

        $all_data = SyaratPengajuanSuratUserModel::with('syarat')
            ->where('status', '1')
            ->where('id_pengajuan_surat', $request->id_pengajuan_surat)
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function create_pengajuan_surat(Request $request)
    {
        $request->validate([
            'id_jenis_surat' => 'required',
        ]);

        $data_input = PengajuanSuratModel::create([
            'id_user' => auth()->user()->id,
            'id_jenis_surat' => $request->id_jenis_surat,
        ]);

        $data_syarat = SyaratPengajuanSuratModel::where('id_jenis_surat', $request->id_jenis_surat)->get();

        foreach ($data_syarat as $dt) {
            $data_syarat_user = SyaratPengajuanSuratUserModel::create([
                'id_user' => auth()->user()->id,
                'id_pengajuan_surat' => $data_input->id,
                'id_syarat' => $dt->id,
                'berkas' => '-',
            ]);
        }

        return response()->json([
            'message' => 'Berhasil',
            'data' => $data_input,
            'response' => true,
        ], 200);
    }


    public function create_syarat_surat(Request $request)
    {
        $request->validate([
            'id_syarat_user' => 'required',
        ]);

        $data_up = SyaratPengajuanSuratUserModel::findOrFail($request->id_syarat_user);

        if ($file = $request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['berkas'] = 'berkas/' . $fileName;
        }

        $dataUp['id_pengajuan_surat'] = $data_up->id_pengajuan_surat;

        $data_up->update($dataUp);

        return response()->json([
            'message' => 'Berhasil',
            'data' => $data_up,
            'response' => true,
        ], 200);
    }
}
