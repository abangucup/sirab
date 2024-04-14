<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instansis = [
            [
                // 1
                'nama_instansi' => 'Puskesmas Pilolodaa',
                'kode_instansi' => '1071177',
                'alamat_instansi' => 'Rumah Sakit Umum Daerah Otanaha, Jl. Usman Isa, Pilolodaa, Kec. Kota Bar., Kota Gorontalo, Gorontalo 96181',
                'status' => 'puskesmas',
                'kecamatan_id' => 1,
            ],
            [
                // 2
                'nama_instansi' => 'Puskesmas Kota Barat',
                'kode_instansi' => '1071178',
                'alamat_instansi' => 'Jl. Rambutan, Buladu, Kec. Kota Bar., Kabupaten Gorontalo, Gorontalo 9613',
                'status' => 'puskesmas',
                'kecamatan_id' => 1,
            ],
            [
                // 3
                'nama_instansi' => 'Puskesmas Dungingi',
                'kode_instansi' => '1071179',
                'alamat_instansi' => 'Jl. Anggur, Huangobotu, Kec. Dungingi, Kabupaten Gorontalo, Gorontalo 96136',
                'status' => 'puskesmas',
                'kecamatan_id' => 4,
            ],
            [
                // 4
                'nama_instansi' => 'Puskesmas Kota Selatan',
                'kode_instansi' => '1071180',
                'alamat_instansi' => 'G3V3+9F5, Jl. Moh. Yamin, Limba B, Kota Sel., Kota Gorontalo, Gorontalo 96136',
                'status' => 'puskesmas',
                'kecamatan_id' => 2,
            ],
            [
                // 5
                'nama_instansi' => 'Puskesmas Kota Timur',
                'kode_instansi' => '1071181',
                'alamat_instansi' => 'G3QG+Q87, Tamalate, Kec. Kota Tim., Kota Gorontalo, Gorontalo 96135',
                'status' => 'puskesmas',
                'kecamatan_id' => 5,
            ],
            [
                // 6
                'nama_instansi' => 'Puskesmas Hulonthalangi',
                'kode_instansi' => '1071182',
                'alamat_instansi' => 'G3F5+QC3, Jalan Karel Satsuit Tubun, Tenda, Kec. Hulonthalangi, Kabupaten Gorontalo, Gorontalo 96133',
                'status' => 'puskesmas',
                'kecamatan_id' => 9,
            ],
            [
                // 7
                'nama_instansi' => 'Puskesmas Dumbo Raya',
                'kode_instansi' => '1071183',
                'alamat_instansi' => 'G3C7+88H, Talumolo, Kec. Dumbo Raya, Kota Gorontalo, Gorontalo 96133',
                'status' => 'puskesmas',
                'kecamatan_id' => 8,
            ],
            [
                // 8
                'nama_instansi' => 'Puskesmas Kota Utara',
                'kode_instansi' => '1071184',
                'alamat_instansi' => 'H389+HH7, Wongkaditi, Kec. Kota Utara, Kota Gorontalo, Gorontalo 96128',
                'status' => 'puskesmas',
                'kecamatan_id' => 3,
            ],
            [
                // 9
                'nama_instansi' => 'Puskesmas Kota Tengah',
                'kode_instansi' => '1071185',
                'alamat_instansi' => 'H26X+79H, Jl. Sulawesi, Dulalowo, Gorontalo, Kota Gorontalo, Gorontalo 96138',
                'status' => 'puskesmas',
                'kecamatan_id' => 6,
            ],
            [
                // 10
                'nama_instansi' => 'Puskesmas Sipatana',
                'kode_instansi' => '1071186',
                'alamat_instansi' => 'Jl. Tondano I, Bulotadaa, Kec. Sipatana, Kota Gorontalo, Gorontalo 96139',
                'status' => 'puskesmas',
                'kecamatan_id' => 7,
            ],
            [
                // 11
                'nama_instansi' => 'Dinas Kesehatan Gorontalo',
                'kode_instansi' => '75719911',
                'alamat_instansi' => 'Jalan Jamaludin Malik No.52, Kota Selatan, Limba U Dua, Gorontalo, Kota Gorontalo, Gorontalo 96138',
                'status' => 'dinas',
                'kecamatan_id' => 10,
            ],
        ];

        foreach ($instansis as $instansi) {
            Instansi::create($instansi);
        }
    }
}
