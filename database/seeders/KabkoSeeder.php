<?php

namespace Database\Seeders;

use App\Models\Kabko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabkoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabko = [
            [
                'nama_kabko' => 'Kabupaten Gorontalo',
                'kode_kabko' => '7501',
                'provinsi_id' => 1,
            ],
            [
                'nama_kabko' => 'Kabupaten Boalemo',
                'kode_kabko' => '7502',
                'provinsi_id' => 1,
            ],
            [
                'nama_kabko' => 'Kabupaten Bone bolango',
                'kode_kabko' => '7503',
                'provinsi_id' => 1,
            ],
            [
                'nama_kabko' => 'Kabupaten Pohuwato',
                'kode_kabko' => '7504',
                'provinsi_id' => 1,
            ],
            [
                'nama_kabko' => 'Kabupaten Gorontalo Utara',
                'kode_kabko' => '7505',
                'provinsi_id' => 1,
            ],
            [
                'nama_kabko' => 'Kota Gorontalo',
                'kode_kabko' => '7571',
                'provinsi_id' => 1,
            ],
        ];

        foreach ($kabko as $item) {
            Kabko::create($item);
        }
    }
}
