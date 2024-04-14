<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class InstansiController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        $instansis = Instansi::all();
        return view('halaman_admin.instansi.index', compact('instansis', 'kecamatans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'kode_instansi' => 'required',
            'status' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Lengkapi data', 'error');
            return redirect()->back();
        }

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->kode_instansi = $request->kode_instansi;
        $instansi->alamat_instansi = $request-> alamat_instansi ?? null;
        $instansi->status = $request->status;
        $instansi->kecamatan_id = $request->kecamatan_id ?? null;
        $instansi->save();

        Alert::toast('Berhasil menambahkan instansi', 'success');
        return redirect()->back();
    }
    
    public function update(Request $request, Instansi $instansi)
    {
        $validasi = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'kode_instansi' => 'required',
            'status' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Lengkapi data', 'error');
            return redirect()->back();
        }

        $instansi->update([
            'nama_instansi' => $request->nama_instansi,
            'kode_instansi' => $request->kode_instansi,
            'alamat_instansi' => $request->alamat_instansi ?? null,
            'status' => $request->status,
            'kecamatan_id' => $request->kecamatan_id ?? null,
        ]);

        Alert::toast('Berhasil mengubah instansi', 'success');
        return redirect()->back();
    }

    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        Alert::toast('Berhasil menghapus instansi', 'success');
        return redirect()->back();
    }
}
