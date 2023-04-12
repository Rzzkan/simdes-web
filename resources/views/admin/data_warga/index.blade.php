@extends('layouts.main')
@section('content')

<div class="row">

    <div class="col-md-12">
        @if(Session::has('success'))
        <div class="alert alert-success text-light py-2 px-4" role="alert">
            <strong><small>
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <strong>Berhasil! </strong> {{ Session('success') }}
                </small></strong>
        </div>
        @endif
        <div class="card border-radius-md">
            <div class="card-body">

                <div class="row justify-content-between mb-2">
                    <div class="col-md-4">
                        <strong><i class="fas fa-list-alt"></i> {{ $subtitle }}</strong>
                    </div>
                    <div class="col-md-4 d-flex ">
                        <a href="{{ route('data_warga.create') }}" class="ms-auto border-radius-sm btn btn-sm btn-primary px-3"><i class="fas fa-plus" style="margin-right: 6px;"></i> Tambah {{ $subtitle }}</a>
                    </div>
                </div>

                <div class="">
                    <table id="data_table_" class="table table-sm px-2 mb-0 text-dark">
                        <thead class="" style="background-color: #EEEEEE;">
                            <tr>
                                <th class="">No.</th>
                                <th class="">Nama</th>
                                <th class="">NIK</th>
                                <th class="">Alamat</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            $get_page = $all_data->currentPage();
                            @endphp
                            @foreach ($all_data as $dt)
                            <tr>
                                <td class=""><button class="btn bg-gradient-info btn-sm px-3 mb-0 disabled">{{ (($get_page-1) * 10) + $no++ }}</button></td>
                                <td>{{ $dt->user->name }}<br>
                                    <small data-bs-toggle="modal" data-bs-target="#detail{{ $dt->id }}" class="user-select-none text-primary">
                                        <i>Lihat Detail</i>
                                    </small>
                                </td>
                                <td>{{ $dt->user->nik }}</td>
                                <td>
                                    <div style="width: 200px;">
                                        <div style="white-space: normal;">{{ $dt->alamat }}</div><br>
                                    </div>
                                </td>

                                <td class="">
                                    <div class=" btn-group dropup">
                                        <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('data_warga.edit', $dt->id) }}">Ubah</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">Hapus</a>
                                        </div>
                                    </div>
                                </td>

                                <div class="modal fade" id="detail{{ $dt->id }}">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Detail Data Warga {{ $dt->user->name }} :</strong></h5>
                                            </div>

                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-md-6 border">
                                                        <strong><small>NIK : <br></small></strong>
                                                        {{ $dt->user->nik }}<br>
                                                        <strong><small>Nama : <br></small></strong>
                                                        {{ $dt->user->name }}<br>
                                                        <strong><small>No. HP : <br></small></strong>
                                                        {{ $dt->user->no_hp }}<br>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Kewarganegaraan : <br></small></strong>
                                                        {{ $dt->kewarganegaraan }}<br>
                                                        <strong><small>TTL : <br></small></strong>
                                                        {{ $dt->tempat_lahir . ', ' . $dt->Tanggal_lahir }}<br>
                                                        <strong><small>Jenis Kelamin : <br></small></strong>
                                                        {{ $dt->jenis_kelamin }}<br>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Agama : <br></small></strong>
                                                        {{ $dt->agama }}<br>
                                                        <strong><small>Status Perkawinan : <br></small></strong>
                                                        {{ $dt->status_perkawinan }}<br>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Penyandang Cacat : <br></small></strong>
                                                        {{ $dt->penyandang_cacat }}<br>
                                                        <strong><small>Penyakit Menahun : <br></small></strong>
                                                        {{ $dt->penyakit_menahun }}<br>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Pekerjaan : <br></small></strong>
                                                        {{ $dt->pekerjaan }}<br>
                                                        <strong><small>Pendidikan : <br></small></strong>
                                                        {{ $dt->pendidikan }}<br>
                                                        <strong><small>Status Penduduk : <br></small></strong>
                                                        {{ $dt->status_penduduk }}<br>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Alamat : <br></small></strong>
                                                        <div style="width: 240px;">
                                                            <div style="white-space: normal;">{{ $dt->alamat }}</div><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <strong><small>Status Vaksin : <br></small></strong>
                                                        {{ $dt->status_vaksin }}<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusData{{ $dt->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Hapus Data {{ $dt->user->name }} ?</strong></h5>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('data_warga.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->user->name }} ! </p>

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
                    <div class="d-flex justify-content-center">
                        {{ $all_data->links('components.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection