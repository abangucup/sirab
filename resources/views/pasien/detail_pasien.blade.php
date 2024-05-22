@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Data Pasien</div>
                        <a class="btn btn-outline-primary" href="{{ route('pasien.index') }}"><i
                                class="ft-chevron-left mr-1"></i>Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <h4 class="form-section">
                            <i class="ft-user"></i> Biodata Pasien
                        </h4>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <label>Nama Lengkap : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="Nama Lengkap" class="form-control"
                                        name="nama_lengkap" value="{{ $pasien->biodata->nama_lengkap }}" required>
                                    <div class="form-control-position">
                                        <i class="ft-user font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Tanggal Lahir : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" placeholder="Tanggal Lahir" class="form-control"
                                        name="tanggal_lahir" value="{{ $pasien->biodata->tanggal_lahir }}">
                                    <div class="form-control-position">
                                        <i class="ft-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Nomor Telepon : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="number" placeholder="Nomor Telpon Aktif" class="form-control"
                                        name="telepon" value="{{ $pasien->biodata->telepon }}">
                                    <div class="form-control-position">
                                        <span>+62</span>
                                    </div>
                                </div>
                                <label>Alamat : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="Alamat" class="form-control" name="alamat"
                                        value="{{ $pasien->biodata->alamat }}">
                                    <div class="form-control-position">
                                        <i class="ft-map-pin font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                                <label>Jenis Kelamin : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="{{ $pasien->biodata->jenis_kelamin }}" selected>{{
                                            $pasien->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
                                        </option>
                                        <option value="" disabled>-- Pilih --</option>
                                        <option value="p">Perempuan</option>
                                        <option value="l">Laki-Laki</option>
                                    </select>
                                    <div class="form-control-position">
                                        <i class="ft-users font-medium-5 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <label>Photo Profil</label>
                                <div class="form-group position-relative">
                                    <div class="card">
                                        <img src="{{ $pasien->biodata->foto }}" alt="" class="rounded shadow-sm border"
                                            width="100%" height="370px">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Keluhan Pasien</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#modalTambah"><i
                                    class="ft-user-plus mr-1"></i>Tambah
                                Keluhan Pasien</button>
                            @include('pasien.kasus.modal_tambah')
                            <table class="table table-borderless table-striped text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Gigitan</th>
                                        <th>Hewan Rabies</th>
                                        <th>Lokasi Gigitan</th>
                                        <th>Kondisi</th>
                                        <th>Gejala</th>
                                        <th>Tanggal Penginputan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($dataKasus as $kasus)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kasus->tanggal_gigitan }}</td>
                                        <td>{{ $kasus->hewan_rabies }}</td>
                                        <td>{{ $kasus->lokasi_gigitan }}</td>
                                        <td>{{ $kasus->kondisi }}</td>
                                        <td>{{ $kasus->gejala }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kasus->created_at)->isoFormat('LL') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                {{-- <a href="{{ route('pasien.edit', $pasien->id) }}"
                                                    class="mx-1 btn btn-outline-warning">
                                                    <i class="ft-edit"></i>
                                                </a> --}}
                                                <button class="mx-1 btn btn-outline-warning" data-toggle="modal"
                                                    data-target="#modalUbah-{{ $kasus->id }}"><i
                                                        class="ft-edit"></i></button>
                                                <button class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $kasus->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- MODAL EDIT --}}
                                    @include('pasien.kasus.modal_edit')
                                    {{-- END MODAL EDIT --}}
                                    {{-- MODAL HAPUS --}}
                                    @include('pasien.kasus.modal_hapus')
                                    {{-- END MODAL HAPUS --}}
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Gigitan</th>
                                        <th>Hewan Rabies</th>
                                        <th>Lokasi Gigitan</th>
                                        <th>Kondisi</th>
                                        <th>Gejala</th>
                                        <th>Tanggal Penginputan</th>
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