<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::whereHas('kunjungans', function ($query) {
            $query->where('puskesmas_kunjungan', Auth()->user()->id);
        })->get();
        return view('imunisasi.index', compact('pasiens'));
    }
}
