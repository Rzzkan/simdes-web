<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataWargaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DataWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Data Warga';
        $subtitle = 'Data Data Warga';

        $all_data = DataWargaModel::with('user')->paginate(10);

        return view('admin.data_warga.index', compact(
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
        $title = 'Kelola Data Warga';
        $subtitle = 'Tambah Data Warga';

        return view('admin.data_warga.create', compact(
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
        $file = $request->file('file_data_warga');

        $validator = FacadesValidator::make($request->all(), [
            'file_data_warga' => 'required|mimes:xlsx,xls'
        ]);

        $cek_user = User::where('email', $request->nik . "@gmail.com")->count();

        if ($cek_user > 0) {
            return redirect()->route('data_warga.create')->with(['danger' => 'NIK yang anda masukan sudah digunakan. Pastikan data yang anda masukan benar!']);
        }

        if ($validator->fails()) {

            $request->validate([
                'nik' => 'required|unique:users',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pendidikan' => 'required',
                'status_penduduk' => 'required',
                'status_vaksin' => 'required',
            ]);

            $user = User::create([
                'name' => $request->nama,
                'email' => $request->nik . "@gmail.com",
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'nik' => $request->nik,
                'password' => Hash::make(date('dmY', strtotime($request->tanggal_lahir))),
                'api_token' => Hash::make(date('dmY', strtotime($request->tanggal_lahir)) . $request->nik),
            ]);

            $data_input = DataWargaModel::create([
                'id_user' => $user->id,
                'tempat_lahir' => $request->tempat_lahir,
                'Tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'pekerjaan' => $request->pekerjaan,
                'pendidikan' => $request->pendidikan,
                'status_penduduk' => $request->status_penduduk,
                'penyandang_cacat' => $request->penyandang_cacat,
                'penyakit_menahun' => $request->penyakit_menahun,
                'status_vaksin' => $request->status_vaksin,
            ]);
            return redirect()->route('data_warga.index')->with(['success' => 'Data Berhasil Disimpan']);
        }

        // $data = Excel::load($file, function ($reader) {
        // })->get();
        // Load data dari file excel
        // Undefined type 'App\Http\Controllers\Admin\PHPExcel_Style_NumberFormat'.
        $row = Excel::toArray([], $file)[0];

        for ($i = 8; $i < count($row); $i++) {
            $tanggal_lahir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[$i][6])->format('Y-m-d');

            $cek_nik = User::where('nik', $row[$i][4])->first();

            if ($cek_nik != null) {
                return redirect()->route('data_warga.create')->with(['danger' => 'Terjadi kesalahan pada baris excel ke ' . $i + 1 . '. Format excel tidak sesuai/terdapat duplicate data/terdapat data kolom yang kosong. Mohon periksa kembali file excel terlampir!']);
            }

            $user = User::create([
                'name' => $row[$i][1],
                'email' => $row[$i][4] . "@gmail.com",
                'no_hp' => $row[$i][2],
                'role' => $row[$i][3],
                'nik' => $row[$i][4],
                'password' => Hash::make(date('dmY', strtotime($tanggal_lahir))),
                'api_token' => Hash::make(date('dmY', strtotime($tanggal_lahir)) . $row[$i][4]),
            ]);

            $data_input = DataWargaModel::create([
                'id_user' => $user->id,
                'tempat_lahir' => $row[$i][5],
                'Tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $row[$i][7],
                'alamat' => $row[$i][8],
                'agama' => $row[$i][9],
                'status_perkawinan' => $row[$i][10],
                'kewarganegaraan' => $row[$i][11],
                'pekerjaan' => $row[$i][12],
                'pendidikan' => $row[$i][13],
                'status_penduduk' => $row[$i][14],
                'penyandang_cacat' => $row[$i][15],
                'penyakit_menahun' => $row[$i][16],
                'status_vaksin' => $row[$i][17],
            ]);
        }

        return redirect()->route('data_warga.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kelola Data Warga';
        $subtitle = 'Edit Data Warga';

        $data_edit = DataWargaModel::with('user')->where('id', $id)->first();

        return view('admin.data_warga.edit', compact(
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
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'kewarganegaraan' => 'required',
            'pendidikan' => 'required',
            'status_penduduk' => 'required',
            'status_vaksin' => 'required',
        ]);

        $dataUpUser['name'] = $request->nama;
        $dataUpUser['email'] = $request->nik . "@gmail.com";
        $dataUpUser['nik'] = $request->nik;
        $dataUpUser['role'] = $request->role;
        $dataUpUser['no_hp'] = $request->no_hp;
        $dataUpUser['password'] = Hash::make(date('dmY', strtotime($request->tanggal_lahir)));

        $dataUp['tempat_lahir'] = $request->tempat_lahir;
        $dataUp['Tanggal_lahir'] = $request->tanggal_lahir;
        $dataUp['jenis_kelamin'] = $request->jenis_kelamin;
        $dataUp['alamat'] = $request->alamat;
        $dataUp['agama'] = $request->agama;
        $dataUp['status_perkawinan'] = $request->status_perkawinan;
        $dataUp['kewarganegaraan'] = $request->kewarganegaraan;
        $dataUp['pekerjaan'] = $request->pekerjaan;
        $dataUp['pendidikan'] = $request->pendidikan;
        $dataUp['status_penduduk'] = $request->status_penduduk;
        $dataUp['penyandang_cacat'] = $request->penyandang_cacat;
        $dataUp['penyakit_menahun'] = $request->penyakit_menahun;
        $dataUp['status_vaksin'] = $request->status_vaksin;

        $data_up = DataWargaModel::findOrFail($id);
        $data_up_user = User::findOrFail($data_up->id_user);

        $data_up->update($dataUp);
        $data_up_user->update($dataUpUser);

        return redirect()->route('data_warga.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = DataWargaModel::find($id);
        $data_del_user = User::find($data_del->id_user);
        $data_del->delete();
        $data_del_user->delete();
        return redirect()->route('data_warga.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
