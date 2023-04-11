@extends('layouts.main')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card col-md-12">
    <div class="card-body">
        <strong>{{ $subtitle }}</strong><br>
        <span>Isikan <code> form data </code> dengan benar! </span>
        <form class="row mt-3" method="POST" action="{{ route('data_warga.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Data Diri</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Role</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="role">
                        <option value="Warga" @if($data_edit->role=='Warga') selected @endif>Warga</option>
                        <option value="VIP" @if($data_edit->role=='VIP') selected @endif>VIP</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">NIK</label>
                <div class="col-sm-12">
                    <input type="number" name="nik" value="{{ $data_edit->user->nik }}" class="form-control form-control-normal" placeholder="NIK...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Nama</label>
                <div class="col-sm-12">
                    <input type="text" name="nama" value="{{ $data_edit->user->name }}" class="form-control form-control-normal" placeholder="Nama...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">No. HP</label>
                <div class="col-sm-12">
                    <input type="text" placeholder="No. HP..." name="no_hp" value="{{ $data_edit->no_hp }}" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Tempat Lahir</label>
                <div class="col-sm-12">
                    <input type="text" name="tempat_lahir" value="{{ $data_edit->tempat_lahir }}" class="form-control form-control-normal" placeholder="Tempat Lahir...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Tanggal Lahir</label>
                <div class="col-sm-12">
                    <input placeholder="Tanggal Lahir..." type="date" name="tanggal_lahir" value="{{ $data_edit->Tanggal_lahir }}" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Jenis Kelamin</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="jenis_kelamin">
                        <option @if($data_edit->jenis_kelamin == 'Laki - laki') selected @endif>Laki - laki</option>
                        <option @if($data_edit->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Alamat Lengkap (Sesuai KTP)</label>
                <div class="col-sm-12">
                    <textarea placeholder="Alamat Lengkap (Sesuai KTP)..." name="alamat" class="form-control form-control-normal">{{ $data_edit->alamat }}</textarea>
                </div>
            </div>

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Data Kewarganegaraan</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Agama</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="agama">
                        <option @if($data_edit->agama == 'Islam') selected @endif>Islam</option>
                        <option @if($data_edit->agama == 'Kristen') selected @endif>Kristen</option>
                        <option @if($data_edit->agama == 'Katolik') selected @endif>Katolik</option>
                        <option @if($data_edit->agama == 'Hindu') selected @endif>Hindu</option>
                        <option @if($data_edit->agama == 'Budha') selected @endif>Budha</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Perkawinan</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="status_perkawinan">
                        <option @if($data_edit->status_perkawinan == 'Menikah') selected @endif>Menikah</option>
                        <option @if($data_edit->status_perkawinan == 'Belum Menikah') selected @endif>Belum Menikah</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Pekerjaan</label>
                <div class="col-sm-12">
                    <input placeholder="Pekerjaan..." type="text" name="pekerjaan" value="{{ $data_edit->pekerjaan }}" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Kewarganegaraan</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="kewarganegaraan">
                        <option @if($data_edit->kewarganegaraan == 'WNI') selected @endif>WNI</option>
                        <option @if($data_edit->kewarganegaraan == 'WNA') selected @endif>WNA</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Latar Belakang Pendidikan</label>
                <div class="col-sm-12">
                    <input placeholder="Latar Belakang Pendidikan..." type="text" name="pendidikan" value="{{ $data_edit->pendidikan }}" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Penduduk</label>
                <div class="col-sm-12">
                    <input placeholder="Status Penduduk..." type="text" name="status_penduduk" value="{{ $data_edit->status_penduduk }}" class="form-control form-control-normal">
                </div>
            </div>

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Kesehatan</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Penyandang Cacat</label>
                <div class="col-sm-12">
                    <textarea placeholder="Penyandang Cacat..." name="penyandang_cacat" value="{{ $data_edit->penyandang_cacat }}" class="form-control form-control-normal"></textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Penyakit Menahun</label>
                <div class="col-sm-12">
                    <textarea placeholder="Penyakit Menahun..." name="penyakit_menahun" value="{{ $data_edit->penyakit_menahun }}" class="form-control form-control-normal"></textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Vaksin</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="status_vaksin">
                        <option @if($data_edit->status_vaksin == 'Belum Vaksin') selected @endif>Belum Vaksin</option>
                        <option @if($data_edit->status_vaksin == 'Dosis 1') selected @endif>Dosis 1</option>
                        <option @if($data_edit->status_vaksin == 'Dosis 2') selected @endif>Dosis 2</option>
                        <option @if($data_edit->status_vaksin == 'Dosis 3') selected @endif>Dosis 3</option>
                        <option @if($data_edit->status_vaksin == 'Dosis 4') selected @endif>Dosis 4</option>
                    </select>
                </div>
            </div>

            <hr class="horizontal dark my-4">

            <div class="form-group">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection