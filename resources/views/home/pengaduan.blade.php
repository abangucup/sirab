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
                            <h5 class="text-center">Pengaduan / Laporkan Kendala Anda</h5>
                        </div>
                        @auth
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
                        @endauth

                        @guest
                        <form action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="main-content px-4">
                                <h6>Buat Pengaduan / Laporan</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group my-3">
                                            <label for="nama_lengkap">Nama Lengkap :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                class="bg-white text-dark" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="telepon">Nomor Telepon :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="telepon" id="telepon" class="bg-white text-dark"
                                                placeholder="Nomor Telepon" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="alamat">Alamat :
                                            </label>
                                            <input type="text" name="alamat" id="alamat" class="bg-white text-dark"
                                                placeholder="Alamat Lengkap">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group my-3">
                                            <label for="tanggal_lahir">Tanggal Lahir :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="bg-white text-dark" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="jenis_kelamin">Jenis Kelamin :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select" style="padding: 15px; border-radius: 10px; margin-bottom: 30px" >
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="l">Laki - Laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="foto">Gambar Profile :
                                            </label>
                                            <input type="file" name="foto" id="foto" class="bg-white text-dark" style="padding: 10px;"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group my-3">
                                            <label for="judul_pengaduan">Judul :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="judul_pengaduan" id="judul_pengaduan"
                                                class="bg-white text-dark"
                                                placeholder="Masukan Judul Pengaduan / Laporan" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="isi_pengaduan">Keterangan :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea name="isi_pengaduan" id="isi_pengaduan" class="text-dark"
                                                placeholder="Masukan isi Pengaduan" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="cmn-btn alt">Simpan</button>
                            </div>
                        </form>
                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection