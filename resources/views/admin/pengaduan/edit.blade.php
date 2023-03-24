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
        <form class="row" method="POST" action="{{ route('pengaduan.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <strong>Oleh: {{ $data_edit->user->name }}</strong><br>
            <small>{{ $data_edit->deskripsi }}</small><br>
            <hr>
            <strong>Tindakan: </strong>
            <div class="form-group col-md-4">
                <select class="form-select" aria-label="Pilih Salah Satu" name="tindakan">
                    <option @if($data_edit->tindakan=="Tidak Disetujui") selected @endif value="Tidak Disetujui">Tidak Disetujui</option>
                    <option @if($data_edit->tindakan=="Disetujui") selected @endif value="Disetujui">Disetujui</option>
                </select>
            </div>
            <strong>Catatan: </strong>
            <div class="form-group col-md-12">
                <div class="col-sm-12">
                    <textarea name="catatan" class="form-control form-control-normal" placeholder="Catatan...">{{ $data_edit->catatan }}</textarea>
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