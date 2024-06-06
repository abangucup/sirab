@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="vertical-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Detail Pengaduan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- BIODATA --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="ft-user"></i> Data Pengaduan
                                </h4>
                                <hr>
                                <label>Nama Lengkap : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $pengaduan->pengadu->biodata->nama_lengkap }}">
                                    <div class="form-control-position">
                                        <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Tanggal Lahir : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" disabled
                                        value="{{ \Carbon\Carbon::parse($pengaduan->pengadu->biodata->tanggal_lahir)->isoFormat('LL') . ' - ( '.\Carbon\Carbon::parse($pengaduan->pengadu->biodata->tanggal_lahir)->age. ' Tahun )' }}">
                                    <div class="form-control-position">
                                        <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Jenis Kelamin : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $pengaduan->pengadu->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}">
                                    <div class="form-control-position">
                                        <i class="ft-circle font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Judul Pengaduan : </label>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $pengaduan->judul_pengaduan }}">
                                </div>
                                <label>Isi Pengaduan : </label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control" row="2"
                                        disabled>{{ $pengaduan->isi_pengaduan }}</textarea>
                                </div>
                            </div>

                        </div>
                        {{-- END BIODATA --}}

                        {{-- TANGGAPAN --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="ft-file"></i> Tanggapan
                                </h4>
                                <hr>
                                <button class="btn btn-primary mb-1" data-toggle="modal"
                                    data-target="#modalTambahTanggapan"><i class="ft-user-plus mr-1"></i>Tambah
                                    Tanggapan</button>
                                @include('pengaduan.tanggapan.modal_tambah')

                                <table class="table table-borderless table-striped text-dark font-weight-bold">
                                    <thead class="bg-secondary text-white text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Puskesmas</th>
                                            <th>Petugas</th>
                                            <th>Tanggapan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @forelse ($tanggapans as $tanggapan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tanggapan->petugas->instansi->nama_instansi }}</td>
                                            <td>{{ $tanggapan->petugas->user->biodata->nama_lengkap }}</td>
                                            <td>{{ $tanggapan->tanggapan }}</td>
                                            {{-- <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-outline-warning" data-toggle="modal"
                                                        data-target="#modalUbahImunisasi-{{ $imunisasi->id }}"><i
                                                            class="ft-edit"></i></button>
                                                    <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                        data-target="#modalHapusImunisasi-{{ $imunisasi->id }}"><i
                                                            class="ft-trash-2"></i></button>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot class="bg-secondary text-white text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Puskesmas</th>
                                            <th>Petugas</th>
                                            <th>Tanggapan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                        {{-- END TANGGAPAN --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection