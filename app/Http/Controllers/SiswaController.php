<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request): View
    {
        // Ambil keyword pencarian dari request
        $keyword = $request->input('search');

        // Query data siswa dengan filter pencarian
        $calonsiswas = CalonSiswa::whereHas('daftarUlang') // Filter siswa yang sudah melakukan daftar ulang
            ->whereHas('statussiswa', function ($query) {
                // Filter hanya status "Diterima"
                $query->where('status', 'Diterima');
            })
            ->when($keyword, function ($query, $keyword) {
                // Filter data berdasarkan nama, jenis kelamin, tempat lahir, tgl lahir, sekolah asal, atau jurusan
                $query->where(function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%")
                          ->orWhere('j_kelamin', 'like', "%{$keyword}%")
                          ->orWhere('tempat_lahir', 'like', "%{$keyword}%")
                          ->orWhere('tgl_lahir', 'like', "%{$keyword}%")
                          ->orWhere('sekolah_asal', 'like', "%{$keyword}%")
                          ->orWhere('jurusan', 'like', "%{$keyword}%");
                });
            })
            ->get();

        // Kirim data siswa dan keyword pencarian ke view
        return view('siswa.index', compact('calonsiswas', 'keyword'));
    }


    public function show($id)
    {
        $calonsiswas = CalonSiswa::with('statusSiswa', 'orangtua', 'dokumen', 'daftarUlang')->get();
        $calonsiswa = CalonSiswa::findOrFail($id);
        $statuses = ['Diproses', 'Diterima', 'Ditolak'];

        return view('siswa.show', compact('calonsiswas', 'calonsiswa', 'statuses'));
    }
}
