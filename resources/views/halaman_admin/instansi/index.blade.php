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

                            <table class="table table-borderless table-striped file-export text-dark font-weight-bold">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Instansi</th>
                                        <th>Kode Instansi</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>Ket</th>
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
                                    </tr>
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
                                    </tr>
                                </tfoot>
                            </table>
                            {{-- {{ $instansis->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection