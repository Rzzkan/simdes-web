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
        <form class="row mt-3" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group col-md-6">
                <label class="col-12">Judul</label>
                <div class="col-sm-12">
                    <input type="text" name="judul" class="form-control form-control-normal" placeholder="Judul...">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-12">Gambar</label>
                <div class="col-12">
                    <input onchange="readURL(this);" type="file" name="gambar" class="form-control form-control-normal mb-2">
                    <img style="border: solid gray 1px; padding:6px; border-radius:6px;" height="80px" id="gambar" src="" alt="" />
                </div>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#gambar').attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>

            <script src="https://cdn.tiny.cloud/1/ltswtbla0em8qkup9a7gva2zibb2qy6hbfnq4mgf778q8swq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

            <div class="form-group col-md-12">
                <label class="col-12">Deskripsi</label>
                <div class="col-sm-12">
                    <textarea name="deskripsi" class="form-control form-control-normal" placeholder="Deskripsi">
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