<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Instansi;
use App\Models\JadwalPelayanan;
use App\Models\Kasus;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalPuskesmas = Instansi::where('status', 'puskesmas')->count();
        $totalDinas = Instansi::where('status', 'dinas')->count();
        $totalUser = User::count();
        $totalSemuaJadwal = JadwalPelayanan::count();
        $totalPengaduan = Pengaduan::count();

        return view('halaman_admin.dashboard', compact([
            'totalPuskesmas',
            'totalDinas',
            'totalUser',
            'totalSemuaJadwal',
            'totalPengaduan',
        ]));
    }

    public function dinkeskota()
    {
        $totalJadwal = JadwalPelayanan::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPetugas = Petugas::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPengaduan = Pengaduan::count();
        return view('halaman_dinkes_kota.dashboard', compact([
            'totalJadwal',
            'totalPetugas',
            'totalPengaduan',
        ]));
    }

    public function dinkesprov()
    {
        $totalJadwal = JadwalPelayanan::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPetugas = Petugas::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPengaduan = Pengaduan::count();
        return view('halaman_dinkes_prov.dashboard', compact([
            'totalJadwal',
            'totalPetugas',
            'totalPengaduan',
        ]));
    }

    public function puskes()
    {
        $totalJadwal = JadwalPelayanan::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPetugas = Petugas::where('instansi_id', Auth::user()->petugas->instansi_id)->count();
        $totalPengaduan = Pengaduan::count();
        $totalPasien = Pasien::count();
        return view('halaman_puskes.dashboard', compact([
            'totalJadwal',
            'totalPetugas',
            'totalPengaduan',
            'totalPasien'
        ]));
    }

    public function pasien()
    {
        $pasien = Auth::user()->biodata->pasien;
        $kunjungans = Kunjungan::where('pasien_id', $pasien->id)->get();
        // $imunisasis = Imunisasi::whereHas('kunjungan', function($query) use ($pasien) {   
        //                             $query->where('pasien_id', $pasien->id);
        //                         })->Paginate(4);
        $dataKeluhan = Kasus::where('pasien_id', $pasien->id)
                            ->paginate(5);
        return view('home.dashboard.index', compact('kunjungans', 'dataKeluhan'));
    }
}
