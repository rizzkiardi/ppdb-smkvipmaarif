<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{

    public function index()
    {
        $calonsiswas = CalonSiswa::with('orangtua', 'dokumen')->get();
        return view('print.index', compact('calonsiswas'));
    }

    public function print($id_pendaftaran)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login

        // Mengambil data calon siswa berdasarkan id_pendaftaran
        $calonsiswa = CalonSiswa::with('orangtua', 'dokumen')->where('id_pendaftaran', $id_pendaftaran)->first();

        if (!$calonsiswa) {
            return redirect()->back()->with('error', 'Calon siswa tidak ditemukan.');
        }


        date_default_timezone_set('Asia/Jakarta');
        $logoSmk = public_path('assets/image/logo smk vip maarif nu 1kemiri.jpg');
        $ttd = public_path('assets/image/ttd-Sigit.png');
        $pasFoto = public_path('storage/dokumen/' . $calonsiswa->dokumen->first()->pas_foto);
        $data = [
            'logo' => $logoSmk,
            'ttd' => $ttd,
            'foto' => $pasFoto,
            'title' => 'Bukti Pendaftaran Peserta Didik Baru',
            'date' => Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y, H:mm:ss'),
            'calonsiswa' => $calonsiswa,
            'user' => $user
        ];


        // Menghasilkan PDF dengan data calon siswa yang diambil
        $pdf = Pdf::loadView('print.bukti-pendaftaran', $data);

        return $pdf->download('bukti-pendaftaran-' . $calonsiswa->id_pendaftaran . '.pdf');
    }

}
