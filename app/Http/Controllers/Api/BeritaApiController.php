<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = BeritaModel::with('user')
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function banner(Request $request)
    {
        $all_data = BeritaModel::with('user')
            ->latest()
            ->take(5)
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }
}
