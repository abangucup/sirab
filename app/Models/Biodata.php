<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'telepon',
        'alamat',
        'jenis_kelamin',
        'foto'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
