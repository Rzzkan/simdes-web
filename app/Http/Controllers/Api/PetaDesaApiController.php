<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetaDesaModel;
use Illuminate\Http\Request;

class PetaDesaApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = PetaDesaModel::orderby('id', 'DESC')
            ->first();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }
}
