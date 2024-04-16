<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'kode_instansi',
        'alamat_instansi',
        'status',
        'kecamatan_id',
    ];

    public function petugas()
    {
        return $this->hasMany(Petugas::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalPelayanan::class);
    }

}
