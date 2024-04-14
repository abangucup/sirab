<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $kredensial = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd(Auth::attempt($kredensial));

        if (Auth::attempt($kredensial)) {
            $role = auth()->user()->role->level_role;

            if ($role === 'super_admin') {
                Alert::toast('Berhasil Login', 'success');
                return redirect()->route('dashboard.super_admin');
            } elseif ($role == 'pj_dinkes_prov') {
                return redirect()->route('dashboard.pj_dinkes_prov');
            } elseif ($role == 'pj_dinkes_kota') {
                return redirect()->route('dashboard.pj_dinkes_kota');
            } elseif ($role == 'pj_puskes') {
                return redirect()->route('dashboard.pj_puskes');
            } else {
                return 'Akun tidak ditemukan';
            }

            Alert::toast('Berhasil Login', 'success');
        }

        Alert::toast('Gagal Login', 'error');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('login');
    }
}
