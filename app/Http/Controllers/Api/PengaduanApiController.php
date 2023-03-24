<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use Illuminate\Http\Request;

class PengaduanApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = PengaduanModel::with('user')
            ->where('id_user', auth()->user()->id)
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
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

        $data_input = PengaduanModel::create([
            'id_user' => auth()->user()->id,
            'gambar' => $gambar,
            'catatan' => '-',
            'tindakan' => '-',
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'message' => 'Berhasil',
            'data' => $data_input,
            'response' => true,
        ], 200);
    }
}
