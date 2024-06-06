<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imunisasi>
 */
class ImunisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kunjungan_id' => \App\Models\Kunjungan::inRandomOrder()->first()->id,
            'tanggal_pemberian_imunisasi' => $this->faker->date(),
            'puskesmas_pemberi_imunisasi' => \App\Models\Instansi::where('status', '!=', 'dinas')->inRandomOrder()->first()->id,
            'status_imunisasi' => $this->faker->randomElement(['Var 1', 'Var 2', 'Var 3', 'Var 4']),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
