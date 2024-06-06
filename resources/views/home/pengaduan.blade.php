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
                            <h2>Laporan Pengaduan</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb d-flex align-items-center">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
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
                <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12 cus-mar">
                    <div class="single-content">
                        <div class="head-area">
                            <h5 class="text-center">Pengaduan / Laporan belum ada</h5>
                        </div>
                        <form action="{{ route('pengaduan.store') }}" method="post">
                            @csrf
                            <div class="main-content px-4">
                                <h6>Buat Pengaduan / Laporan</h6>
                                <div class="form-group my-3">
                                    <label for="judul_pengaduan">Judul :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="judul_pengaduan" id="judul_pengaduan"
                                        class="bg-white text-dark" placeholder="Masukan Judul Pengaduan / Laporan"
                                        required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="isi_pengaduan">Keterangan :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="isi_pengaduan" id="isi_pengaduan" class="text-dark"
                                        placeholder="Masukan isi Pengaduan" rows="5" required></textarea>
                                </div>
                                <button class="cmn-btn alt">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection