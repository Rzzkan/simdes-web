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
        <form class="row mt-3" method="POST" action="{{ route('profil.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

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

            <hr class="horizontal dark my-3">
            <strong class="text-center text-dark">Ubah Password</strong>
            <hr class="horizontal dark my-3">

            <div class="form-group col-md-6">
                <label class="col-12">Password</label>
                <div class="col-sm-12">
                    <input type="password" value="" placeholder="********" name="password" class="form-control form-control-normal">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Ulangi Password</label>
                <div class="col-sm-12">
                    <input type="password" value="" placeholder="********" name="password2" class="form-control form-control-normal">
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