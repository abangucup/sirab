@extends('templates.app')

@section('title', 'Instansi')

@section('content')

<section id="file-export">
    <div class="row">
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
                            <button class="btn btn-primary float-left mb-2" data-toggle="modal"
                                data-target="#modalTambah"><i class="ft-user-plus mr-1"></i>Tambah
                                Pengguna</button>
                            @include('halaman_admin.pengguna.modal_tambah')

                            <table class="table text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No. Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->biodata->nama_lengkap }}</td>
                                        <td>{{ $user->biodata->nik }}</td>
                                        <td>{{ $user->biodata->telepon }}</td>
                                        <td>{{ $user->biodata->jenis_kelamin == 'p' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                        <td>{{ $user->biodata->alamat }}</td>
                                        <td>{{ $user->instansi->nama_instansi }}</td>
                                        <td>
                                            <button class="btn btn-outline-danger  rounded-pill">Hapus</button>
                                            <button class="btn btn-outline-info  rounded-pill">Ubah</button>
                                            <button class="btn btn-success  rounded-pill">Detail</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
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