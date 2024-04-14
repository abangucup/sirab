@extends('templates.app')

@section('title', 'Instansi')

@section('content')

<section id="file-export">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data Pengguna</h4>
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
                                Pengguna</button>
                            @include('halaman_admin.pengguna.modal_tambah')
                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Role Name</th>
                                        <th>Role Level</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $pengguna)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengguna->biodata->nama_lengkap }}</td>
                                        <td>{{ $pengguna->username }}</td>
                                        <td>{{ $pengguna->role->nama_role }}</td>
                                        <td>{{ $pengguna->role->level_role }}</td>
                                        <td>{{ $pengguna->biodata->telepon }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-outline-warning" data-toggle="modal"
                                                    data-target="#modalUbah-{{ $pengguna->id }}"><i
                                                        class="ft-edit"></i></button>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $pengguna->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('halaman_admin.pengguna.modal_edit')
                                    @include('halaman_admin.pengguna.modal_hapus')
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Role Name</th>
                                        <th>Role Level</th>
                                        <th>No. Handphone</th>
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