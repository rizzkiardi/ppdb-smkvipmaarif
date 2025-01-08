<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::all(); // Ambil semua kelas beserta siswa
        $jurusanList = ['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik'];
        $kelasExist = Kelas::whereIn('jurusan', $jurusanList)->exists();

        return view('kelas.index', compact('kelasList', 'kelasExist'));
    }


    public function buatKelas()
    {
        $jurusanList = [
            'Akuntansi' => 'X-AK',
            'Desain Komunikasi Visual' => 'X-DKV',
            'Ototronik' => 'X-OT',
        ];

        foreach ($jurusanList as $jurusan => $kode) {
            // Cek apakah sudah ada kelas untuk jurusan ini
            $kelasTerdaftar = Kelas::where('jurusan', $jurusan)->exists();

            // Jika sudah ada kelas, lewati pembuatan kelas baru
            if ($kelasTerdaftar) {
                continue;
            }

            // Ambil siswa yang mendaftar ulang berdasarkan jurusan dari tabel daftar_ulang
            $siswaList = DaftarUlang::whereHas('calonSiswa', function ($query) use ($jurusan) {
                $query->where('jurusan', $jurusan);
            })
            ->whereNull('kelas_id')
            ->get();

            // Buat kelas baru untuk setiap batch siswa
            while ($siswaList->count() > 0) {
                $kelasCount = Kelas::where('jurusan', $jurusan)->count();
                $kelas = Kelas::create([
                    'nama_kelas' => "{$kode}" . ($kelasCount + 1), // Format nama kelas: AK1, DKV1, OT1
                    'jurusan' => $jurusan,
                ]);

                // Ambil maksimal 30 siswa untuk kelas ini
                $batchSiswa = $siswaList->splice(0, 30);

                foreach ($batchSiswa as $siswa) {
                    $siswa->update(['kelas_id' => $kelas->id]);
                }
            }
        }

        return redirect()->back()->with('success', 'Kelas berhasil dibuat.');
    }


    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        // Ambil daftar siswa dari kelas ini
        $siswas = $kelas->daftarUlang()->with('calonSiswa')->get();

        return view('kelas.siswa', compact('siswas'));
    }
    

    public function destroy($id)
    {
        // Temukan kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Pastikan hanya memutus hubungan dengan data di daftar_ulang, bukan menghapus data
        DaftarUlang::where('kelas_id', $kelas->id)->update(['kelas_id' => null]);

        // Hapus kelas
        $kelas->delete();

        return redirect()->route('kelas')->with('success', 'Kelas berhasil dihapus.');
    }


    public function siswaJurusan($kelasId)
    {
        // Cari kelas berdasarkan ID
        $kelas = Kelas::findOrFail($kelasId);
    
        // Ambil siswa yang terdaftar di kelas ini
        $siswaList = DaftarUlang::where('kelas_id', $kelasId)
                                ->with('calonSiswa')
                                ->get();
        $calonsiswas = CalonSiswa::with('statusSiswa', 'orangtua', 'dokumen', 'daftarUlang')->get();

        return view('kelas.siswa-jurusan', compact('kelas', 'siswaList', 'calonsiswas'));
    }
    

}
