<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Instansi;
use App\Models\Petugas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::where('user_id', Auth::user()->id)->first();

        if ($petugas) {
            if ($petugas->instansi->status == 'dinas' && $petugas->user->role->level_role == 'pj_dinkes_kota') {
                $instansis = Instansi::where('status', 'puskesmas')
                                    ->orWhereHas('kecamatan.kabko', function($query) {
                                    $query->where('id', Auth::user()->petugas->instansi->kecamatan->kabupaten_id);
                                    })
                                    ->orWhereHas('petugas', function($query) {
                                        $query->where('instansi_id', Auth::user()->petugas->instansi_id);
                                    })->get();
                $dataPetugas = Petugas::whereHas('instansi', function ($query) {
                    $query->where('status', 'puskesmas');
                })->get();
                $roles = Role::where('level_role', 'pj_dinkes_kota')
                            ->orWhere('level_role', 'pj_puskes')->get();
            } elseif ($petugas->instansi->status == 'dinas' && $petugas->user->role->level_role == 'pj_dinkes_prov') {
                $instansis = Instansi::where('status', 'dinas')
                                    ->orWhereHas('kecamatan.kabko', function($query) {
                                    $query->where('id', Auth::user()->petugas->instansi->kecamatan->kabupaten_id);
                                    })
                                    ->orWhereHas('petugas', function($query) {
                                        $query->where('instansi_id', Auth::user()->petugas->instansi_id);
                                    })->get();
                $dataPetugas = Petugas::whereHas('instansi', function ($query) {
                    $query->where('status', 'puskesmas');
                })->get();
                $roles = Role::where('level_role', 'pj_dinkes_prov')
                            ->orWhere('level_role', 'pj_dinkes_kota')->get();
            } else {
                $instansis = Instansi::where('status', 'puskesmas')
                    ->whereHas('petugas', function ($query) {
                        $query->where('instansi_id', Auth::user()->petugas->instansi_id);
                    })->get();
                $dataPetugas = Petugas::whereHas('instansi', function ($query) {
                    $query->where('status', 'puskesmas');
                })
                    ->where('instansi_id', Auth::user()->petugas->instansi_id)->get();
                    $roles = Role::where('level_role', 'pj_puskes')
                                ->where('id', Auth::user()->role_id)
                                ->get();
            }
        }
        if (Auth::user()->role->level_role == 'super_admin') {
            $instansis = Instansi::all();
            $dataPetugas = Petugas::latest()->get();
            $roles = Role::all();
        }

        return view('petugas.index', compact('dataPetugas', 'instansis', 'roles'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'instansi' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role'
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

        $petugas = new Petugas();
        $petugas->user_id = $user->id;
        $petugas->instansi_id = $request->instansi;
        $petugas->save();

        Alert::toast('Berhasil tambah data petugas', 'success');
        return back();
    }

    public function update(Request $request, Petugas $petuga)
    {
        $validasi = Validator::make($request->all(), [
            'instansi' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username,' . $petuga->user->id,
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
            if ($petuga->user->biodata->foto) {
                $url = $petuga->user->biodata->foto;
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

            $petuga->user->biodata->update([
                'foto' => $gambarPath
            ]);
        }

        $petuga->user->biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $petuga->user->update([
            'username' => $request->username,
            'role_id' => $request->role,
        ]);

        if ($request->password) {
            $petuga->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $petuga->update([
            'instansi_id' => $request->instansi,
        ]);


        Alert::toast('Berhasil ubah data petugas', 'success');
        return back();
    }

    public function destroy(Petugas $petuga)
    {
        if ($petuga->user->biodata->foto) {
            $url = $petuga->user->biodata->foto;
            $parse = parse_url($url)['path'];
            if (file_exists(public_path($parse))) {
                unlink(public_path($parse));
            }
        }

        $petuga->user->biodata->delete();

        Alert::toast('petugas telah dihapus', 'success');
        return redirect()->back();
    }
}
