@extends('home.layouts.app')

@section('title', 'Home')

@section('banner')
<section class="banner-section index index-4">
    <div class="overlay">
        <div class="banner-content">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-8 col-md-8">
                        <div class="main-content">
                            <div class="top-area section-text text-center">
                                <h5 class="sub-title">Sistem Informasi Pelaporan Rabies</h5>
                                <h1 class="title">Laporkan Serta Cek Data Rabies</h1>
                                <p>Lihat data rabies dengan memasukan no_register atau nama pasien</p>
                            </div>
                            <div class="bottom-area d-xxl-flex justify-content-center">
                                <form action="{{ route('home') }}" class="w-100" method="POST">
                                    @csrf
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <div class="input-area d-flex align-items-center flex-auto">
                                            <img src="{{ asset('assets/home/images/icon/search-icon-2.png') }}"
                                                alt="icon">
                                            <input type="text" placeholder="Cari data rabies" name="search"
                                                value="{{ $keyword ?? '' }}">
                                        </div>
                                        <button class="cmn-btn">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @isset($keyword)
    {{-- JIKA ADA DATA --}}
    @if ($dataPasien->isNotEmpty())
    <div class="explore-now">
        <div class="overlay">
            <div class="container">
                <div class="row cus-mar d-flex justify-content-center align-items-center">
                    @foreach ($dataPasien as $pasien)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-area text-center">
                            <div class="icon-area">
                                <img src="{{ $pasien->biodata->foto ?? asset('assets/home/images/author-profile.png') }}"
                                    alt="icon" width="100px" height="100px">
                            </div>
                            <div class="text-area">
                                <p class="mdr">#{{ $pasien->nomor_register }}</p>
                                <h5>{{ $pasien->biodata->nama_lengkap }}</h5>
                            </div>
                            <a href="{{ route('detailPasien', $pasien->nomor_register) }}" target="_blank" class="cmn-btn">Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    {{-- JIKA TIDAK ADA DATA --}}
    <div class="explore-now">
        <div class="overlay">
            <div class="container">
                <div class="row cus-mar align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-area text-center">
                            <h1>Data Tidak Ditemukan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endisset


</section>
@endsection

@section('content')
@endsection