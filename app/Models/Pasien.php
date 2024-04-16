<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'biodata_id',
        'nomor_register',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function imunisasis()
    {
        return $this->hasManyThrough(Imunisasi::class, Kunjungan::class);
    }
}
