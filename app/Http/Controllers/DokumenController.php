<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class DokumenController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Biodata Siswa', 'url' => route('pendaftaran.calon-siswa.create')],
            ['name' => 'Biodata Orangtua', 'url' => route('pendaftaran.orangtua.create')],
            ['name' => 'Unggah Dokumen', 'url' => route('pendaftaran.dokumen.create')]
        ];

        return view('dokumen.index', compact('breadcrumbs'));
    }

    public function create(Request $request)
    {
        $calonSiswaId = $request->query('calon_siswa_id');

        if (!$calonSiswaId || !CalonSiswa::find($calonSiswaId)) {
            notify()->error('Data calon siswa tidak ditemukan.');
            return redirect()->route('pendaftaran.calon-siswa.create');
        }

        $breadcrumbs = [
            ['name' => 'Biodata Siswa', 'url' => route('pendaftaran.calon-siswa.create')],
            ['name' => 'Biodata Orangtua', 'url' => route('pendaftaran.orangtua.create')],
            ['name' => 'Unggah Dokumen', 'url' => route('pendaftaran.dokumen.create')]
        ];

        return view('dokumen.create', compact('calonSiswaId', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validation = $request->validate([
            'pas_foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'skl' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ijazah' => 'image|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'akte' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            // 'akte' => 'required|mimes:pdf|max:2048',
        ], [
            'pas_foto.required' => 'Foto wajib diisi.',
            'pas_foto.image' => 'Foto harus berupa gambar.',
            'pas_foto.mimes' => 'Format Foto harus jpg, jpeg, atau png.',
            'pas_foto.max' => 'Ukuran Foto tidak boleh lebih dari 2Mb.',
            'skl.required' => 'Surat Keterangan Lulus wajib diisi.',
            'skl.mimes' => 'Format SKL harus jpg, jpeg, atau png.',
            'skl.max' => 'Ukuran SKL tidak boleh lebih dari 2MB.',
            'ijazah.required' => 'Ijazah wajib diisi.',
            'ijazah.mimes' => 'Format Ijazah harus jpg, jpeg, atau png.',
            'ijazah.max' => 'Ukuran Ijazah tidak boleh lebih dari 2MB.',
            'kk.required' => 'Kartu Keluarga wajib diisi.',
            'kk.mimes' => 'Format KK harus jpg, jpeg, atau png.',
            'kk.max' => 'Ukuran KK tidak boleh lebih dari 2MB.',
            'akte.required' => 'Akte Kelahiran wajib diisi.',
            'akte.mimes' => 'Format Akte harus jpg, jpeg, atau png.',
            'akte.max' => 'Ukuran Akte tidak boleh lebih dari 2MB.',
        ]);

        // Daftar file yang akan diupload
        $files = ['pas_foto', 'skl', 'ijazah', 'kk', 'akte'];
        $data = [];

        // Upload dan simpan nama file
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $uploadedFile = $request->file($file);
                $filename = time() . '_' . $file . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->storeAs('dokumen', $filename, 'public');
                $data[$file] = $filename;
            }
        }

        // Menyimpan data dokumen ke database
        Dokumen::create([
            'calon_siswa_id' => $request->input('calon_siswa_id'),
            'pas_foto' => $data['pas_foto'] ?? null,
            'skl' => $data['skl'] ?? null,
            'ijazah' => $data['ijazah'] ?? null,
            'kk' => $data['kk'] ?? null,
            'akte' => $data['akte'] ?? null,
        ]);

        // notify()->success('Dokumen berhasil diunggah.');
        // return redirect()->route('dashboard');
        // Menyimpan notifikasi untuk ditampilkan dengan SweetAlert
        return redirect()->route('dashboard')->with('success', 'Anda berhasil mendaftar di SMK VIP MAARIF NU 1 KEMIRI.');
    }
}
