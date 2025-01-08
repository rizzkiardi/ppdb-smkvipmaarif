<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Dokumen;
use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use App\Models\StatusSiswa;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalonSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $faker = Faker::create('id_ID');
            for ($i = 1; $i <= 300; $i++) {

                // Generate a random date of birth
                $tgl_lahir = Carbon::now()->subYears(rand(17, 20))->format('Y-m-d');
                // Buat data calon siswa
                
                // Create a new CalonSiswa record
                $calonSiswa = CalonSiswa::create([
                    'id_pendaftaran' => 'VIP24' .rand(11111111, 99999999), // Unique registration ID
                    'nama' => $faker->name,
                    'tempat_lahir' => $faker->city,
                    'agama' => 'Islam',
                    'nik' => '3306' . rand(111111111111, 999999999999), // Random NIK
                    'sekolah_asal' => 'SMP ' . $i,
                    'kartu_pip' => 'Tidak',
                    'jurusan' => ['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik'][array_rand(['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik'])], // Random jurusan
                    'j_kelamin' => ['Laki-laki', 'Perempuan'][array_rand(['Laki-laki', 'Perempuan'])], // Random gender
                    'tgl_lahir' => $tgl_lahir,
                    'nisn' => '05' . rand(11111111, 99999999), // Random NISN
                    'tahun_lulus' => rand(2020, 2024), // Random graduation year
                    'no_hp' => '08' . rand(1111111111, 9999999999), // Random phone number
                    'alamat' => $faker->address,
                    'user_id' => null, // Nullable user_id for now
                    'kelas_id' => null, // Nullable kelas_id for now
                ]);

                // Create the status "Diterima" for each student
                StatusSiswa::create([
                    'calon_siswa_id' => $calonSiswa->id,
                    'status' => 'Diterima',
                ]);

                // Create a re-registration (daftar ulang) record
                DaftarUlang::create([
                    'calon_siswa_id' => $calonSiswa->id,
                    'bukti_pembayaran' => 'bukti_pembayaran_' . $i . '.jpg', // Example file name for proof of payment
                    'kelas_id' => null, // You can assign a class here if needed
                ]);

                Dokumen::create([
                    'pas_foto' => 'pas_foto_' . $calonSiswa->id . '.jpg', // Contoh nama file pas foto
                    'skl' => 'skl_' . $calonSiswa->id . '.pdf',           // Contoh nama file surat keterangan lulus
                    'ijazah' => rand(0, 1) ? 'ijazah_' . $calonSiswa->id . '.pdf' : null,  // Ijazah boleh kosong
                    'kk' => 'kk_' . $calonSiswa->id . '.pdf',             // Contoh nama file kartu keluarga
                    'akte' => 'akte_' . $calonSiswa->id . '.pdf',         // Contoh nama file akte kelahiran
                    'calon_siswa_id' => $calonSiswa->id,                 // Relasi dengan calon siswa
                ]);
            }
        });
    }
}
