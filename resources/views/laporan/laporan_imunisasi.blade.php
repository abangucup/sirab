@extends('templates.app')

@section('title', 'Pengaduan')

@section('content')

<section id="headers">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Imunisasi Pasien Per Puskesmas</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <p class="card-text">Data Laporan Imunisasi By Name By Address Per Puskesmas</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered complex-headers">
                                {{-- <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">Name</th>
                                        <th colspan="2">HR Information</th>
                                        <th colspan="3">Contact</th>
                                    </tr>
                                    <tr>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>Extn.</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>$320,800</td>
                                        <td>Edinburgh</td>
                                        <td>5421</td>
                                        <td>t.nixon@datatables.net</td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>Extn.</th>
                                        <th>E-mail</th>
                                    </tr>
                                </tfoot> --}}
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th rowspan="3" class="align-middle">No</th>
                                        <th rowspan="3" class="align-middle">Puskesmas</th>
                                        <th rowspan="3" class="align-middle">Nama</th>
                                        <th rowspan="3" class="align-middle">Alamat</th>
                                        <th colspan="2">Umur (Tahun)</th>
                                        <th colspan="2" class="text-center">Tanggal</th>
                                        <th class="text-nowrap text-center" colspan="4">Jenis Hewan Penular</th>
                                        <th rowspan="3" class="align-middle">Lokasi Gigitan</th>
                                        <th colspan="5" class="text-center">Pengobatan</th>
                                        <th colspan="2" class="text-center">Kondisi</th>
                                        <th colspan="2" class="text-center">Pemb. Lab Rabies</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">L</th>
                                        <th rowspan="2" class="align-middle">P</th>
                                        <th rowspan="2" class="align-middle">Digigit</th>
                                        <th rowspan="2" class="align-middle">Berkunjung Ke Puskes</th>
                                        <th rowspan="2" class="align-middle">Anjing</th>
                                        <th rowspan="2" class="align-middle">Kucing</th>
                                        <th rowspan="2" class="align-middle">Kera</th>
                                        <th rowspan="2" class="align-middle">Dll</th>
                                        <th rowspan="2" class="align-middle">Cuci Luka</th>
                                        <th colspan="4" class="text-center">Tanggal Pemberian</th>
                                        <th rowspan="2" class="align-middle">Sembuh</th>
                                        <th rowspan="2" class="align-middle">Mati</th>
                                        <th rowspan="2" class="align-middle">POS</th>
                                        <th rowspan="2" class="align-middle">NEG</th>
                                    </tr>
                                    <tr>
                                        <th>VAR I</th>
                                        <th>VAR II</th>
                                        <th>VAR III</th>
                                        <th>VAR IV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kunjungans as $kunjungan)
                                    @php
                                    $imunisasiData = $kunjungan->imunisasis->groupBy('status_imunisasi')
                                    ->map(function($items) {
                                    return $items->first();
                                    });
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kunjungan->puskes_kunjungan->nama_instansi }}</td>
                                        <td>{{ $kunjungan->pasien->biodata->nama_lengkap ?? '-' }}</td>
                                        <td>{{ $kunjungan->pasien->biodata->alamat ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $kunjungan->pasien->biodata->jenis_kelamin == 'l' ?
                                            \Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->age . '
                                            Tahun' : "" }}</td>
                                        <td class="text-nowrap">{{ $kunjungan->pasien->biodata->jenis_kelamin == 'p' ?
                                            \Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->age . '
                                            Tahun' : "" }}</td>
                                        <td class="text-nowrap">{{
                                            \Carbon\Carbon::parse($kunjungan->kasus->tanggal_gigitan)->isoFormat('LL')
                                            }}</td>
                                        <td class="text-nowrap">{{
                                            \Carbon\Carbon::parse($kunjungan->tanggal_berkunjung)->isoFormat('LL') }}
                                        </td>
                                        <td><input type="checkbox" {{ $kunjungan->kasus->hewan_rabies == 'Anjing' ?
                                            'checked' : 'disabled' }}></td>
                                        <td><input type="checkbox" {{ $kunjungan->kasus->hewan_rabies == 'Kucing' ?
                                            'checked' : 'disabled' }}></td>
                                        <td><input type="checkbox" {{ $kunjungan->kasus->hewan_rabies == 'Kera' ?
                                            'checked' : 'disabled' }}></td>
                                        <td><input type="checkbox" {{ $kunjungan->kasus->hewan_rabies == 'DLL' ?
                                            'checked' : 'disabled' }}></td>
                                        <td>{{ $kunjungan->kasus->lokasi_gigitan }}</td>
                                        <td><input type="checkbox" {{ $kunjungan->cuci_luka != null ? 'checked' :
                                            'disabled' }}></td>

                                        {{-- IMUNISASI --}}
                                        <td class="text-nowrap">{{ isset($imunisasiData['Var 1']) ?
                                            \Carbon\Carbon::parse($imunisasiData['Var
                                            1']->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}</td>
                                        <td class="text-nowrap">{{ isset($imunisasiData['Var 2']) ?
                                            \Carbon\Carbon::parse($imunisasiData['Var
                                            2']->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}</td>
                                        <td class="text-nowrap">{{ isset($imunisasiData['Var 3']) ?
                                            \Carbon\Carbon::parse($imunisasiData['Var
                                            3']->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}</td>
                                        <td class="text-nowrap">{{ isset($imunisasiData['Var 4']) ?
                                            \Carbon\Carbon::parse($imunisasiData['Var
                                            4']->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}</td>

                                        <td><input type="checkbox" {{ $kunjungan->kasus->kondisi == 'Sembuh' ? 'checked'
                                            : 'disabled' }}></td>
                                        <td><input type="checkbox" {{ $kunjungan->kasus->kondisi == 'Mati' ? 'checked' :
                                            'disabled' }}></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfooot>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Puskesmas</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th colspan="2">Umur</th>
                                        <th colspan="2">Tanggal</th>
                                        <th colspan="4">Jenis Hewan Penular</th>
                                        <th>Lokasi Gigitan</th>
                                        <th colspan="5">Pengobatan</th>
                                        <th colspan="2">Kondisi</th>
                                        <th colspan="2">Pemb. Lab Rabies</th>
                                    </tr>
                                </tfooot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection