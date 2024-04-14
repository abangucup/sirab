<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biodata::create([
            'nama_lengkap' => 'Suci',
            'alamat' => 'Bonebolango',
            'telepon' => '082111111',
            'jenis_kelamin' => 'p',
        ]);
    }
}
