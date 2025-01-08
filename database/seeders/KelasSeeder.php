<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['nama_kelas' => 'Akuntansi', 'jurusan' => 'Akuntansi'],
            ['nama_kelas' => 'DKV', 'jurusan' => 'DKV'],
            ['nama_kelas' => 'Ototronik', 'jurusan' => 'Ototronik']
        ];

        foreach ($classes as $class) {
            Kelas::create($class);
        }
    }
}
