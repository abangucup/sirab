@extends('templates.app')

@section('title', 'Instansi')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data Instansi</h4>
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
                                    Instansi</button>
                                @include('halaman_admin.instansi.modal_tambah')
                                <table
                                    class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                    <thead class="bg-secondary text-white text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Kode Instansi</th>
                                            <th>Kecamatan</th>
                                            <th>Alamat</th>
                                            <th>Ket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instansis as $instansi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">{{ $instansi->nama_instansi }}</td>
                                            <td>{{ $instansi->kode_instansi }}</td>
                                            <td>{{ $instansi->kecamatan->nama_kecamatan }}</td>
                                            <td>{{ $instansi->alamat_instansi }}</td>
                                            <td>{{ Str::ucfirst($instansi->status) }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-outline-warning" data-toggle="modal"
                                                        data-target="#modalUbah-{{ $instansi->id }}"><i
                                                            class="ft-edit"></i></button>
                                                    <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $instansi->id }}"><i
                                                            class="ft-trash-2"></i></button>
                                                </div>
                                            </td>
                                        </tr>

                                        @include('halaman_admin.instansi.modal_edit')
                                        @include('halaman_admin.instansi.modal_hapus')
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-secondary text-white text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi</th>
                                            <th>Kode Instansi</th>
                                            <th>Kecamatan</th>
                                            <th>Alamat</th>
                                            <th>Ket</th>
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