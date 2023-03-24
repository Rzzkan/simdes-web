<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KonfigurasiModel;
use Illuminate\Http\Request;

class KonfigurasiApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = KonfigurasiModel::orderby('id', 'DESC')
            ->first();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }
}
