<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'instansi_id',
        'hari',
        'jam_mulai',
        'jam_istrahat',
        'jam_tutup',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
