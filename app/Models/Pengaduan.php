<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengadu_id',
        'judul_pengaduan',
        'isi_pengaduan',
        'status',
    ];

    public function pengadu()
    {
        return $this->belongsTo(User::class, 'pengadu_id');
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}

