<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        $instansis = Instansi::all();
        return view('halaman_admin.instansi.index', compact('instansis', 'kecamatans'));
    }
}
