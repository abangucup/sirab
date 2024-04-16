<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Instansi;
use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $instansis = Instansi::all();
        $users = User::all();
        return view('halaman_admin.pengguna.index', compact('users', 'instansis', 'roles'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Username sudah ada', 'error');
            return back();
        }

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

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->biodata_id = $biodata->id;
        $user->role_id = $request->role;
        $user->save();

        
        if ($request->role !== '1') {
            if ($request->role == '5') {
                $pasien = new Pasien();
                $pasien->nomor_register = Str::upper($biodata->id.substr(Str::slug($biodata->nama_lengkap), 0, 4).Carbon::now()->day.Carbon::now()->month.Carbon::now()->year);
                $pasien->biodata_id = $biodata->id;
                $pasien->save();
             } else {


            if ($request->instansi == null) {
                $biodata->delete();
                Alert::toast('Selain Admin dan Pasien maka instansi harus dipilih', 'error');
                return redirect()->back();
            } else {
                $petugas = new Petugas();
                $petugas->user_id = $user->id;
                $petugas->instansi_id = $request->instansi;
                $petugas->save();
            }
        }

        }

        Alert::toast('Berhasil tambah data pengguna', 'success');
        return back();
    }

    public function update(Request $request, User $pengguna)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username,' . $pengguna->id,
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
        ]);

        if ($validasi->fails()) {
            if ($validasi->errors()->has('username') && $validasi->errors()->count() == 1) {
                return back()->withErrors($validasi)
                    ->withInput()
                    ->withToastError('Username sudah terdaftar, coba lagi');
            } else {
                return back()->withErrors($validasi)
                    ->withInput()
                    ->withToastError('Lengkapi semua field yang ada');
            }
        }

        if ($request->file('foto')) {
            if ($pengguna->biodata->foto) {
                $url = $pengguna->biodata->foto;
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

            $pengguna->biodata->update([
                'foto' => $gambarPath
            ]);
        }

        if ($request->role !== '1' && $request->role !== '5') {
            if ($request->instansi == null) {
                Alert::toast('Selain Admin dan Pasien maka instansi harus dipilih', 'error');
                return redirect()->back();
            } else {
                if (!$pengguna->petugas) {
                    $petugas = new Petugas();
                    $petugas->user_id = $pengguna->id;
                    $petugas->instansi_id = $request->instansi;
                    $petugas->save();
                } else {
                    $pengguna->petugas->update([
                        'instansi_id' => $request->instansi,
                    ]);
                }
            }
        }

        $pengguna->biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $pengguna->update([
            'username' => $request->username,
            'role_id' => $request->role,
        ]);

        if ($request->password) {
            $pengguna->update([
                'password' => Hash::make($request->password),
            ]);
        }

        Alert::toast('Berhasil ubah data pengguna', 'success');
        return back();
    }

    public function destroy(User $pengguna)
    {
        if ($pengguna->biodata->foto) {
            $url = $pengguna->biodata->foto;
            $parse = parse_url($url)['path'];
            if (file_exists(public_path($parse))) {
                unlink(public_path($parse));
            }
        }

        $pengguna->biodata->delete();

        Alert::toast('Pengguna telah dihapus', 'success');
        return redirect()->back();
    }
}
