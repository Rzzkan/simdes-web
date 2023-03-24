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
        <h5>{{ $subtitle }}</h5>
        <span>Isikan <code> form data </code> dengan benar! </span>
        <form class="row mt-3" method="POST" action="{{ route('konfigurasi.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group col-md-6">
                <label class="col-12">Nama Sistem</label>
                <div class="col-sm-12">
                    <input type="text" value="{{ $data_edit->nama_sistem }}" name="nama_sistem" class="form-control form-control-normal" placeholder="Nama Sistem">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Nama Instansi</label>
                <div class="col-sm-12">
                    <input type="text" value="{{ $data_edit->nama_instansi }}" name="nama_sekolah" class="form-control form-control-normal " placeholder="Nama Sekolah">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Logo</label>
                <div class="col-12">
                    <input onchange="readURL(this);" type="file" name="logo" class="form-control form-control-normal mb-2" placeholder="Logo">
                    <img style="border: solid gray 1px; padding:6px; border-radius:6px;" height="80px" id="logo" src="{{ asset($data_edit->logo) }}" alt="" />
                </div>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#logo').attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Kontak</label>
                <div class="col-sm-12">
                    <input type="text" value="{{ $data_edit->kontak }}" name="kontak" class="form-control form-control-normal " placeholder="Kontak">
                </div>
            </div>

            <hr class="horizontal dark my-4">

            <div class="form-group">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan Data </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection