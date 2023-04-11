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
        <span>Isikan <code> form data </code> dengan benar! </span><br>
        <small class="text-danger">*Password secara otomatis akan terisi dengan email terdaftar. <br>
            *Contoh saat mendaftarkan <strong>budi@gmail.com</strong> maka password untuk login adalah <strong>budi@gmail.com</strong><br>
            *Pastikan pemilik akun segera mengubah <strong>password</strong> untuk keamanan akun!</small>
        <form class="row mt-3" method="POST" action="{{ route('kelola_admin.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="form-group col-md-6">
                <label class="col-12">Role</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="role">
                        <option @if($data_edit->role == 'Admin') selected @endif>Admin</option>
                        <option @if($data_edit->role == 'Super Admin') selected @endif>Super Admin</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">NIK</label>
                <div class="col-sm-12">
                    <input type="number" name="nik" value="{{ $data_edit->nik }}" class="form-control form-control-normal" placeholder="NIK...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Nama</label>
                <div class="col-sm-12">
                    <input type="text" name="name" value="{{ $data_edit->name }}" class="form-control form-control-normal" placeholder="Nama...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Email</label>
                <div class="col-sm-12">
                    <input type="email" placeholder="Email..." name="email" value="{{ $data_edit->email }}" class="form-control form-control-normal">
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