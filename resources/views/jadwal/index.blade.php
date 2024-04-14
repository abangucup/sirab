@extends('templates.app')

@section('title', 'Instansi')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Jadwal Pelayanan</h4>
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
                                Jadwal</button>
                            @include('jadwal.modal_tambah')
                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalPelayanan as $jadwal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-nowrap">{{ $jadwal->instansi->nama_instansi }}</td>
                                        <td>
                                            <p>Hari: {{ $jadwal->hari }}</p>
                                            <p>Jam Mulai : {{ $jadwal->jam_mulai }}</p>
                                            <p>Jam Istrahat : {{ $jadwal->jam_istrahat }}</p>
                                            <p>Jam Tutup : {{ $jadwal->jam_tutup }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-outline-warning" data-toggle="modal"
                                                    data-target="#modalUbah-{{ $jadwal->id }}"><i
                                                        class="ft-edit"></i></button>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $jadwal->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('jadwal.modal_edit')
                                    @include('jadwal.modal_hapus')
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Jadwal</th>
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