<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\JadwalPelayanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalPelayananController extends Controller
{
    public function index()
    {
        $instansis = Instansi::all();
        $jadwalPelayanan = JadwalPelayanan::latest()->get();
        return view('jadwal.index', compact('jadwalPelayanan', 'instansis'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_istrahat' => 'required',
            'jam_tutup' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah jadwal', 'error');
            return redirect()->back();
        }

        $jadwal = new JadwalPelayanan();
        $jadwal->instansi_id = $request->instansi ?? Auth::user()->petugas->instansi->id;
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_istrahat = $request->jam_istrahat;
        $jadwal->jam_tutup = $request->jam_tutup;
        $jadwal->save();

        Alert::toast('Berhasil tambah jadwal', 'success');
        return redirect()->back();
    }

    public function update(Request $request, JadwalPelayanan $jadwal)
    {
        $validasi = Validator::make($request->all(), [
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_istrahat' => 'required',
            'jam_tutup' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal ubah jadwal', 'error');
            return redirect()->back();
        }

        $jadwal->update([
            'instansi_id' => $request->instansi ?? Auth::user()->instansi->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_istrahat' => $request->jam_istrahat,
            'jam_tutup' => $request->jam_tutup,
        ]);

        Alert::toast('Berhasil ubah jadwal', 'success');
        return redirect()->back();
    }

    public function destroy(JadwalPelayanan $jadwal)
    {
        $jadwal->delete();

        Alert::success('Berhasil hapus jadwal', 'success');
        return redirect()->back();
    }
}
