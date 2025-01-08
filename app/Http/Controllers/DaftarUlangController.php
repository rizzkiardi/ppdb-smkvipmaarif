<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\DaftarUlang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DaftarUlangController extends Controller
{
    public function index()
    {
        // Jika role adalah admin, ambil semua data daftar ulang
        if (Auth::user()->role === 'admin') {
            $daftarUlangs = DaftarUlang::with('calonSiswa')->get();
            $daftarUlangUser = null; // Admin tidak memerlukan data daftar ulang user spesifik

        } else {
            // Jika role user, ambil daftar ulang berdasarkan calon siswa yang terkait dengan user
            $calonSiswa = Auth::user()->calonSiswa;
            $daftarUlangs = null; // User tidak memerlukan semua data daftar ulang

            $daftarUlangUser = $calonSiswa ? DaftarUlang::where('calon_siswa_id', $calonSiswa->id)->get() : null;
        }

        return view('daftar-ulang.index', compact('daftarUlangs', 'daftarUlangUser'));
    }


    public function create()
    {
        // Jika role adalah admin, ambil semua calon siswa yang berstatus 'Diterima' dan belum daftar ulang
        if (Auth::user()->role === 'admin') {
            $calonSiswas = CalonSiswa::whereHas('statusSiswa', function ($query) {
                $query->where('status', 'Diterima');
            })->whereDoesntHave('daftarUlang')->get(); // Pastikan siswa belum melakukan daftar ulang
        } else {
            // Jika role adalah user, ambil calon siswa terkait user yang berstatus 'Diterima' dan belum daftar ulang
            $calonSiswa = Auth::user()->calonSiswa;

            $calonSiswas = null;
            if ($calonSiswa && $calonSiswa->statusSiswa->status === 'Diterima') {
                // Ambil hanya calon siswa yang sesuai dengan user yang sedang login dan belum melakukan daftar ulang
                $calonSiswas = CalonSiswa::where('id', $calonSiswa->id)
                    ->whereDoesntHave('daftarUlang')
                    ->get();
            }
        }

        return view('daftar-ulang.create', compact('calonSiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'calon_siswa_id' => 'required|exists:calon_siswa,id',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'calon_siswa_id.required' => 'Pilih siswa harus diisi',
            'bukti_pembayaran.required' => 'Bukti pembayaran wajib diunggah',
            'bukti_pembayaran.image' => 'Bukti pembayaran harus berupa gambar',
        ]);

        // Membuat nama file dengan string acak 20 karakter
        // $fileName = Str::random(20) . '.' . $request->bukti_pembayaran->extension();
    
        // Membuat nama file berdasarkan waktu
        $file = 'bukti_pembayaran';
        $fileName = time() . '_' . $file . '.' . $request->bukti_pembayaran->getClientOriginalExtension();


        // Menyimpan file ke storage/app/public/daftarulang
        $path = $request->file('bukti_pembayaran')->storeAs('daftarulang', $fileName);

        // Simpan data ke database
        $daftar = DaftarUlang::create([
            'calon_siswa_id' => $request->calon_siswa_id,
            'bukti_pembayaran' => $fileName,
        ]);

        if ($daftar) {
            // Menampilkan notifikasi sukses dan redirect ke index
            notify()->success('Selamat, anda berhasil daftar ulang.');
            return redirect()->route('daftar-ulang.index');
        } else {
            // Menampilkan notifikasi error dan redirect ke create
            notify()->error('Some problem occurred.');
            return redirect()->route('daftar-ulang.create')->withInput();
        }
    }

    public function edit($id)
    {
        $daftarUlang = DaftarUlang::findOrFail($id);
    
        // Mengambil daftar calon siswa yang berstatus 'Diterima'
        $calonSiswas = CalonSiswa::whereHas('statusSiswa', function ($query) {
            $query->where('status', 'Diterima');
        })->get();
    
        return view('daftar-ulang.edit', compact('daftarUlang', 'calonSiswas'));
    }
    

    public function update(Request $request, $id)
    {
        $daftarUlang = DaftarUlang::findOrFail($id);

        $request->validate([
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'bukti_pembayaran.image' => 'Bukti pembayaran harus berupa gambar',
        ]);

        $updateSuccessful = false;

        // Cek jika ada file bukti pembayaran yang diunggah
        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file lama jika ada
            if ($daftarUlang->bukti_pembayaran) {
                $fileDeleted = Storage::delete('public/daftarulang/' . $daftarUlang->bukti_pembayaran);
            }

            // Simpan file baru
            if ($fileDeleted ?? true) { // Pastikan file lama dihapus (atau tidak ada file lama)
                // Membuat nama file berdasarkan waktu
                $file = 'bukti_pembayaran';
                $fileName = time() . '_' . $file . '.' . $request->bukti_pembayaran->getClientOriginalExtension();

                // $fileName = Str::random(20) . '.' . $request->bukti_pembayaran->extension();
                $fileStored = $request->file('bukti_pembayaran')->storeAs('daftarulang', $fileName);
                if ($fileStored) {
                    $daftarUlang->bukti_pembayaran = $fileName;
                    $updateSuccessful = true;
                }
            }
        } else {
            $updateSuccessful = true; // Jika tidak ada file yang diunggah, dianggap berhasil
        }

        // Simpan data lainnya
        if ($updateSuccessful) {
            $daftarUlang->save();
            notify()->success('Data Berhasil di Perbarui.');
            return redirect()->route('daftar-ulang.index');
        } else {
            notify()->error('Some problem occurred. Please try again.');
            return redirect()->route('daftar-ulang.edit', $id)->withInput();
        }
    }


    public function destroy($id)
    {
        $daftarUlang = DaftarUlang::findOrFail($id);
        // Hapus file bukti pembayaran jika ada
        if ($daftarUlang->bukti_pembayaran) {
            Storage::delete('public/daftarulang/' . $daftarUlang->bukti_pembayaran);
        }
        $daftarUlang->delete();

        return redirect()->route('daftar-ulang.index')->with('success', 'Data daftar ulang berhasil dihapus.');
    }
}
