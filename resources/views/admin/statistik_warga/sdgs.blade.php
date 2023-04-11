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
        <div class="row">

            <div class="col-md-12 text-center">
                <strong>{{ $subtitle }} Terbaru</strong><br>
            </div>

            <hr class="horizontal dark my-4">
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-1.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_1 }}" name="sdgs_1" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-2.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_2 }}" name="sdgs_2" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-3.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_3 }}" name="sdgs_3" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-4.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_4 }}" name="sdgs_4" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-5.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_5 }}" name="sdgs_5" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-6.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_6 }}" name="sdgs_6" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-7.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_7 }}" name="sdgs_7" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-8.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_8 }}" name="sdgs_8" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-9.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_9 }}" name="sdgs_9" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-10.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_10 }}" name="sdgs_10" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-11.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_11 }}" name="sdgs_11" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-12.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_12 }}" name="sdgs_12" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-13.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_13 }}" name="sdgs_13" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-14.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_14 }}" name="sdgs_14" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-15.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_15 }}" name="sdgs_15" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-16.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_16 }}" name="sdgs_16" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-17.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_17 }}" name="sdgs_17" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <img class="col-md-8 p-2" src="{{ asset('img_sdgs/skor-sdgs-18.jpg') }}" alt="">
                <div class="form-group col-md-12">
                    <input type="text" value="{{ $data_edit->sdgs_18 }}" name="sdgs_18" class="form-control form-control-sm text-center" placeholder="0" readonly>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection