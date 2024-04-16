@extends('home.layouts.app')

@section('title', 'Dashboard Pasien')

@section('banner')
<section class="banner-section inner-banner coach dashboard">
    <div class="overlay">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="main-content">
                            <h2>Jadwal Pelayanan</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb d-flex align-items-center">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
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
<section class="dashboard-section">
    <div class="overlay pb-120">
        <div class="container">
            <div class="row">

                @foreach ($puskesmas as $puskes)
                <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="sidebar-single px-4 text-start">
                        <h5>{{ $puskes->nama_instansi }}</h5>
                        <div class="main-content table-area">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Mulai</th>
                                            <th>Istrahat</th>
                                            <th>Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($puskes->jadwals as $jadwal)
                                        <tr>
                                            <td>{{ $jadwal->hari }}</td>
                                            <td>{{ $jadwal->jam_mulai }}</td>
                                            <td>{{ $jadwal->jam_istrahat }}</td>
                                            <td>{{ $jadwal->jam_selesai }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection