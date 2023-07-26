<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Instansi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
            'instansi' => 'required',
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:biodatas',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data pengguna', 'error');
            return back();
        }

        $biodata = new Biodata();
        $biodata->nama_lengkap = $request->nama_lengkap;
        $biodata->nik = $request->nik;
        $biodata->telepon = $request->telepon;
        $biodata->alamat = $request->alamat;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->save();

        $user = new User();
        $user->username = $biodata->nik;
        $user->password = Hash::make($biodata->nik);
        $user->biodata_id = $biodata->id;
        $user->role_id = $request->role;
        $user->instansi_id = $request->instansi;
        $user->save();

        Alert::toast('Berhasil tambah data pengguna', 'success');
        return back();
    }
}
