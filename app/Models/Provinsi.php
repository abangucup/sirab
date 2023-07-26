<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi',
        'kode_provinsi',
    ];

    public function kabkos()
    {
        return $this->hasMany(Kabko::class);
    }
}
