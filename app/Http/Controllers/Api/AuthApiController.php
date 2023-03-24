<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $get_data['user'] = $user;
            return response()->json([
                'message' => 'Berhasil',
                'data' => $get_data,
                'response' => true,
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data_up_user = User::findOrFail(auth()->user()->id);
        $gambar = $data_up_user->avatar;

        if ($file = $request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $gambar = 'berkas/' . $fileName;
        }

        if ($request->password != null && $request->password_confirmation != null) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $dataUpUser['password'] = Hash::make($request->password);
        }

        $dataUpUser['name'] = $request->nama;
        $dataUpUser['email'] = $request->email;
        $dataUpUser['avatar'] = $gambar;
        $dataUpUser['alamat'] = $request->alamat;
        $dataUpUser['no_hp'] = $request->no_hp;

        $data_up_user->update($dataUpUser);

        return response()->json([
            'message' => 'Berhasil',
            'data' => $data_up_user,
            'response' => true,
        ], 200);
    }
}
