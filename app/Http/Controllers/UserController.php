<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showStatus()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        // Mengambil data calon siswa yang terkait langsung melalui relasi
        $calonsiswa = $user->calonsiswa;

        // Jika tidak ada data siswa terkait dengan pengguna, arahkan ke halaman lain atau tampilkan pesan
        if (!$calonsiswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('status.index', compact('calonsiswa'));
    }
}
