<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kunjungan_id',
        'tanggal_pemberian_var1',
        'puskesmas_pemberi_var1',
        'tanggal_pemberian_var2',
        'puskesmas_pemberi_var2',
        'tanggal_pemberian_var3',
        'puskesmas_pemberi_var3',
        'tanggal_pemberian_var4',
        'puskesmas_pemberi_var4',
        'status_imunisasi',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function puskes_kunjungan()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_kunjungan');
    }

    public function puskes_pemberi_var1()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var1');
    }
    public function puskes_pemberi_var2()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var2');
    }
    public function puskes_pemberi_var3()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var3');
    }
    public function puskes_pemberi_var4()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var4');
    }
}
