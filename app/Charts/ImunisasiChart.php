<?php

namespace App\Charts;

use App\Models\Imunisasi;
use App\Models\Instansi;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class ImunisasiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {



        if (auth()->user()->role->level_role != 'pasien' && auth()->user()->role->level_role == 'pj_puskes') {
            $puskesAuth = Instansi::where('id', auth()->user()->petugas->instansi_id)->first();

            $tanggals = Imunisasi::where('puskesmas_pemberi_imunisasi', $puskesAuth->id)
                // ->where('tanggal_pemberian_imunisasi', '>=', now()->subDays(30))
                ->pluck('tanggal_pemberian_imunisasi', 'id')
                ->map(function ($tanggal) {
                    return Carbon::parse($tanggal)->isoFormat('LL');
                });

            $var1 = [];
            $var2 = [];
            $var3 = [];
            $var4 = [];

            foreach ($tanggals as $key => $tanggal) {
                $var1[] = Imunisasi::where('status_imunisasi', 'Var 1')->where('id', $key)->count();
                $var2[] = Imunisasi::where('status_imunisasi', 'Var 2')->where('id', $key)->count();
                $var3[] = Imunisasi::where('status_imunisasi', 'Var 3')->where('id', $key)->count();
                $var4[] = Imunisasi::where('status_imunisasi', 'Var 4')->where('id', $key)->count();
            }

            return $this->chart->areaChart()
                ->setTitle('Data Imunisasi Var Pertanggal')
                ->addData('Var 1', $var1)
                ->addData('Var 2', $var2)
                ->addData('Var 3', $var3)
                ->addData('Var 4', $var4)
                // ->setColors(['#ffc63b', '#ff6384'])
                ->setColors(['#5BBCFF', '#6AD4DD', '#D8AE7E', '#FA7070'])
                ->setMarkers(['#5BBCFF', '#6AD4DD', '#D8AE7E', '#FA7070'], 7, 10)
                // ->setSparkline()

                ->setXAxis($tanggals->values()->toArray());
        }

        if (auth()->user()->role->level_role != 'pasien' && auth()->user()->role->level_role != 'pj_puskes') {

            $dataPuskesmas = Instansi::where('status', 'puskesmas')->pluck('nama_instansi', 'id');
            $var1 = [];
            $var2 = [];
            $var3 = [];
            $var4 = [];
            foreach ($dataPuskesmas as $key => $puskesmas) {
                $var1[] = Imunisasi::where('status_imunisasi', 'Var 1')->where('puskesmas_pemberi_imunisasi', $key)->count();
                $var2[] = Imunisasi::where('status_imunisasi', 'Var 2')->where('puskesmas_pemberi_imunisasi', $key)->count();
                $var3[] = Imunisasi::where('status_imunisasi', 'Var 3')->where('puskesmas_pemberi_imunisasi', $key)->count();
                $var4[] = Imunisasi::where('status_imunisasi', 'Var 4')->where('puskesmas_pemberi_imunisasi', $key)->count();
            }

            return $this->chart->areaChart()
                ->setTitle('Data Imunisasi Var Perpuskesmas')
                ->addData('Var 1', $var1)
                ->addData('Var 2', $var2)
                ->addData('Var 3', $var3)
                ->addData('Var 4', $var4)
                ->setColors(['#5BBCFF', '#6AD4DD', '#D8AE7E', '#FA7070'])
                ->setMarkers(['#5BBCFF', '#6AD4DD', '#D8AE7E', '#FA7070'], 7, 10)
                ->setXAxis($dataPuskesmas->values()->toArray());
        }
    }
}
