<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Kunjungan;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImunisasiController extends Controller
{
    public function store(Request $request, Kunjungan $kunjungan)
    {
        $validasi = Validator::make($request->all(), [
            'tanggal_pemberian_imunisasi',
            'puskesmas_pemberi_imunisasi',
            'status_imunisasi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Lengkapi data inputan');
        }

        $cekStatusImunisasi = Imunisasi::where('status_imunisasi', $request->status_imunisasi)->where('kunjungan_id', $kunjungan->id)->first();

        if ($cekStatusImunisasi) {
            return redirect()->back()->withToastError('Status imunisasi ini sudah ada.');
        }

        $imunisasi = new Imunisasi();
        $imunisasi->kunjungan_id = $kunjungan->id;
        $imunisasi->tanggal_pemberian_imunisasi = $request->tanggal_pemberian_imunisasi;
        $imunisasi->puskesmas_pemberi_imunisasi = $request->puskesmas_pemberi_imunisasi;
        $imunisasi->status_imunisasi = $request->status_imunisasi;
        $imunisasi->keterangan = $request->keterangan ?? '-';
        $imunisasi->save();

        return redirect()->back()->withToastSuccess('Berhasil tambah imunisasi');
    }

    public function update(Request $request, Kunjungan $kunjungan, Imunisasi $imunisasi)
    {
        $validasi = Validator::make($request->all(), [
            'tanggal_pemberian_imunisasi',
            'puskesmas_pemberi_imunisasi',
            'status_imunisasi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Lengkapi data inputan');
        }

        $cekStatusImunisasi = Imunisasi::where('status_imunisasi', $request->status_imunisasi)
            ->where('id', '!=', $imunisasi->id)
            ->where('kunjungan_id', $kunjungan->id)
            ->first();

        if ($cekStatusImunisasi) {
            return redirect()->back()->withToastError('Status imunisasi ini sudah ada');
        }

        if (!$kunjungan) {
            return redirect()->back()->withToastError('Data kunjungan tidak cocok');
        }

        $imunisasi->update([
            'tanggal_pemberian_imunisasi' => $request->tanggal_pemberian_imunisasi,
            'puskesmas_pemberi_imunisasi' => $request->puskesmas_pemberi_imunisasi,
            'status_imunisasi' => $request->status_imunisasi,
            'keterangan' => $request->keterangan ?? '-',
        ]);

        return redirect()->back()->withToastSuccess('Berhasil ubah imunisasi');
    }

    public function destroy(Kunjungan $kunjungan, Imunisasi $imunisasi)
    {
        if (!$kunjungan) {
            return redirect()->back()->withToastError('Data kunjungan tidak cocok');
        }
        $imunisasi->delete();

        return redirect()->back()->withToastSuccess('Berhasil menghapus imunisasi');
    }
}
