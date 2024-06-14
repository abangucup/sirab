<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function imunisasi()
    {
        // $pasiens = Pasien::latest()->get();
        $kunjungans = Kunjungan::with('kasus', 'imunisasis')->latest()->get();
        return view('laporan.laporan_imunisasi', compact('kunjungans'));
    }

    public function pemeriksaan()
    {
        return view('laporan.laporan_pemeriksaan');
    }
}
