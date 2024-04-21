<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->get();
        return view('pasien.index', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $validasi =  Validator::make($request->all(), []);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Harap mengisi semua data');
        }
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validasi =  Validator::make($request->all(), []);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Harap mengisi semua data');
        }
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->biodata->delete();

        return redirect()->back()->withToastSuccess('Berhasil menghapus data pasien');
    }
}
