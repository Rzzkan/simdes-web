@extends('layouts.main')
@section('content')

<div class="row">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @if(Session::has('success'))
    <div class="alert alert-success text-light py-2 px-4" role="alert">
        <small>
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <strong>Berhasil! </strong> {{ Session('success') }}
        </small>
    </div>
    @endif

    <div class="col-md-6">
        <div class="card border-radius-md">
            <div class="card-body">

                <div class="row justify-content-between mb-2">
                    <div class="col-md-12">
                        <strong><i class="fas fa-list-alt"></i> {{ $subtitle }}</strong><br>
                        <small>{{ "#" . $data_show->nama }}</small>
                    </div>
                    <div class="col-md-4 d-flex ">
                        <!-- <a href="{{ route('syarat_pengajuan_surat.create') }}" class="ms-auto border-radius-sm btn btn-sm btn-primary px-3"><i class="fas fa-plus" style="margin-right: 6px;"></i> Tambah {{ $subtitle }}</a> -->
                    </div>
                </div>

                <div class="table-responsive" style="overflow-y:hidden;">
                    <table id="data_table" class="table table-sm align-items-center px-2 mb-0 text-dark">
                        <thead class="" style="background-color: #EEEEEE;">
                            <tr>
                                <th class="">No.</th>
                                <th class="">Syarat Pengajuan Surat</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data_show->syarat as $dt)
                            <tr>
                                <td class=""><button class="btn bg-gradient-info btn-sm px-3 mb-0 disabled">{{ $no++ }}</button></td>
                                <td class="">
                                    <strong>{{ $dt->nama }}</strong><br>
                                </td>

                                <td class="">
                                    <div class="btn-group dropup">
                                        <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $dt->id }}">Detail</a>
                                            <a class="dropdown-item" href="{{ route('syarat_pengajuan_surat.edit', $dt->id) }}">Ubah</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">Hapus</a>
                                        </div>
                                    </div>
                                </td>

                                <div class="modal fade" id="hapusData{{ $dt->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama }} ?</strong></h5>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('syarat_pengajuan_surat.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->nama }} ! </p>

                                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade modal-lg" id="detail{{ $dt->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $dt->nama }}</h5>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                {!! $dt->keterangan !!}
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card border-radius-md">
            <div class="card-body">
                <strong>{{ "Tambah " . $subtitle }}</strong><br>
                <span>Isikan <code> form data </code> dengan benar! </span>
                <form class="row mt-3" method="POST" action="{{ route('syarat_pengajuan_surat.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-12" hidden>
                        <label class="col-12">ID Jenis Surat</label>
                        <div class="col-sm-12">
                            <input value="{{ $data_show->id }}" type="text" name="id_jenis_surat" class="form-control form-control-normal" placeholder="ID Jenis Surat...">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-12">Syarat Pengajuan Surat</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control form-control-normal" placeholder="Syarat Pengajuan Surat...">
                        </div>
                    </div>

                    <script src="https://cdn.tiny.cloud/1/ltswtbla0em8qkup9a7gva2zibb2qy6hbfnq4mgf778q8swq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                    <div class="form-group col-md-12">
                        <label class="col-12">Keterangan</label>
                        <div class="col-sm-12">
                            <textarea name="keterangan" rows="4" class="form-control form-control-normal" placeholder="Keterangan"></textarea>
                        </div>
                    </div>

                    <!-- <hr class="horizontal dark my-4"> -->

                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink link image lists charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking table contextmenu directionality emoticons paste textcolor responsivefilemanager code',

            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",

            toolbar2: "responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",

            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>

</div>

@endsection