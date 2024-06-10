<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/kartu-imunisasi.css">
    <title>Kartu Imunisasi Pasien</title>
</head>

<body style="font-size: 12px">
    @forelse ($pasien->kunjungans as $kunjungan)

    <table width="100%">
        <tr>
            <td align="left">
                <img width="90px" src="assets/images/logo/png/logo_kota.png" height="100px">
            </td>
            <td style="text-align: center" width="100%">
                <p style="font-size: 2.2em"><b>
                        PEMERINTAH KOTA GORONTALO <br>
                        DINAS KESEHATAN
                </p>
                <p>
                    Jl. Jamaludin Malik No. 52, Kelurahan Limba U Dua, Kecamatan Kota Selatan, Kota Gorontalo<br>
                    Kode Pos 96138 <i>Email : <a href="">p2pl.dinkeskota.gorontalo@gmail.com</a> Website : <a
                            href="">https://sirab.manyta.net</a></u></i>
                </p>
            </td>
            <td align="right" width="100px">
                <img width="90px" src="assets/images/logo/png/logo_kesehatan.png" height="100px">

            </td>
        </tr>
    </table>

    <hr>

    <h1>DETAIL IMUNISASI PASIEN KUNJUNGAN KE - {{ $loop->iteration }}</h1>

    <table width="100%" style="border: 1px solid black; padding: 5px">
        <tbody>
            <tr>
                <td style="white-space: nowrap;"><strong>Nama Pasien</strong></td>
                <td>: {{ $kunjungan->pasien->nomor_register }}</td>
                <td style="white-space: nowrap;"><strong>No. Register</strong></td>
                <td style="white-space: nowrap;">: {{ $kunjungan->pasien->nomor_register }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Tanggal Lahir</strong></td>
                <td>: {{ \Carbon\Carbon::parse($kunjungan->pasien->biodata->tanggal_lahir)->isoFormat('LL') }}</td>
                <td rowspan="4"><strong>Foto</strong></td>
                <td rowspan="4"><img src="{{ $kunjungan->pasien->biodata->foto }}"
                        style="border-radius: 5px; border: 1px solid black; margin: 5px" width="100px" height="100px"
                        alt="Gambar Photo Pasien"></td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Jenis Kelamin</strong></td>
                <td>: {{$kunjungan->pasien->biodata->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Telepon</strong></td>
                <td>: {{ $kunjungan->pasien->biodata->telepon }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Alamat</strong></td>
                <td>: {{ $kunjungan->pasien->biodata->alamat }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Kasus</strong></td>
                <td style="padding-right: 20px">: {{ 'Pasien menderita gigitan hewan '.$kunjungan->kasus->hewan_rabies.'
                    pada tanggal '.\Carbon\Carbon::parse($kunjungan->kasus->tanggal_gigitan)->isoFormat('LL'). ' di
                    bagian '.$kunjungan->kasus->lokasi_gigitan.'. sekarang kondisi pasien '.$kunjungan->kasus->kondisi
                    ?? 'belum diketahui' }}</td>
                <td style="white-space: nowrap;"><strong>Tanggal Kunjungan</strong></td>
                <td>: {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->isoFormat('LL') }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;"><strong>Hasil Pemeriksaan</strong></td>
                <td style="padding-right: 10px">: {{ 'Pasien melakukan Cuci Luka ( ' .$kunjungan->cuci_luka .' ) dan
                    hasil pemeriksaannya adalah "'.$kunjungan->hasil_pemeriksaan. '"' }}</td>
                <td style="white-space: nowrap;"><strong>Puskesmas Kunjungan</strong></td>
                <td>: {{ $kunjungan->puskes_kunjungan->nama_instansi }}</td>
            </tr>
        </tbody>
    </table>

    <div style="font-size: 1em">
        <h2>Riwayat Pemberian Imunisasi Vaksin Rabies</h2>
        <table id="customers">
            <thead>

                <tr>
                    <th>Tanggal Pemberian Imunisasi</th>
                    <th>Puskesmas Pemberi Imunisasi</th>
                    <th>Status Var Imunisasi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            @foreach ($kunjungan->imunisasis as $imunisasi)
            <tr>
                <td>{{
                    \Carbon\Carbon::parse($imunisasi->tanggal_pemberian_imunisasi)->isoFormat('LL')
                    }}</td>
                <td>{{ $imunisasi->nama_puskesmas_pemberi }}</td>
                <td>{{ $imunisasi->status_imunisasi }}</td>
                <td>{{ $imunisasi->keterangan }}</td>
            </tr>
            @endforeach

        </table>

        <br>

        <p>Kartu Imunisasi ini dibuat menggunakan sistem SIRAB (Sistem Informasi Rabies)
            dengan memperhatikan peraturan yang telah ditentukan serta disesuaikan dengan format yang ada. Kartu ini
            menjadi bukti untuk melakukan imunisasi vaksin rabies selanjutnya</p>
        <br><br>
        <table width="100%">
            <tr>
                <td style="text-align: center" width="40%">
                </td>
                <td width="20%"></td>
                <td style="text-align: center" width="40%">
                    <div id="tanggal">
                        Gorontalo, {{ \Carbon\Carbon::parse(now())->isoFormat('LL') }}
                    </div>
                    @auth
                    <p>{{ auth()->user()->role->nama_role }}</p>
                    <br><br><br>
                    <p><u>{{ auth()->user()->biodata->nama_lengkap }}</u></p>
                    <p>{{ auth()->user()->petugas->instansi->nama_instansi ?? 'Super Admin' }}</p>
                    @endauth
                    @guest
                    <p>PETUGAS DINAS KESEHATAN</p>
                    <br><br><br>
                    <p><u>ETYANA ULOLI, SKM</u></p>
                    <p>DINAS KESEHATAN KOTA GORONTALO</p>
                    @endguest
                </td>
            </tr>
        </table>
    </div>
    @empty
    <table width="100%">
        <tr>
            <td align="left">
                <img width="90px" src="assets/images/logo/png/logo_kota.png" height="100px">
            </td>
            <td style="text-align: center" width="100%">
                <p style="font-size: 2.2em"><b>
                        PEMERINTAH KOTA GORONTALO <br>
                        DINAS KESEHATAN
                </p>
                <p>
                    Jl. Jamaludin Malik No. 52, Kelurahan Limba U Dua, Kecamatan Kota Selatan, Kota Gorontalo<br>
                    Kode Pos 96138 <i>Email : <a href="">p2pl.dinkeskota.gorontalo@gmail.com</a> Website : <a
                            href="">https://sirab.manyta.net</a></u></i>
                </p>
            </td>
            <td align="right" width="100px">
                <img width="90px" src="assets/images/logo/png/logo_kesehatan.png" height="100px">

            </td>
        </tr>
    </table>

    <hr>

    <h1>BELUM ADA DATA IMUNISAI</h1>
    <br><br><br><br>
    <h1>Silahkan ke puskesmas terdekat untuk melakukan kunjungan dan pemeriksaan kondisi yang anda alami jika anda tergigit hewan rabies</h1>

    @endforelse
</body>

</html>