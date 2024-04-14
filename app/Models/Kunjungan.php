<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'kasus_id',
        'tanggal_berkunjung',
        'puskesmas_kunjungan',
        'cuci_luka',
        'hasil_pemeriksaan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function puskes_kunjungan()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_kunjungan');
    }

    public function imunisasis()
    {
        return $this->hasMany(Imunisasi::class);
    }
}

