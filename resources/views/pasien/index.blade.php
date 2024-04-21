@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Pasien</h4>
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
                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>No Register</th>
                                        <th>Nama Pasien</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->nomor_register }}</td>
                                        <td class="text-nowrap">{{ $pasien->biodata->nama_lengkap }}</td>
                                        <td>{{ $pasien->biodata->telepon }}</td>
                                        <td>{{ $pasien->biodata->alamat }}</td>
                                        <td>{{ $pasien->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>{{ Carbon\Carbon::parse($pasien->biodata->tanggal_lahir)->isoFormat('LL') }}</td>
                                        <td>
                                            <img src="{{ $pasien->biodata->foto ?? asset('assets/images/logo/svg/male.svg') }}" alt="Profile" height="30px" width="30px">
                                        </td>
                                        <td>
                                            {{-- <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('pengaduan.show', $pasien->id) }}" class="btn btn-outline-info">
                                                    <i class="ft-info"></i>
                                                </a>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $pasien->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    {{-- @include('pengaduan.modal_hapus') --}}
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>No Register</th>
                                        <th>Nama Pasien</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Foto</th>
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