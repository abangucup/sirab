<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pasien;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\map;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function show(Pengaduan $pengaduan)
    {
        $tanggapans = Tanggapan::where('pengaduan_id', $pengaduan->id)->get();
        return view('pengaduan.show', compact('pengaduan', 'tanggapans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            // 'nama_lengkap',
            // 'telepon',
            // 'alamat',
            // 'jenis_kelamin',
            // 'tanggal_lahir',
            'judul_pengaduan',
            'isi_pengaduan',
            // 'status',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah pengaduan, lengkapi form', 'error');
            return redirect()->back();
        }

        if (!Auth::check()) {
            $biodata = new Biodata();
            $biodata->nama_lengkap = $request->nama_lengkap;
            $biodata->telepon = $request->telepon;
            $biodata->alamat = $request->alamat;
            $biodata->jenis_kelamin = $request->jenis_kelamin;
            $biodata->tanggal_lahir = $request->tanggal_lahir;

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

            // MENGHITUNG DATA
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
            $no_register = $serialNumber . '-' . $currentDate . $year . '-' . $initials;

            $pasien = new Pasien();
            $pasien->biodata_id = $biodata->id;
            $pasien->nomor_register = $no_register;
            $pasien->save();
            
            $user = new User();
            $user->biodata_id = $biodata->id;
            $user->role_id = 5;
            $user->username = $no_register;
            $user->password = Hash::make($no_register);
            $user->save();

            $pengaduan = new Pengaduan();
            $pengaduan->pengadu_id = $user->id;
            $pengaduan->judul_pengaduan = $request->judul_pengaduan;
            $pengaduan->isi_pengaduan = $request->isi_pengaduan;
            $pengaduan->status = 'pending';
            $pengaduan->save();

            Alert::toast('Username "' . $user->username . '" & Password "' . $user->username . '"', 'success');
            Auth::login($user);
            return redirect()->route('pengaduan.saya');
        } else {
            $user = Auth::user();
            $pengaduan = new Pengaduan();
            $pengaduan->pengadu_id = $user->id;
            $pengaduan->judul_pengaduan = $request->judul_pengaduan;
            $pengaduan->isi_pengaduan = $request->isi_pengaduan;
            $pengaduan->status = 'pending';
            $pengaduan->save();
            Alert::toast('Berhasil mengirim pengaduan', 'success');
            return redirect()->route('pengaduan.saya');
        }
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap',
            'telepon',
            'alamat',
            'jenis_kelamin',
            'tanggal_lahir',
            'judul_pengaduan',
            'isi_pengaduan',
            'status',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Rubah pengaduan, lengkapi form', 'error');
            return redirect()->back();
        }

        $pengaduan->update([
            'judul_pengaduan' => $request->judul_pengaduan,
            'isi_pengaduan' => $request->isi_pengaduan,
            'status' => $request->status,
        ]);

        Alert::toast('Berhasil mengubah pengaduan', 'success');
        return redirect()->back();
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        Alert::toast('Berhasil menghapus pengaduan', 'success');
        return redirect()->back();
    }
}
