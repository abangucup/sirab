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
                        <div class="d-flex justify-content-between">

                            <p class="card-text">Data Laporan Imunisasi By Name By Address Per Puskesmas</p>
                            <div>
                                <button class="btn btn-info" onclick="downloadImage()"> <i class="ft-download mr-2"></i>Download</button>
                            </div>
                        </div>
                        <div class="table-responsive" id="table-container">
                            <table class="table table-striped table-bordered complex-headers" id="table-to-download">
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
                                        <th colspan="3" class="text-center">Kondisi</th>
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
                                        <th rowspan="2" class="align-middle">Sakit</th>
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
                                            'checked' : 'disabled' }} onclick="return {{ $kunjungan->kasus->hewan_rabies
                                            == 'Anjing' ? false : true }};"></td>
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
                                        <td class="text-nowrap">{{ $kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 1')->first() ?
                                            \Carbon\Carbon::parse($kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 1')->first()->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}
                                        </td>
                                        <td class="text-nowrap">{{ $kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 2')->first() ?
                                            \Carbon\Carbon::parse($kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 2')->first()->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}
                                        </td>
                                        <td class="text-nowrap">{{ $kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 3')->first() ?
                                            \Carbon\Carbon::parse($kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 3')->first()->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}
                                        </td>
                                        <td class="text-nowrap">{{ $kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 4')->first() ?
                                            \Carbon\Carbon::parse($kunjungan->imunisasis()->where('status_imunisasi',
                                            'Var 4')->first()->tanggal_pemberian_imunisasi)->isoFormat('LL') : '' }}
                                        </td>

                                        <td><input type="checkbox" {{ $kunjungan->kasus->kondisi == 'Sakit' ? 'checked'
                                        : 'disabled' }}></td>
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
                                        <th colspan="3">Kondisi</th>
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

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    async function downloadImage() {
        const tableContainer = document.getElementById('table-container');
        const currentDate = "<?php echo date('d-m-Y'); ?>";

        const originalWidth = tableContainer.style.width;
        tableContainer.style.width = tableContainer.scrollWidth + 'px';
        const canvas = await html2canvas(tableContainer, { scale: 2 });
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'laporan-imunisasi-'+ currentDate + '.png';
        link.click();
        tableContainer.style.width = originalWidth;  // Restore original width
    }
</script>
@endpush