<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TanggapanController extends Controller
{
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'tanggapan' => 'required',
            'pengaduan_id' => 'required',
            'status' => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Lengkapi form data');
        }

        $tanggapan = new Tanggapan();
        $tanggapan->pengaduan_id = $request->pengaduan_id;
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->petugas_id = Auth::user()->petugas->id;
        $tanggapan->save();

        $pengaduan = Pengaduan::where('id', $request->pengaduan_id)->first();
        $pengaduan->update([
            'status' => $request->status
        ]);

        return redirect()->back()->withToastSuccess('Tanggapan dikirim');
    }
}
