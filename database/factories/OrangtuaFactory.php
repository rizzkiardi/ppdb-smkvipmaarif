<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orangtua>
 */
class OrangtuaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // data ayah
            'nama_ayah' => fake()->name(),
            'nik_ayah' => fake()->nik(),
            't_lahir_ayah' => fake()->city(),
            'tgl_lahir_ayah' => fake()->dateTime(),
            'agama_ayah' => fake()->randomElement(['Islam', 'Kristen', 'Budha', 'Hindhu', 'Konghuchu']),
            'pendidikan_ayah' => fake()->randomElement(['Universitas Gajah Mada', 'Universitas Muhammadiyah Purworejo', 'SMP N 18 Purworejo', 'SMP N 32 Purworejo', 'SMP Nurul Muttaqin Kemiri', 'SMP VIP Maarif NU 1 Kemiri']),
            'pekerjaan_ayah' => fake()->randomElement(['Petani', 'Polisi', 'Guru', 'Pegawai Negeri Sipil']),
            'penghasilan_ayah' => fake()->randomElement(['1500000', '2000000', '3000000', '5000000']),
            'no_hp_ayah' => fake()->phoneNumber(),
            'alamat_ayah' => fake()->address(),

            // data ibu
            'nama_ibu' => fake()->name(),
            'nik_ibu' => fake()->nik(),
            't_lahir_ibu' => fake()->city(),
            'tgl_lahir_ibu' => fake()->dateTime(),
            'agama_ibu' => fake()->randomElement(['Islam', 'Kristen', 'Budha', 'Hindhu', 'Konghuchu']),
            'pendidikan_ibu' => fake()->randomElement(['Universitas Gajah Mada', 'Universitas Muhammadiyah Purworejo', 'SMP N 18 Purworejo', 'SMP N 32 Purworejo', 'SMP Nurul Muttaqin Kemiri', 'SMP VIP Maarif NU 1 Kemiri']),
            'pekerjaan_ibu' => fake()->randomElement(['Petani', 'Polisi', 'Guru', 'Pegawai Negeri Sipil']),
            'penghasilan_ibu' => fake()->randomElement(['1500000', '2000000', '3000000', '5000000']),
            'no_hp_ibu' => fake()->phoneNumber(),
            'alamat_ibu' => fake()->address(),
            'calon_siswa_id' => fake()->numberBetween(1, 100)
        ];
    }
}
