<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalonSiswa>
 */
class CalonSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pendaftaran' => fake()->lexify('2024VIP?????????????????????????'),
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'agama' => fake()->randomElement(['Islam', 'Kristen', 'Budha', 'Hindhu', 'Konghuchu']),
            'nik' => fake()->nik(),
            'sekolah_asal' => fake()->randomElement(['SMP N 18 Purworejo', 'SMP N 32 Purworejo', 'SMP Nurul Muttaqin Kemiri', 'SMP VIP Maarif NU 1 Kemiri']),
            'kartu_pip' => fake()->randomElement(['Ya', 'Tidak']),
            'jurusan' => fake()->randomElement(['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik']),
            'j_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tgl_lahir' => fake()->dateTime(),
            'nisn' => fake()->randomDigit(10, true),
            'tahun_lulus' => fake()->randomElement(['2021', '2022', '2023']),
            'no_hp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
        ];
    }
}
