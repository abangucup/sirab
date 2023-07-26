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
                'level_role' => 'admin',
            ],
            [
                // 2
                'nama_role' => 'Kepala Dinas',
                'level_role' => 'kadis',
            ],
            [
                // 3
                'nama_role' => 'Kepala Puskesmas',
                'level_role' => 'kapus',
            ],
            [
                // 4
                'nama_role' => 'Kepala Bidang',
                'level_role' => 'kabid',
            ],
            [
                // 5
                'nama_role' => 'Pengelola Program',
                'level_role' => 'pj_puskes',
            ],
            [
                // 6
                'nama_role' => 'Penganggung Jawab Program',
                'level_role' => 'pj_dinkes',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
