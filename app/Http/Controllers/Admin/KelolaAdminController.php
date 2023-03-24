<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Admin';
        $subtitle = 'Data Admin';

        $all_data = User::where('role', 'Super Admin')->orwhere('role', 'Admin')->get();

        return view('admin.kelola_admin.index', compact(
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
        $toptitle = 'Fitur';
        $title = 'Kelola Admin';
        $subtitle = 'Tambah Admin';

        return view('admin.kelola_admin.create', compact(
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
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'nik' => $request->nik,
            'password' => Hash::make($request->email),
        ]);

        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kelola Admin';
        $subtitle = 'Edit Admin';

        $data_edit = User::where('id', $id)->first();

        return view('admin.kelola_admin.edit', compact(
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
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $dataUpUser['name'] = $request->name;
        $dataUpUser['email'] = $request->email;
        $dataUpUser['nik'] = $request->nik;
        $dataUpUser['role'] = $request->role;
        $dataUpUser['password'] = Hash::make($request->email);

        $data_up_user = User::findOrFail($id);

        $data_up_user->update($dataUpUser);

        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del_user = User::find($id);
        $data_del_user->delete();
        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
