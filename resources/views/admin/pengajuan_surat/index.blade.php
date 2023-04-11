@extends('layouts.main')
@section('content')

<div class="row">

    <div class="col-md-12">
        @if(Session::has('success'))
        <div class="alert alert-success text-light py-2 px-4" role="alert">
            <small>
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <strong>Berhasil! </strong> {{ Session('success') }}
            </small>
        </div>
        @endif
        <div class="card border-radius-md">
            <div class="card-body">

                <div class="row justify-content-between mb-2">
                    <div class="col-md-4">
                        <strong><i class="fas fa-list-alt"></i> {{ $subtitle }}</strong>
                    </div>
                    <div class="col-md-4 d-flex ">
                        <a href="{{ route('jenis_surat.create') }}" class="ms-auto border-radius-sm btn btn-sm btn-primary px-3"><i class="fas fa-plus" style="margin-right: 6px;"></i> Tambah {{ $subtitle }}</a>
                    </div>
                </div>

                <div class="table-responsive" style="overflow-y:hidden;">
                    <table id="data_table" class="table table-sm align-items-center px-2 mb-0 text-dark">
                        <thead class="" style="background-color: #EEEEEE;">
                            <tr>
                                <th class="">No.</th>
                                <th class="">Tanggal</th>
                                <th class="">Warga</th>
                                <th class="">Surat</th>
                                <th class="">Status</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($all_data as $dt)
                            <tr>
                                <td class=""><button class="btn bg-gradient-info btn-sm px-3 mb-0 disabled">{{ $no++ }}</button></td>
                                <td>
                                    @if($dt->status_notif=='0')
                                    <small class="badge bg-success" style="padding: 3px 8px 3px 8px; font-size: 8px;">
                                        Baru
                                    </small>
                                    <br>
                                    @endif
                                    {{ $dt->created_at }}
                                </td>
                                <td class="">
                                    <strong>{{ $dt->nama_user }}</strong><br>
                                </td>
                                <td class="">
                                    <strong>{{ $dt->nama_surat }}</strong><br>
                                    <a href="{{ asset($dt->berkas); }}" target="_blank" class="text-primary font-italic"><strong><small>Lihat Berkas</small></strong></a>
                                </td>
                                <td class="">
                                    <small class="@if($dt->tindakan=='Disetujui') text-success @else text-danger @endif"><strong>{{ $dt->tindakan }}</strong></small>
                                    <br><small>Catatan: {{ substr($dt->catatan,0,50) . "...." }}</small>
                                </td>

                                <td class="">
                                    <div class="btn-group dropup">
                                        <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('pengajuan_surat.edit', $dt->id) }}">Detail</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">Hapus</a>
                                        </div>
                                    </div>
                                </td>

                                <div class="modal fade" id="hapusData{{ $dt->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama_user .' | '. $dt->nama_surat }} ?</strong></h5>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('pengajuan_surat.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->nama_user .' | '. $dt->nama_surat }} ! </p>

                                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
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
</div>

@endsection