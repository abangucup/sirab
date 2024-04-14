<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;

    protected $table = 'kasus';
    
    protected $fillable = [
        'pasien_id',
        'tanggal_gigitan',
        'hewan_rabies',
        'lokasi_gigitan',
        'kondisi',
        'gejala',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function imunisasis()
    {
        return $this->hasManyThrough(Imunisasi::class, Kunjungan::class);
    }
}
