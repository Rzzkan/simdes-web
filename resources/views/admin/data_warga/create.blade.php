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
        <form class="row mt-3" method="POST" action="{{ route('data_warga.store') }}" enctype="multipart/form-data">
            @csrf

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Data Diri</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Role</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="role">
                        <option>VIP</option>
                        <option>Warga</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">NIK</label>
                <div class="col-sm-12">
                    <input type="number" name="nik" class="form-control form-control-normal" placeholder="NIK...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Nama</label>
                <div class="col-sm-12">
                    <input type="text" name="nama" class="form-control form-control-normal" placeholder="Nama...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">No. HP</label>
                <div class="col-sm-12">
                    <input type="text" placeholder="No. HP..." name="no_hp" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Tempat Lahir</label>
                <div class="col-sm-12">
                    <input type="text" name="tempat_lahir" class="form-control form-control-normal" placeholder="Tempat Lahir...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Tanggal Lahir</label>
                <div class="col-sm-12">
                    <input placeholder="Tanggal Lahir..." type="date" name="tanggal_lahir" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Jenis Kelamin</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="jenis_kelamin">
                        <option>Laki - laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Alamat Lengkap (Sesuai KTP)</label>
                <div class="col-sm-12">
                    <textarea placeholder="Alamat Lengkap (Sesuai KTP)..." name="alamat" class="form-control form-control-normal"></textarea>
                </div>
            </div>

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Data Kewarganegaraan</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Agama</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="agama">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Perkawinan</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="status_perkawinan">
                        <option>Menikah</option>
                        <option>Belum Menikah</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Pekerjaan</label>
                <div class="col-sm-12">
                    <input placeholder="Pekerjaan..." type="text" name="pekerjaan" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Kewarganegaraan</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="kewarganegaraan">
                        <option>WNI</option>
                        <option>WNA</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Latar Belakang Pendidikan</label>
                <div class="col-sm-12">
                    <input placeholder="Latar Belakang Pendidikan..." type="text" name="pendidikan" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Penduduk</label>
                <div class="col-sm-12">
                    <input placeholder="Status Penduduk..." type="text" name="status_penduduk" class="form-control form-control-normal">
                </div>
            </div>

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Kesehatan</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Penyandang Cacat</label>
                <div class="col-sm-12">
                    <textarea placeholder="Penyandang Cacat..." name="penyandang_cacat" class="form-control form-control-normal"></textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Penyakit Menahun</label>
                <div class="col-sm-12">
                    <textarea placeholder="Penyakit Menahun..." name="penyakit_menahun" class="form-control form-control-normal"></textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Status Vaksin</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="status_vaksin">
                        <option>Belum Vaksin</option>
                        <option>Dosis 1</option>
                        <option>Dosis 2</option>
                        <option>Dosis 3</option>
                        <option>Dosis 4</option>
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