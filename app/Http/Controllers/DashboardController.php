<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('halaman_admin.dashboard');
    }

    public function dinkes()
    {
        return view('halaman_dinkes.dashboard');
    }

    public function puskes()
    {
        return view('halaman_puskes.dashboard');
    }

    public function kabid()
    {
        return view('halaman_kabid.dashboard');
    }

    public function kapus()
    {
        return view('halaman_kapus.dashboard');
    }

    public function kadis()
    {
        return view('halaman_kadis.dashboard');
    }
}
