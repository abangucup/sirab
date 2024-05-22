<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasusController extends Controller
{
    public function store(Request $request, Pasien $pasien)
    {
        $validasi =  Validator::make($request->all(), [
            'tanggal_gigitan' => 'required',
            'hewan_rabies' => 'required',
            'lokasi_gigitan' => 'required',
            'kondisi' => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Lengkapi data pengisian kasus');
        }

        if ($pasien) {
            $kasus = new Kasus();
            $kasus->pasien_id = $pasien->id;
            $kasus->tanggal_gigitan = $request->tanggal_gigitan;
            $kasus->hewan_rabies = $request->hewan_rabies;
            $kasus->lokasi_gigitan = $request->lokasi_gigitan;
            $kasus->kondisi = $request->kondisi;
            $kasus->gejala = $request->gejala ?? '-';
            $kasus->save();

            return redirect()->back()->withToastSuccess('Data kasus baru ditambahkan');
        } else {
            return redirect()->back()->withToastError('Data pasien tidak sesuai');
        }
    }

    public function update(Request $request, Pasien $pasien, Kasus $kasus)
    {
        $validasi =  Validator::make($request->all(), [
            'tanggal_gigitan' => 'required',
            'hewan_rabies' => 'required',
            'lokasi_gigitan' => 'required',
            'kondisi' => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Lengkapi data pengisian kasus');
        }

        if ($pasien) {
            $kasus->update([
                'tanggal_gigitan' => $request->tanggal_gigitan,
                'hewan_rabies' => $request->hewan_rabies,
                'lokasi_gigitan' => $request->lokasi_gigitan,
                'kondisi' => $request->kondisi,
                'gejala' => $request->gejala ?? '-',
            ]);
            return redirect()->back()->withToastSuccess('Data kasus berhasil dirubah');
        } else {
            return redirect()->back()->withToastSuccess('Data pasien tidak sesuai');
        }
    }

    public function destroy(Pasien $pasien, Kasus $kasus)
    {
        if ($pasien) {
            $kasus->delete();
            return redirect()->back()->withToastSuccess('Data kasus berhasil dihapus');
        } else {
            return redirect()->back()->withToastSuccess('Data pasien tidak sesuai');
        }
    }
}
