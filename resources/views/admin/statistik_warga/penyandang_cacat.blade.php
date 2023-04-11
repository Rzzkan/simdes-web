@extends('layouts.main')
@section('content')

<!-- @if(Session::has('success'))
<div class="alert alert-success">
    {{ Session('success') }}
</div>
@endif -->

<div class="row">

    <div class="col-xl-12 col-sm-12 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <strong class="font-weight-bolder mb-0">
                                {{ $subtitle }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-sm-6 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <small style="font-size:12px;" class="mb-0 text-capitalize font-weight-bold text-secondary"><i><u>Balita</u></i></small>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $get_data['balita'] }}
                                <span class="text-success text-sm font-weight-bolder">+</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-sm-6 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <small style="font-size:12px;" class="mb-0 text-capitalize font-weight-bold text-secondary"><i><u>Kanak-kanak</u></i></small>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $get_data['kanak_kanak'] }}
                                <span class="text-success text-sm font-weight-bolder">+</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-sm-6 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <small style="font-size:12px;" class="mb-0 text-capitalize font-weight-bold text-secondary"><i><u>Remaja</u></i></small>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $get_data['remaja'] }}
                                <span class="text-success text-sm font-weight-bolder">+</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-sm-6 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <small style="font-size:12px;" class="mb-0 text-capitalize font-weight-bold text-secondary"><i><u>Dewasa</u></i></small>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $get_data['dewasa'] }}
                                <span class="text-success text-sm font-weight-bolder">+</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-sm-6 mb-xl-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers">
                            <small style="font-size:12px;" class="mb-0 text-capitalize font-weight-bold text-secondary"><i><u>Lansia</u></i></small>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $get_data['lansia'] }}
                                <span class="text-success text-sm font-weight-bolder">+</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection