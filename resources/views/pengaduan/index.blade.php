@extends('templates.app')

@section('title', 'Instansi')

@section('content')

<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Pengaduan</h4>
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
                                        <th>No</th>
                                        <th>Nama Pengadu</th>
                                        <th>Judul Pengaduan</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduans as $pengaduan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-nowrap">{{ $pengaduan->pengadu->nama_lengkap }}</td>
                                        <td>{{ $pengaduan->judul_pengaduan }}</td>
                                        <td>{{ Str::limit($pengaduan->isi_pengaduan, 50, '...') }}</td>
                                        <td>
                                            <div class="badge badge-{{ $pengaduan->status == 'pending' ? 'danger' : ($pengaduan->status == 'proses' ? 'warning' : 'success') }}">{{ $pengaduan->status }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-outline-info">
                                                    <i class="ft-info"></i>
                                                </a>
                                                <button class="btn btn-outline-danger mx-1" data-toggle="modal"
                                                    data-target="#modalHapus-{{ $pengaduan->id }}"><i
                                                        class="ft-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('pengaduan.modal_hapus')
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengadu</th>
                                        <th>Judul Pengaduan</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Status</th>
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