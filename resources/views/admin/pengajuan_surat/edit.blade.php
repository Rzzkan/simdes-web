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
        <form class="row mt-3" method="POST" action="{{ route('pengajuan_surat.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <hr class="horizontal dark my-3">
            <strong class="text-center">
                {{ $data_edit->nama_surat . ' | ' . $data_edit->nama_user }}
            </strong><br>
            <small class="text-center">Berkas Syarat Pengajuan: </small>

            <hr class="horizontal dark my-3">

            <div class="row">
                @foreach($data_syarat as $dt)
                <div class="col-md-3 text-center">
                    <div class="border p-2">
                        <strong>{{ $dt->nama }}</strong><br>
                        <a href="{{ asset($dt->berkas) }}" target="_blank" rel="">
                            <img height="120px" src="{{ asset($dt->berkas) }}" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <hr class="horizontal dark my-3">

            <div class="form-group col-md-4">
                <label class="col-12">Tindakan: </label>
                <select class="form-select" aria-label="Pilih Salah Satu" name="tindakan">
                    <option @if($data_edit->tindakan=="Tidak Disetujui") selected @endif value="Tidak Disetujui">Tidak Disetujui</option>
                    <option @if($data_edit->tindakan=="Disetujui") selected @endif value="Disetujui">Disetujui</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label class="col-12">Catatan: </label>
                <div class="col-sm-12">
                    <textarea name="catatan" class="form-control form-control-normal" placeholder="Catatan...">{{ $data_edit->catatan }}</textarea>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-12">Kirim Surat</label>
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