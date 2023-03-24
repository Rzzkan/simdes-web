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
        <form class="row mt-3" method="POST" action="{{ route('apb_desa.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="form-group col-md-6">
                <label class="col-12">Judul</label>
                <div class="col-sm-12">
                    <input value="{{ $data_edit->judul }}" type="text" name="judul" class="form-control form-control-normal" placeholder="Judul...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Berkas</label>
                <div class="col-12">
                    <input type="file" name="berkas" class="form-control form-control-normal mb-2">
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