<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                // 1
                'nama_role' => 'Administrator',
                'level_role' => 'super_admin',
            ],
            [
                // 2
                'nama_role' => 'Penanggung Jawab Puskesmas',
                'level_role' => 'pj_puskes',
            ],
            [
                // 3
                'nama_role' => 'Penganggung Jawab Dinas Kesehatan Kota',
                'level_role' => 'pj_dinkes_kota',
            ],
            [
                // 4
                'nama_role' => 'Penganggung Jawab Dinas Kesehatan Provinsi',
                'level_role' => 'pj_dinkes_prov',
            ],
            [
                // 5
                'nama_role' => 'Pasien',
                'level_role' => 'pasien',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
