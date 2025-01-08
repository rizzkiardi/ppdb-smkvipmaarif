<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\StatusSiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use App\Models\User; // Model User
use App\Notifications\StatusDiterimaNotification;

class StatusSiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            // Gunakan paginate untuk mendapatkan objek paginasi
            $calonsiswas = CalonSiswa::with('statussiswa')->paginate(20);
        } else {
            // Untuk role 'user', Anda hanya menampilkan data yang relevan
            $calonsiswas = CalonSiswa::where('user_id', $user->id)->with('statussiswa')->paginate(10);
        }

        return view('status.index', compact('calonsiswas'));
    }

    public function statusUser()
    {
        $calonsiswas = CalonSiswa::with('statusSiswa')->get();
        return view('status.status-user', compact('calonsiswas'));
    }

    /**
     * Show the form for editing the specified student's status.
     */
    public function edit($id)
    {
        $calonsiswas = CalonSiswa::with('statusSiswa', 'dokumen')->get();
        $calonsiswa = CalonSiswa::findOrFail($id);
        $statuses = ['Diproses', 'Diterima', 'Ditolak'];

        return view('status.edit', compact('calonsiswas', 'calonsiswa', 'statuses'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Diterima,Ditolak',
        ]);

        $calonSiswa = CalonSiswa::findOrFail($id); // Cari data calon siswa berdasarkan ID
        $statusSiswa = $calonSiswa->statusSiswa; // Mengakses relasi statusSiswa

        $updateStatus = false;

        if ($statusSiswa) {
            // Update status jika data status sudah ada
            $updateStatus = $statusSiswa->update(['status' => $request->status]);
        } else {
            // Buat data status baru jika belum ada
            $statusSiswa = StatusSiswa::create([
                'calon_siswa_id' => $calonSiswa->id,
                'status' => $request->status,
            ]);
            $updateStatus = $statusSiswa ? true : false;
        }

        if ($updateStatus) {
            // Kirim notifikasi berdasarkan status yang dipilih
            switch ($request->status) {
                case 'Diterima':
                    $message = "Selamat, Status Anda telah <strong>Diterima</strong>. Selanjutnya, Anda dapat Melakukan Daftar Ulang!";
                    break;
                case 'Diproses':
                    $message = "Status Anda sedang <strong>Diproses</strong> oleh Admin.";
                    break;
                case 'Ditolak':
                    $message = "Maaf, status Anda <strong>Ditolak</strong> oleh Admin.";
                    break;
                default:
                    $message = "Status Anda telah diperbarui.";
            }

            // Kirim notifikasi ke calon siswa
            $calonSiswa->user->notify(new StatusDiterimaNotification($message));

            // Berikan pesan keberhasilan
            notify()->success('Status siswa berhasil diubah.');
            return redirect()->route('status');
        } else {
            // Berikan pesan kegagalan
            notify()->error('Terjadi kesalahan saat mengubah status siswa.');
            return redirect()->route('status')->with('error', 'Terjadi kesalahan saat mengubah status siswa.');
        }
    }
}
