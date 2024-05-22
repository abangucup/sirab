<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Kasus;
use App\Models\Pasien;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    public function index()
    {

        $pasiens = Pasien::latest()->get();
        // $pasiens = Pasien::whereHas('kunjungans', function ($query) {
        //     $query->where('puskesmas_kunjungan', Auth()->user()->id);
        // })->get();
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.tambah_pasien');
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withToastError('Harap mengisi semua data');
        }

        // TAMBAH BIODATA
        $biodata = new Biodata();
        $biodata->nama_lengkap = $request->nama_lengkap;
        $biodata->telepon = $request->telepon;
        $biodata->alamat = $request->alamat;
        $biodata->tanggal_lahir = $request->tanggal_lahir ?? null;
        $biodata->jenis_kelamin = $request->jenis_kelamin;

        if ($request->file('foto')) {
            $image = $request->file('foto');
            $imageName = $image->hashName(); // Generate nama file yang unik

            // Pindahkan file ke direktori public/uploads
            $image->move(public_path('uploads'), $imageName);

            // Set path gambar untuk disimpan di database
            $gambarPath = asset('uploads/' . $imageName);

            $biodata->foto = $gambarPath;
        }
        $biodata->save();
        // END TAMBAH BIODATA

        // TAMBAH PASIEN
        $pasien = new Pasien();
        $pasien->biodata_id = $biodata->id;

        // Nomor antrian
        $pasienCount = Pasien::count();
        $serialNumber = str_pad($pasienCount + 1, 4, '0', STR_PAD_LEFT);

        // Tanggal hari ini
        $currentDate = Carbon::now()->format('dM');
        $year = Carbon::now()->format('Y');

        // Inisial nama pasien
        $nameParts = explode(' ', $biodata->nama_lengkap);
        $initials = '';
        foreach ($nameParts as $part) {
            $initials .= strtoupper(substr($part, 0, 1));
        }
        $pasien->nomor_register = $serialNumber . '-' . $currentDate . $year . '-' . $initials;
        $pasien->save();
        // END TAMBAH PASIEN

        // TAMBAH USER
        $user = new User();
        $user->username = $pasien->nomor_register;
        $user->password = Hash::make($pasien->nomor_register);
        $user->biodata_id = $biodata->id;
        $user->role_id = 5;
        $user->save();

        // TAMBAH KASUS
        $kasus = new Kasus();
        $kasus->pasien_id = $pasien->id;
        $kasus->tanggal_gigitan = $request->tanggal_gigitan;
        $kasus->hewan_rabies = $request->hewan_rabies;
        $kasus->lokasi_gigitan = $request->lokasi_gigitan;
        $kasus->kondisi = $request->kondisi;
        $kasus->gejala = $request->gejala;
        $kasus->save();
        // END TAMBAH KASUS

        return redirect()->route('pasien.index')->withToastSuccess('Data pasien ditambahkan');
    }

    public function show(Pasien $pasien)
    {
        $dataKasus = $pasien->kasus()->latest()->get();
        return view('pasien.detail_pasien', compact('pasien', 'dataKasus'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit_pasien', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi)
                ->withInput()
                ->withToastError('Lengkapi semua field yang ada');
        }

        if ($request->file('foto')) {
            if ($pasien->biodata->foto) {
                $url = $pasien->biodata->foto;
                $parse = parse_url($url)['path'];
                // Manipulasi string untuk mendapatkan path yang benar
                // $path = str_replace("/siskada/public", "", $parse);
                if (file_exists(public_path($parse))) {
                    unlink(public_path($parse));
                }
            }

            $image = $request->file('foto');
            $imageName = $image->hashName(); // Generate nama file yang unik

            // Pindahkan file ke direktori public/uploads
            $image->move(public_path('uploads'), $imageName);

            // Set path gambar untuk disimpan di database
            $gambarPath = asset('uploads/' . $imageName);

            $pasien->biodata->update([
                'foto' => $gambarPath
            ]);
        }

        $pasien->biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        
        return redirect()->route('pasien.index')->withToastSuccess('Berhasil ubah data pasien');
    }

    public function destroy(Pasien $pasien)
    {
        if ($pasien->imunisasis->isEmpty()) {
            if ($pasien->biodata->foto) {
                $url = $pasien->biodata->foto;
                $parse = parse_url($url)['path'];
                if (file_exists(public_path($parse))) {
                    unlink(public_path($parse));
                }
            }

            $pasien->biodata->delete();
        }

        return redirect()->back()->withToastSuccess('Berhasil menghapus data pasien');
    }
}
