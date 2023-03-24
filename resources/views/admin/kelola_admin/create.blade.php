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
        <form class="row mt-3" method="POST" action="{{ route('kelola_admin.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group col-md-6">
                <label class="col-12">Role</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-normal" name="role">
                        <option>Admin</option>
                        <option>Super Admin</option>
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
                    <input type="text" name="name" class="form-control form-control-normal" placeholder="Nama...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Email</label>
                <div class="col-sm-12">
                    <input type="email" placeholder="Email..." name="email" class="form-control form-control-normal">
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