@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data Kunjungan</h4>
                    <a class="heading-elements-toggle"><i cl-ass="la la-ellipsis-v font-medium-3"></i></a>
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
                            <a class="btn btn-primary float-right mx-1" href="{{ route('kunjungan.create') }}">
                                <i class="ft-user-plus mr-1"></i>Tambah
                                Kunjungan</a>
                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>No Register</th>
                                        <th>Nama Pasien</th>
                                        <th>Umur</th>
                                        <th>Tanggal Gigitan</th>
                                        <th>Hewan Penular</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Puskesmas Kunjungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($kunjungans as $kunjungan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kunjungan->pasien->nomor_register }}</td>
                                        <td>{{ $kunjungan->pasien->biodata->nama_lengkap }}</td>
                                        <td class="text-nowrap">{{
                                            \Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->age.'
                                            Tahun' }}</td>
                                        <td>{{ Carbon\Carbon::parse($kunjungan->kasus->tanggal_gigitan)->isoFormat('LL')
                                            }}</td>
                                        <td>{{ $kunjungan->kasus->hewan_rabies }}</td>
                                        <td>{{ Carbon\Carbon::parse($kunjungan->tanggal_berkunjung)->isoFormat('LL') }}
                                        </td>
                                        <td>{{ $kunjungan->puskes_kunjungan->nama_instansi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('kunjungan.show', $kunjungan->id) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="ft-info"></i>
                                                </a>
                                                <a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                    class="btn btn-outline-warning mx-1">
                                                    <i class="ft-edit"></i>
                                                </a>
                                                @if (auth()->user()->role->level_role != 'pasien' &&
                                                auth()->user()->role->level_role != 'pj_puskes')
                                                <button class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $kunjungan->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                                        
                                                @include('kunjungan.modal_hapus')

                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>No Register</th>
                                        <th>Nama Pasien</th>
                                        <th>Umur</th>
                                        <th>Tanggal Gigitan</th>
                                        <th>Hewan Penular</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Puskesmas Kunjungan</th>
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