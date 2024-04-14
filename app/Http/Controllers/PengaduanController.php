<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
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

    public function detailPengaduan(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', $pengaduan);
    }

    public function store(Request $request)
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
            Alert::toast('Gagal tambah pengaduan, lengkapi form', 'error');
            return redirect()->back();
        }

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

        $pengaduan = new Pengaduan();
        $pengaduan->pengadu_id = $biodata->id;
        $pengaduan->judul_pengaduan = $request->judul_pengaduan;
        $pengaduan->isi_pengaduan = $request->isi_pengaduan;
        $pengaduan->status = $request->status;
        $pengaduan->save();


        Alert::toast('Berhasil mengirim pengaduan', 'success');
        return redirect()->back();
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
