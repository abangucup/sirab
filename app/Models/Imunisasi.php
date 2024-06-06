<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'imunisasis';

    // protected $fillable = [
    //     'kunjungan_id',
    //     'tanggal_pemberian_var1',
    //     'puskesmas_pemberi_var1',
    //     'tanggal_pemberian_var2',
    //     'puskesmas_pemberi_var2',
    //     'tanggal_pemberian_var3',
    //     'puskesmas_pemberi_var3',
    //     'tanggal_pemberian_var4',
    //     'puskesmas_pemberi_var4',
    //     'status_imunisasi',
    // ];
    protected $fillable = [
        'kunjungan_id',
        'tanggal_pemberian_imunisasi',
        'puskesmas_pemberi_imunisasi',
        'status_imunisasi',
        'keterangan'
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function kasus()
    {
        return $this->belongsToThrough(Kasus::class, Kunjungan::class, foreignKeyLookup: [Kasus::class => 'kasus_id']);
    }

    // public function kasus()
    // {
    //     return $this->hasManyThrough(Kunjungan::class, Kasus::class, 'id', 'kunjungan_id', )
    // }

    public function puskes_pemberi()
    {
        return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_imunisasi');
    }

    public function getNamaPuskesmasPemberiAttribute()
    {
        return $this->puskes_pemberi->nama_instansi;
    }

    // public function puskes_pemberi_var1()
    // {
    //     return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var1');
    // }
    // // GETTER NAMA PUSKESMAS PEMBERI IMUNISASI
    // public function getPemberiVar1Attribute()
    // {
    //     return $this->puskes_pemberi_var1->nama_instansi ?? '-';
    // }


    // public function puskes_pemberi_var2()
    // {
    //     return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var2');
    // }
    // // GETTER NAMA PUSKESMAS PEMBERI IMUNISASI
    // public function getPemberiVar2Attribute()
    // {
    //     return $this->puskes_pemberi_var2->nama_instansi ?? '-';
    // }


    // public function puskes_pemberi_var3()
    // {
    //     return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var3');
    // }
    // // GETTER NAMA PUSKESMAS PEMBERI IMUNISASI
    // public function getPemberiVar3Attribute()
    // {
    //     return $this->puskes_pemberi_var3->nama_instansi ?? '-';
    // }


    // public function puskes_pemberi_var4()
    // {
    //     return $this->belongsTo(Instansi::class, 'puskesmas_pemberi_var4');
    // }
    // // GETTER NAMA PUSKESMAS PEMBERI IMUNISASI
    // public function getPemberiVar4Attribute()
    // {
    //     return $this->puskes_pemberi_var4->nama_instansi ?? '-';
    // }
}
