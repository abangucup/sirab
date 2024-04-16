<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\JadwalPelayanan;
use App\Models\Pasien;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->search; // Ambil nilai pencarian dari input
        $dataPasien = Pasien::with('biodata')->where('nomor_register', 'LIKE', '%' . $keyword . '%')
                        ->orWhereHas('biodata', function($query) use ($keyword) {
                            $query->where('nama_lengkap', 'LIKE', '%'.$keyword.'%');
                        })->get();
    
        return view('home.index', compact('keyword', 'dataPasien'));
    }

    public function listJadwal()
    {
        $puskesmas = Instansi::where('status', 'puskesmas')->orWhereHas('jadwals')->get();
        return view('home.jadwal', compact('puskesmas'));
    }

    public function listPengaduan()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('home.pengaduan', compact('pengaduans'));
    }

    public function pengaduanSaya()
    {
        $pengaduans = Pengaduan::where('pengadu_id', Auth::user()->id)->get();
        return view('home.dashboard.pengaduan-saya', compact('pengaduans'));
    }
}
