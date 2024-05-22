@extends('templates.app')

@section('title', 'Pasien')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Kasus Pasien</h4>
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
                            <a href="{{ route('pasien.create') }}" class="btn btn-primary float-right mx-1"><i class="ft-user-plus mr-1"></i>Tambah
                                Pasien</a>
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
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-outline-info">
                                                    <i class="ft-info"></i>
                                                </a>
                                                <a href="{{ route('pasien.edit', $pasien->id) }}" class="mx-1 btn btn-outline-warning">
                                                    <i class="ft-edit"></i>
                                                </a>
                                                <button class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $pasien->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- MODAL HAPUS --}}
                                    <div class="modal fade text-left" id="modalHapus-{{ $pasien->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel34" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="myModalLabel34">Hapus Data Pasien</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                    
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <h6 class="text-danger">Yakin ingin menghapus Pasien "{{ $pasien->biodata->nama_lengkap }}"</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL HAPUS --}}
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