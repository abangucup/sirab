<?php

namespace App\Http\Controllers;

use App\Charts\ImunisasiChart;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function grafikImunisasi(ImunisasiChart $imunisasiChart)
    {
        $imunisasiChart = $imunisasiChart->build();
        return view('grafik.grafik_imunisasi', compact('imunisasiChart'));
    }
}
