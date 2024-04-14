@extends('templates.app')

@section('title', 'Dashboard Puskes')

@section('content')
<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title font-medium-5">Dashboard {{ $user->petugas->instansi->nama_instansi }}</h4>
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
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12">
                                <a href="{{ route('petugas.index') }}">
                                    <div class="card bg-gradient-x-purple-blue">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="ft-monitor text-white font-large-5"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-center">
                                                        <span class="d-block mb-1 font-medium-1">Total Petugas</span>
                                                        <h1 class="text-white mb-0">{{ $totalPetugas }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <a href="{{ route('jadwal.index') }}">
                                    <div class="card bg-gradient-x-purple-red">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="ft-monitor text-white font-large-5"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-center">
                                                        <span class="d-block mb-1 font-medium-1">Total Jadwal</span>
                                                        <h1 class="text-white mb-0">{{ $totalJadwal }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <a href="{{ route('pengaduan.index') }}">
                                    <div class="card bg-gradient-x-blue-green">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="ft-monitor text-white font-large-5"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-center">
                                                        <span class="d-block mb-1 font-medium-1">Total Pengaduan</span>
                                                        <h1 class="text-white mb-0">{{ $totalPengaduan }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <a href="{{ route('jadwal.index') }}">
                                    <div class="card bg-gradient-x-orange-yellow">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="ft-monitor text-white font-large-5"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-center">
                                                        <span class="d-block mb-1 font-medium-1">Total Jadwal Pelayanan</span>
                                                        <h1 class="text-white mb-0">10</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <a href="{{ route('pengaduan.index') }}">
                                    <div class="card bg-gradient-directional-success">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="ft-monitor text-white font-large-5"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-center">
                                                        <span class="d-block mb-1 font-medium-1">Total Pengaduan</span>
                                                        <h1 class="text-white mb-0">10</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection