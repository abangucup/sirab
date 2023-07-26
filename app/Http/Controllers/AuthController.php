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

            if ($role === 'admin') {
                Alert::toast('Berhasil Login', 'success');
                return redirect()->route('dashboard.admin');
            } elseif ($role == 'pj_dinkes') {
                return redirect()->route('dashboard.pj_dinkes');
            } elseif ($role == 'pj_puskes') {
                return redirect()->route('dashboard.pj_puskes');
            } elseif ($role == 'kabid') {
                return redirect()->route('dashboard.kabid');
            } elseif ($role == 'kapus') {
                return redirect()->route('dashboard.kapus');
            } else {
                return redirect()->route('dashboard.kadis');
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
