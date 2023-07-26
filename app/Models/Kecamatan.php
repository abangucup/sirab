<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kecamatan',
        'kode_kecamatan',
        'kabko_id',
    ];

    public function kabko()
    {
        return $this->belongsTo(Kabko::class);
    }

    public function instansi()
    {
        return $this->hasManys(Instansi::class);
    }
}
