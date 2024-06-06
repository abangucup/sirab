@extends('home.dashboard.app')

@section('title', 'Pengaduan Saya')

@section('banner')
<section class="banner-section inner-banner coach dashboard">
    <div class="overlay">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="main-content">
                            <h2>Pengaduan Saya</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb d-flex align-items-center">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('dashboard.pasien') }}">Dashboard</a></li>
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
@forelse ($pengaduans as $pengaduan)
<div class="col-xxl-4 col-lg-8 col-md-6 col-sm-12 cus-mar">
    <div class="single-content">
        <div class="head-area d-flex justify-content-between align-items-center">
            <h5>{{ $pengaduan->judul_pengaduan }}</h5>
            <span
                class="badge bg-{{ $pengaduan->status == 'pending' ? 'danger' : ($pengaduan->status == 'proses' ? 'warning' : 'success') }}">{{
                $pengaduan->status }}</span>

        </div>
        <div class="main-content">
            <span>{{ $pengaduan->isi_pengaduan }}</span>
        </div>
        <hr class="text-white">
        <div class="footer-area mt-4">
            <h6>Tanggapan :</h6>
            <br>
                <span class="badge bg-primary text-wrap">
                    @forelse ($pengaduan->tanggapans as $tanggapan)
                    <p>{{ $tanggapan->tanggapan }}</p>
                    @empty
                    <p>Belum Ada Tanggapan</p>
                    @endforelse
                </span>
        </div>
    </div>
</div>
@empty
<div class="col-xxl-9 col-lg-8 cus-mar">
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
                        placeholder="Masukan Judul Pengaduan / Laporan" required>
                </div>
                <div class="form-group my-3">
                    <label for="isi_pengaduan">Keterangan :
                        <span class="text-danger">*</span>
                    </label>
                    <textarea name="isi_pengaduan" id="isi_pengaduan" rows="5">Masukan Keterangan</textarea>
                </div>
                <button class="cmn-btn alt">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endforelse
@endsection
@push('style')
<style>
    .dashboard-section form input,
    textarea {
        border-color: transparent;
        border-radius: 10px;
        background-color: #242882;
        margin-bottom: 20px;
    }
</style>
@endpush