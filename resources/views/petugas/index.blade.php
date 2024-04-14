@extends('templates.app')

@section('title', 'Petugas')

@section('content')

<section id="file-export">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data Petugas</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="collapse"><i class="ft-minus"></i></a>
                            </li>
                            <li>
                                <a data-action="reload"><i class="ft-rotate-cw"></i></a>
                            </li>
                            <li>
                                <a data-action="expand"><i class="ft-maximize"></i></a>
                            </li>
                            <li>
                                <a data-action="close"><i class="ft-x"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <button class="btn btn-primary float-right mx-1" data-toggle="modal"
                                data-target="#modalTambah"><i class="ft-user-plus mr-1"></i>Tambah
                                Petugas</button>
                            @include('petugas.modal_tambah')
                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPetugas as $petugas)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $petugas->user->username }}</td>
                                        <td>{{ $petugas->user->biodata->nama_lengkap }}</td>
                                        <td>{{ $petugas->user->biodata->telepon }}</td>
                                        <td>{{ $petugas->user->biodata->jenis_kelamin == 'p' ? 'Perempuan' : 'Laki-Laki'
                                            }}</td>
                                        <td>{{ $petugas->user->biodata->alamat }}</td>
                                        <td>{{ $petugas->instansi->nama_instansi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-outline-warning" data-toggle="modal"
                                                    data-target="#modalUbah-{{ $petugas->id }}"><i
                                                        class="ft-edit"></i></button>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $petugas->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('petugas.modal_edit')
                                    @include('petugas.modal_hapus')
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')

<style>
    .form-control-show-password {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        padding-right: 10px;
    }
</style>
@endpush