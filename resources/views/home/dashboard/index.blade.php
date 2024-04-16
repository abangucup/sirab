@extends('home.dashboard.app')

@section('title', 'Dashboard Pasien')

@section('banner')
<section class="banner-section inner-banner coach dashboard">
    <div class="overlay">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="main-content">
                            <h2>My Dashboard</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb d-flex align-items-center">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="col-xxl-8 col-lg-8 col-md-12 col-sm-12 cus-mar">
    <div class="single-content">
        <div class="head-area d-flex align-items-center justify-content-between">
            <h5>Kunjungan Saya</h5>
        </div>
        <div class="main-content table-area">
            <div class="table-responsive">
                <table class="table" class="d-flex justify-content-ceter align-items-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kasus</th>
                            <th>Tanggal Berkunjung</th>
                            <th>Puskesmas Kunjungan</th>
                            <th>Hasil Pemeriksaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kunjungans as $kunjungan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kunjugan->kasus->hewan_rabies }}</td>
                            <td>{{ Carbon\Carbon::parse($kunjungan->tanggal_berkunjung)->isoFormat('LL') }}</td>
                            <td>{{ $kunjungan->puskes_kunjungan->nama_instansi }}</td>
                            <td>{{ $kunjungan->hasil_pemeriksaan }}</td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="5">Belum ada kunjungan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="single-content">
        <div class="head-area d-flex align-items-center justify-content-between">
            <h5>Imunisasi Saya</h5>
        </div>
        <div class="main-content table-area">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Jenis Var</th>
                            <th scope="col">Tanggal Pemberian Var</th>
                            <th scope="col">PKM Pemberi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($imunisasis as $imunisasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="5">Belum Imunisasi Var</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection