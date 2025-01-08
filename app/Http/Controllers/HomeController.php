<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\CalonSiswa;
use App\Models\StatusSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        $calonsiswas = CalonSiswa::all();
        $jumlahPengguna = User::count();
        $jumlahPendaftar = Calonsiswa::count();
        $jumlahSiswaDaftarUlang = CalonSiswa::whereHas('daftarUlang')
            ->whereHas('statussiswa', function ($query) {
                $query->where('status', 'Diterima');
            })
            ->count();

        $jumlahSiswaDiterima = CalonSiswa::whereHas('statusSiswa', function ($query) {
            $query->where('status', 'Diterima');
        })->count();

        // Hitung jumlah pendaftar untuk setiap jurusan
        $akuntansiCount = CalonSiswa::where('jurusan', 'Akuntansi')->count();
        $dkvCount = CalonSiswa::where('jurusan', 'Desain Komunikasi Visual')->count();
        $ototronikCount = CalonSiswa::where('jurusan', 'Ototronik')->count();

        $user = Auth::user();

        // Ambil notifikasi pengguna saat ini
        $notifications = $user->unreadNotifications;
        return view('beranda.index', compact(['calonsiswas', 'jumlahPengguna', 'jumlahPendaftar','jumlahSiswaDaftarUlang', 'jumlahSiswaDiterima', 'akuntansiCount', 'dkvCount', 'ototronikCount', 'notifications']));
    }


}
