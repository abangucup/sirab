@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="vertical-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Detail Imunisasi</h3>
                        <div>
                            <a class="btn btn-info" href="{{ route('kartuImunisasi', $kunjungan->id) }}"><i
                                    class="ft-printer mr-1"></i>Cetak Kartu</a>
                            <a class="btn btn-outline-primary" href="{{ route('kunjungan.index') }}"><i
                                    class="ft-chevron-left mr-1"></i>Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            {{-- BIODATA --}}
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <i class="ft-user"></i> Detail Pasien
                                    </h4>
                                    <label>Nomor Register : </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ $kunjungan->pasien->nomor_register }}">
                                        <div class="form-control-position">
                                            <i class="ft-hash font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                    <label>Nama Lengkap : </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ $kunjungan->pasien->biodata->nama_lengkap }}">
                                        <div class="form-control-position">
                                            <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                    <label>Tanggal Lahir : </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ \Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->isoFormat('LL') . ' - ( '.\Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->age. ' Tahun )' }}">
                                        <div class="form-control-position">
                                            <i
                                                class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                    <label>Jenis Kelamin : </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ $kunjungan->pasien->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}">
                                        <div class="form-control-position">
                                            <i class="ft-circle font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                </div>
                                <label>Foto Profile</label>
                                <div class="form-group position-relative">
                                    <img src="{{ $kunjungan->pasien->biodata->foto }}" alt="Tidak memiliki foto"
                                        width="100px" height="100px">
                                </div>
                            </div>
                            {{-- END BIODATA --}}

                            {{-- KUNJUNGAN --}}
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <i class="ft-file"></i> Detail Kunjungan
                                    </h4>
                                    <label>Kasus</label>
                                    <div class="form-group position-relative">
                                        <textarea rows="3" class="form-control"
                                            disabled>{{ 'Pasien menderita gigitan hewan '.$kunjungan->kasus->hewan_rabies.' pada tanggal '.\Carbon\Carbon::parse($kunjungan->kasus->tanggal_gigitan)->isoFormat('LL'). ' di bagian '.$kunjungan->kasus->lokasi_gigitan.'. sekarang kondisi pasien '.$kunjungan->kasus->kondisi ?? 'belum diketahui' }}</textarea>

                                    </div>
                                    <label>Tanggal Kunjungan : </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ \Carbon\Carbon::parse($kunjungan->tanggal_berkunjung)->isoFormat('LL') }}">
                                        <div class="form-control-position">
                                            <i
                                                class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                    <label>Puskesmas Kunjungan: </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" disabled
                                            value="{{ $kunjungan->puskes_kunjungan->nama_instansi }}">
                                        <div class="form-control-position">
                                            <i
                                                class="ft-briefcase font-medium-5 line-height-1 text-muted icon-align"></i>
                                        </div>
                                    </div>
                                    <label>Hasil Pemeriksaan : </label>
                                    <div class="form-group position-relative">
                                        <textarea class="form-control" row="2"
                                            disabled>{{ 'Pasien telah melakukan Cuci Luka ( '. $kunjungan->cuci_luka .' ). Ketika diperiksa, hasil pemeriksaannya adalah '. $kunjungan->hasil_pemeriksaan }}</textarea>

                                    </div>
                                </div>
                            </div>
                            {{-- END KUNJUNGAN --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Imunisasi </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <button class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#modalTambahImunisasi"><i class="ft-user-plus mr-1"></i>Tambah Data
                                Imunisasi</button>
                            @include('kunjungan.imunisasi.modal_tambah')
                            <table class="table table-borderless table-striped text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pemberian Imunisasi</th>
                                        <th>Puskesmas Pemberi Imunisasi</th>
                                        <th>Status Var Imunisasi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($kunjungan->imunisasis as $imunisasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{
                                            \Carbon\Carbon::parse($imunisasi->tanggal_pemberian_imunisasi)->isoFormat('LL')
                                            }}</td>
                                        <td>{{ $imunisasi->nama_puskesmas_pemberi }}</td>
                                        <td>{{ $imunisasi->status_imunisasi }}</td>
                                        <td>{{ $imunisasi->keterangan }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button class="btn btn-outline-warning" data-toggle="modal"
                                                    data-target="#modalUbahImunisasi-{{ $imunisasi->id }}"><i
                                                        class="ft-edit"></i></button>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapusImunisasi-{{ $imunisasi->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('kunjungan.imunisasi.modal_hapus')
                                    @include('kunjungan.imunisasi.modal_edit')
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pemberian Imunisasi</th>
                                        <th>Puskesmas Pemberi Imunisasi</th>
                                        <th>Status Var Imunisasi</th>
                                        <th>Keterangan</th>
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