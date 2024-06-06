<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Instansi;
use App\Models\Kasus;
use App\Models\Kunjungan;
use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Doctrine\Inflector\Rules\Ruleset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungans = Kunjungan::latest()->get();
        return view('kunjungan.index', compact('kunjungans'));
    }

    public function create()
    {
        if (Auth::user()->role->level_role !== 'pasien' && Auth::user()->role->level_role !== 'pj_puskes') {
            $instansis = Instansi::where('status', 'puskesmas')->get();
        } else {
            $instansis = Instansi::where('status', 'puskesmas')->where('id', Auth::user()->petugas->instansi_id)->get();
        }
        $pasiens = Pasien::latest()->get();

        return view('kunjungan.tambah_kunjungan', compact('pasiens', 'instansis'));
    }

    public function getKeluhanPasien(Pasien $pasien)
    {
        $keluhan = Kasus::where('pasien_id', $pasien->id)->whereDoesntHave('kunjungan')->latest()->get();
        return response()->json($keluhan);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'pasien' => 'required',
            'kasus' => 'required',
            'tanggal_berkunjung' => 'required',
            'cuci_luka' => 'required',
            'puskesmas_kunjungan' => 'required',
            'tanggal_pemberian_imunisasi' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withToastError('Lengkapi data kunjungan');
        }

        $pasien = Pasien::findOrFail($request->pasien);
        $kasus = Kasus::findOrFail($request->kasus);

        $kunjungan = new Kunjungan();
        $kunjungan->pasien_id = $pasien->id;
        $kunjungan->kasus_id = $kasus->id;
        $kunjungan->tanggal_berkunjung = $request->tanggal_berkunjung;
        $kunjungan->puskesmas_kunjungan = $request->puskesmas_kunjungan;
        $kunjungan->cuci_luka = $request->cuci_luka;
        $kunjungan->hasil_pemeriksaan = $request->hasil_pemeriksaan ?? '-';
        $kunjungan->save();

        $imunisasi = new Imunisasi();
        $imunisasi->kunjungan_id = $kunjungan->id;
        // $imunisasi->tanggal_pemberian_var1 = $kunjungan->tanggal_berkunjung;
        // $imunisasi->puskesmas_pemberi_var1 = $kunjungan->puskesmas_kunjungan;
        // $imunisasi->status_imunisasi = $request->status_imunisasi;
        $imunisasi->tanggal_pemberian_imunisasi = $request->tanggal_pemberian_imunisasi;
        $imunisasi->puskesmas_pemberi_imunisasi = $kunjungan->puskesmas_kunjungan;
        $imunisasi->status_imunisasi = 'Var 1';
        $imunisasi->keterangan = $request->keterangan ?? '-';
        $imunisasi->save();

        return redirect()->route('kunjungan.index')->withToastSuccess('Berhasil tambah data kunjungan pasien');
    }

    public function show(Kunjungan $kunjungan)
    {
        if (Auth::user()->role->level_role !== 'pasien' && Auth::user()->role->level_role !== 'pj_puskes') {
            $instansis = Instansi::where('status', 'puskesmas')->get();
        } else {
            $instansis = Instansi::where('status', 'puskesmas')->where('id', Auth::user()->petugas->instansi_id)->get();
        }

        $imunisasis = $kunjungan->imunisasis()->latest()->get();
        return view('kunjungan.detail_kunjungan', compact('kunjungan', 'imunisasis', 'instansis'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        if (auth()->user()->role->level_role == 'super_admin') {
            $instansi = Instansi::all();
        } else {

            $instansi = Instansi::where('status', 'puskesmas')->where('id', Auth::user()->petugas->instansi_id)->first();
        }
            $pasiens = Pasien::latest()->get();
        return view('kunjungan.edit_kunjungan', compact('kunjungan', 'pasiens', 'instansi'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $validasi = Validator::make($request->all(), [
            'pasien' => 'required',
            'kasus' => 'required',
            'tanggal_berkunjung' => 'required',
            'cuci_luka' => 'required',
            'status_imunisasi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withToastError('Lengkapi data kunjungan');
        }

        $pasien = Pasien::findOrFail($request->pasien);
        $kasus = Kasus::findOrFail($request->kasus);

        $kunjungan->update([
            'pasien_id' => $pasien->id,
            'kasus_id' => $kasus->id,
            'tanggal_berkunjung' => $request->tanggal_berkunjung,
            'cuci_luka' => $request->cuci_luka,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan ?? '-',
        ]);

        return redirect()->route('kunjungan.index')->withToastSuccess('Berhasil rubah data kunjungan');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        if ($kunjungan->imunisasis->isEmpty()) {
            $kunjungan->delete();
            return redirect()->back()->withToastSuccess('Berhasil hapus data kunjungan');
        } else {
            return redirect()->route('kunjungan.show', ['kunjungan' => $kunjungan->id])->withToastError('Hapus data imunisasi dahulu pada kunjungan ini');
        }
    }

    public function kartuImunisasi(Kunjungan $kunjungan)
    {
        $pdf = Pdf::loadView('kunjungan.imunisasi.kartu_imunisasi', compact('kunjungan'))
            ->setPaper('A4', 'potrait');
        return $pdf->stream('kartu-imunisasi - ' . $kunjungan->pasien->nomor_register . ' - ' . Str::slug($kunjungan->pasien->biodata->nama_lengkap) . '.pdf');
    }
}
