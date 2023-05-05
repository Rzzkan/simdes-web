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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <div class="col-xl-12 col-sm-12 mb-xl-12 mb-4" id="container" style="min-width: 310px; height: 400px;"></div>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: '{{ $title }}'
            },
            subtitle: {
                text: '{{ $subtitle }}'
            },
            xAxis: {
                //INI ADALAH UNTUK KOLOM KETERANGAN
                categories: [
                    'Balita',
                    'Kanak - Kanak',
                    'Remaja',
                    'Dewasa',
                    'Lansia',
                ],
                title: {
                    text: '{{ $subtitle }}'
                },
                crosshair: true
            },
            yAxis: {

                title: {
                    text: 'Jumlah'
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:8pt">{point.key}</span><table style="font-size:8pt">',
                pointFormat: '<tr><td style="color:{series.color};padding:0">Jml.: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.,
                    borderWidth: 0
                }
            },
            series: [{
                colorByPoint: true,
                showInLegend: false,

                data: [<?php echo $get_data['balita'] ?>,
                    <?php echo $get_data['kanak_kanak'] ?>,
                    <?php echo $get_data['remaja'] ?>,
                    <?php echo $get_data['dewasa'] ?>,
                    <?php echo $get_data['lansia'] ?>
                ] //INI ADALAH UNTUK JUMLAH

            }, ]
        });
    </script>

</div>

@endsection