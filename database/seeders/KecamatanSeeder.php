<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = [
            [
                // 1
                'nama_kecamatan' => 'Kota Barat',
                'kode_kecamatan' => '757101',
                'kabko_id' => 6,
            ],
            [
                // 2
                'nama_kecamatan' => 'Kota Seletan',
                'kode_kecamatan' => '757102',
                'kabko_id' => 6,
            ],
            [
                // 3
                'nama_kecamatan' => 'Kota Utara',
                'kode_kecamatan' => '757103',
                'kabko_id' => 6,
            ],
            [
                // 4
                'nama_kecamatan' => 'Dungingi',
                'kode_kecamatan' => '757104',
                'kabko_id' => 6,
            ],
            [
                // 5
                'nama_kecamatan' => 'Kota Timur',
                'kode_kecamatan' => '757105',
                'kabko_id' => 6,
            ],
            [
                // 6
                'nama_kecamatan' => 'Kota Tengah',
                'kode_kecamatan' => '757106',
                'kabko_id' => 6,
            ],
            [
                // 7
                'nama_kecamatan' => 'Sipatana',
                'kode_kecamatan' => '757107',
                'kabko_id' => 6,
            ],
            [
                // 8
                'nama_kecamatan' => 'Dumbo Raya',
                'kode_kecamatan' => '757108',
                'kabko_id' => 6,
            ],
            [
                // 9
                'nama_kecamatan' => 'Hulonthalangi',
                'kode_kecamatan' => '757109',
                'kabko_id' => 6,
            ],
            [
                // 10
                'nama_kecamatan' => 'Kota Gorontalo',
                'kode_kecamatan' => '757199',
                'kabko_id' => 6,
            ],
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
