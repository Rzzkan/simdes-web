<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Profil';
        $subtitle = 'Edit Profil';

        $data_edit = User::where('id', auth()->user()->id)->first();

        return view('admin.profil.edit', compact(
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
        $toptitle = 'Fitur';
        $title = 'Kelola Profil';
        $subtitle = 'Edit Profil';

        $data_edit = User::where('id', $id)->first();

        return view('admin.profil.edit', compact(
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
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($request->password != null) {
            if ($request->password == $request->password2) {
                $dataUpUser['password'] = Hash::make($request->password);
            } else {
                return redirect()->route('profil.index')->with(['danger' => 'Password Tidak Sesuai']);
            }
        }

        $dataUpUser['name'] = $request->name;
        $dataUpUser['email'] = $request->email;
        $dataUpUser['nik'] = $request->nik;

        $data_up_user = User::findOrFail($id);

        $data_up_user->update($dataUpUser);

        return redirect()->route('profil.index')->with(['success' => 'Data Berhasil Disimpan']);
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
