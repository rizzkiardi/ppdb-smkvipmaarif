<?php

namespace App\Http\Controllers;

use App\Models\Orangtua;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrangtuaController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Biodata Siswa', 'url' => route('pendaftaran.calon-siswa.create')],
            ['name' => 'Biodata Orangtua', 'url' => route('pendaftaran.orangtua.create')],
            ['name' => 'Unggah Dokumen', 'url' => route('pendaftaran.dokumen.create')]
        ];

        return view('orangtua.index', compact('breadcrumbs'));
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

        return view('orangtua.create', compact('calonSiswaId', 'breadcrumbs'));
    }


    public function store(Request $request)
    {
        $validation = $request->validate(
            [
            'calon_siswa_id' => 'required|exists:calon_siswa,id',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|string|size:16',
            't_lahir_ayah' => 'required',
            'tgl_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'no_hp_ayah' => 'required',
            'alamat_ayah' => 'required',

            'nama_ibu' => 'required',
            'nik_ibu' => 'required|string|size:16',
            't_lahir_ibu' => 'required',
            'tgl_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'no_hp_ibu' => 'required',
            'alamat_ibu' => 'required',
        ],
            [
            'calon_siswa_id.required' => 'ID Calon Siswa wajib diisi.',
            'calon_siswa_id.exists' => 'ID Calon Siswa tidak ditemukan.',
            'nama_ayah' => 'Nama Orangtua wajib di isi',
            'nik_ayah' => 'NIK wajib di isi',
            'nik_ayah.size' => 'NIK harus 16 karakter',
            'nik_ayah.unique' => 'NIK sudah terdaftar',
            't_lahir_ayah' => 'Tempat Lahir wajib di isi',
            'tgl_lahir_ayah' => 'Tanggal Lahir wajib di isi',
            'agama_ayah' => 'Agama wajib di isi',
            'pendidikan_ayah' => 'Pendidikan Terakhir wajib di isi',
            'pekerjaan_ayah' => 'Pekerjaan wajib di isi',
            'penghasilan_ayah' => 'Penghasilan wajib di isi',
            'no_hp_ayah' => 'Nomor HP wajib di isi',
            'alamat_ayah' => 'Alamat Rumah wajib di isi',

            'nama_ibu' => 'Nama Orangtua wajib di isi',
            'nik_ibu' => 'NIK wajib di isi',
            'nik_ibu.size' => 'NIK harus 16 karakter',
            'nik_ibu.unique' => 'NIK sudah terdaftar',
            't_lahir_ibu' => 'Tempat Lahir wajib di isi',
            'tgl_lahir_ibu' => 'Tanggal Lahir wajib di isi',
            'agama_ibu' => 'Agama wajib di isi',
            'pendidikan_ibu' => 'Pendidikan Terakhir wajib di isi',
            'pekerjaan_ibu' => 'Pekerjaan wajib di isi',
            'penghasilan_ibu' => 'Penghasilan wajib di isi',
            'no_hp_ibu' => 'Nomor HP wajib di isi',
            'alamat_ibu' => 'Alamat Rumah wajib di isi',
        ]
        );

        // dd($request->all());

        // Simpan data orangtua
        $data = $request->all();

        $orangtua = Orangtua::create($data);

        if ($orangtua) {
            notify()->success('Data Orangtua Berhasil disimpan.');
            return redirect(route('pendaftaran.dokumen.create', ['calon_siswa_id' => $data['calon_siswa_id']]));
        } else {
            notify()->error('Terjadi masalah saat menyimpan data.');
            return redirect(route('pendaftaran.orangtua.create', ['calon_siswa_id' => $data['calon_siswa_id']]));
        }
    }
}
