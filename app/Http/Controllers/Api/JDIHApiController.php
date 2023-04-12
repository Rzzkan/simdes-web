<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JDIHModel;
use Illuminate\Http\Request;

class JDIHApiController extends Controller
{
    public function get(Request $request)
    {
        $all_data = JDIHModel::with('user')
            ->orderby('id', 'DESC')
            ->get();

        return response()->json([
            'message' => 'Berhasil',
            'data' => $all_data,
            'response' => true,
        ], 200);
    }

    public function top_5(Request $request)
    {
        $all_data = JDIHModel::with('user')
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
