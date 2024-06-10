<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\JadwalPelayanan;
use App\Models\Pasien;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function detailPasien($nomor_register)
    {
        $pasien = Pasien::where('nomor_register', $nomor_register)->first();
        // public function kartuImunisasi(Kunjungan $kunjungan)
        // $pdf = Pdf::loadView('kunjungan.imunisasi.kartu_imunisasi', compact('kunjungan'))
        //     ->setPaper('A4', 'potrait');
        // return $pdf->stream('kartu-imunisasi - ' . $kunjungan->pasien->nomor_register . ' - ' . Str::slug($kunjungan->pasien->biodata->nama_lengkap) . '.pdf');
        $pdf = Pdf::loadView('home.detail_pasien', compact('pasien'))
                    ->setPaper('A4', 'potrait');
                
        return $pdf->stream('detail-pasien - '. $pasien->nomor_register . ' - '. Str::slug($pasien->biodata->nama_lengkap . '.pdf'));
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
