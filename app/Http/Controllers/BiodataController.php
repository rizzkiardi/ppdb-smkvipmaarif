<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Cari biodata berdasarkan user_id dari user yang login
        $biodatas = CalonSiswa::with('statusSiswa', 'orangtua', 'dokumen', 'daftarulang')
                        ->where('user_id', $user->id) // Filter berdasarkan user yang login
                        ->get();

        // Tampilkan biodata di view 'biodata.index'
        return view('biodata.index', compact('biodatas'));
    }
}
