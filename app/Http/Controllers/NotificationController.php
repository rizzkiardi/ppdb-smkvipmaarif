<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Menampilkan halaman notifikasi dengan status.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil notifikasi pengguna saat ini
        $notifications = $user->notifications; // Semua notifikasi
        $unreadNotifications = $user->unreadNotifications; // Notifikasi belum dibaca

        // Kirim data ke view
        return view('notifikasi.index', compact('notifications', 'unreadNotifications'));
    }

    /**
     * Menandai notifikasi sebagai telah dibaca.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        $user = Auth::user();

        // Cari notifikasi berdasarkan ID
        $notification = $user->notifications()->findOrFail($id);

        // Tandai sebagai telah dibaca
        $notification->markAsRead();

        notify()->success('Notifikasi sudah dibaca.');

        return redirect()->back();
    }

    /**
     * Menandai semua notifikasi sebagai telah dibaca.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllAsRead()
    {
        $user = Auth::user();

        // Tandai semua notifikasi sebagai sudah dibaca
        $user->unreadNotifications->markAsRead();

        notify()->success('Semua notifikasi sudah dibaca.');

        return redirect()->back();
    }
}
