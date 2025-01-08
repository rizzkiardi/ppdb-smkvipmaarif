<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Orangtua;
use App\Models\CalonSiswa;
use App\Models\StatusSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Biodata Siswa', 'url' => route('pendaftaran.calon-siswa.create')],
            ['name' => 'Biodata Orangtua', 'url' => route('pendaftaran.orangtua.create')],
            ['name' => 'Unggah Dokumen', 'url' => route('pendaftaran.dokumen.create')]
        ];

        return view('calon-siswa.index', compact('breadcrumbs'));
    }


    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Biodata Siswa', 'url' => route('pendaftaran.calon-siswa.create')],
            ['name' => 'Biodata Orangtua', 'url' => route('pendaftaran.orangtua.create')],
            ['name' => 'Unggah Dokumen', 'url' => route('pendaftaran.dokumen.create')]
        ];

        // Periksa apakah ada pengguna yang sedang login
        if (Auth::check()) {
            $user = Auth::user();

            // Cek peran pengguna
            if ($user->role === 'admin') {
                // Admin dapat melakukan pendaftaran lebih dari satu kali
                $userName = null; // Atau Anda bisa mengatur nama default atau mengambil nama lain
            } else {
                // User biasa mendapatkan nama mereka
                $userName = $user->name;


                // Cek apakah pengguna sudah melakukan pendaftaran
                $isRegistered = CalonSiswa::where('user_id', $user->id)->exists();

                if ($isRegistered) {
                    // Jika pengguna sudah melakukan pendaftaran, arahkan ke halaman lain atau tampilkan pesan
                    // notify()->error('Anda sudah terdaftar di Sistem.');
                    emotify('success', 'Anda sudah terdaftar di Sistem PPDB');
                    // smilify('success', 'Anda sudah terdaftar di Sistem PPDB');
                    return redirect()->route('dashboard'); // Ganti dengan rute yang sesuai
                }
            }
            
            // Kirim nama pengguna dan breadcrumbs ke view
            return view('calon-siswa.create', compact('userName', 'breadcrumbs'));
        } else {
            // Arahkan ke halaman login jika pengguna belum login
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validation = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'nik' => 'required|string|size:16|unique:calon_siswa,nik',
            'sekolah_asal' => 'required',
            'kartu_pip' => 'required',
            'jurusan' => 'required',
            'j_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'nisn' => 'required|unique:calon_siswa,nisn',
            'tahun_lulus' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap Wajib di isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib di isi',
            'agama.required' => 'Agama Wajib di isi',
            'nik.required' => 'NIK Wajib di isi',
            'nik.size' => 'NIK harus 16 karakter',
            'nik.unique' => 'NIK sudah terdaftar',
            'sekolah_asal.required' => 'Asal Sekolah Wajib di isi',
            'kartu_pip.required' => 'Kartu PIP Wajib di isi',
            'jurusan.required' => 'Jurusan Wajib di isi',
            'j_kelamin.required' => 'Jenis Kelamin Wajib di isi',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib di isi',
            'nisn.required' => 'Nomor NISN Wajib di isi',
            'nisn.unique' => 'NISN sudah terdaftar',
            'tahun_lulus.required' => 'Tahun Lulus Wajib di isi',
            'no_hp.required' => 'Nomor HP Wajib di isi',
            'alamat.required' => 'Alamat Rumah Wajib di isi',
        ]);

        // Generate nomor Pendaftaran unik
        do {
            $idNomorPendaftaran = '24VIP' . strtoupper(Str::random(10)); // Contoh: REG-ABC12345
        } while (CalonSiswa::where('id_pendaftaran', $idNomorPendaftaran)->exists());

        // Tambahkan nomor pendaftaran ke data yang akan disimpan
        $data = $request->all();
        $data['id_pendaftaran'] = $idNomorPendaftaran;

        // Jika user adalah role biasa, tambahkan user_id
        if (Auth::user()->role !== 'admin') {
            $data['user_id'] = Auth::id();
        }

        // Simpan data calon siswa
        $calonSiswa = CalonSiswa::create($data);

        // dd($calonSiswa);
        if ($calonSiswa) {
            // Menyimpan status siswa dengan status default 'Diproses'
            StatusSiswa::create([
                'calon_siswa_id' => $calonSiswa->id,
                'status' => 'Diproses', // Status default
            ]);

            notify()->success('Data Siswa Berhasil disimpan.');
            // Mengarahkan ke halaman input data orang tua dengan ID calon siswa
            return redirect()->route('pendaftaran.orangtua.create', ['calon_siswa_id' => $calonSiswa->id]);
        } else {
            notify()->error('Terjadi masalah saat menyimpan data.');
            return redirect()->route('pendaftaran.calon-siswa.create');
        }
    }
    

    // public function show()
    // {
    //     $calonsiswas = CalonSiswa::with('statusSiswa')->get();
    //     $calonsiswas = CalonSiswa::with('statusSiswa')->paginate(20);

    //     return view('calon-siswa.show', compact('calonsiswas'));
    // }

    public function show(Request $request)
    {
        // Ambil keyword pencarian dari request
        $keyword = $request->input('search');

        // Query data calon siswa dengan filter pencarian
        $calonsiswas = CalonSiswa::with('statusSiswa')
            ->when($keyword, function ($query, $keyword) {
                // Filter data berdasarkan nama, sekolah asal, atau jurusan
                $query->where('nisn', 'like', "%{$keyword}%")
                      ->orWhere('nama', 'like', "%{$keyword}%")
                      ->orWhere('j_kelamin', 'like', "%{$keyword}%")
                      ->orWhere('tempat_lahir', 'like', "%{$keyword}%")
                      ->orWhere('tgl_lahir', 'like', "%{$keyword}%")
                      ->orWhere('sekolah_asal', 'like', "%{$keyword}%")
                      ->orWhere('jurusan', 'like', "%{$keyword}%");
            })
            ->paginate(20); // Gunakan paginate untuk membatasi hasil per halaman

        // Mengembalikan tampilan dengan mengirimkan variabel breadcrumbs dan hasil pencarian
        return view('calon-siswa.show', compact('calonsiswas', 'keyword'));
    }


    public function destroy($id)
    {
        // Cari data calon siswa berdasarkan ID
        $calonSiswa = CalonSiswa::findOrFail($id);

        // Hapus data terkait dari tabel dokumen, orang tua, dan status siswa
        Orangtua::where('calon_siswa_id', $id)->delete();
        Dokumen::where('calon_siswa_id', $id)->delete();
        StatusSiswa::where('calon_siswa_id', $id)->delete();

        // Hapus data calon siswa itu sendiri
        $calonSiswa->delete();

        // Beri notifikasi bahwa data berhasil dihapus
        notify()->success('Data Calon Siswa berhasil dihapus.');

        // Redirect ke halaman yang diinginkan, misalnya ke daftar calon siswa
        return redirect()->route('calon-siswa.show');
    }
}
