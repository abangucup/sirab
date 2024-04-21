<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'telepon',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'foto'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class);
    }
}
