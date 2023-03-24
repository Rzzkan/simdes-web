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
        <form class="row" method="POST" action="{{ route('peta_desa.update', $data_edit->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="col-md-12 text-center">
                <strong>{{ $title }}</strong><br>
                <small>Isikan informasi terbaru!</small><br>
            </div>

            <hr class="horizontal dark my-4">

            <div class="col-md-12">
                <label for="url_maps">URL Peta Desa</label>
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->url_maps }}" name="url_maps" class="form-control form-control-sm" placeholder="URL Peta Desa...">
                </div>
            </div>

            <script src="https://cdn.tiny.cloud/1/ltswtbla0em8qkup9a7gva2zibb2qy6hbfnq4mgf778q8swq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

            <div class="form-group col-md-12">
                <label class="col-12">Detail Informasi</label>
                <div class="col-sm-12">
                    <textarea name="keterangan" class="form-control form-control-normal" placeholder="Detail Informasi">
                    {!! $data_edit->keterangan !!}
                    </textarea>
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

<div class="card col-md-12 mt-3">
    <div class="card-body">
        <div class="col-md-12 text-center">
            <strong>Preview Peta Desa</strong><br>
        </div>

        <hr class="horizontal dark my-4">

        <iframe src="{{ $data_edit->url_maps }}" width="100%" height="600px" title="description"></iframe>

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

@endsection