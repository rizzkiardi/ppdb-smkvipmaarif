<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserFaqController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\StatusSiswaController;
use App\Http\Controllers\NotificationController;

// Route::get('/test', function () {
//     notify()->success('Welcome to Laravel Notify ⚡️');
//     return view('test');
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Role Admin
Route::middleware(['auth', 'admin'])->group(function () {
    // menu daftar
    Route::get('pendaftaran/calon-siswa', [CalonSiswaController::class, 'index'])->name('pendaftaran.calon-siswa');
    Route::post('pendaftaran/calon-siswa/store', [CalonSiswaController::class, 'store'])->name('pendaftaran.calon-siswa.store');
    Route::get('pendaftaran/calon-siswa/create', [CalonSiswaController::class, 'create'])->name('pendaftaran.calon-siswa.create');

    Route::get('pendaftaran/orangtua', [OrangtuaController::class, 'index'])->name('pendaftaran.orangtua');
    Route::post('pendaftaran/orangtua/store', [OrangtuaController::class, 'store'])->name('pendaftaran.orangtua.store');
    Route::get('pendaftaran/orangtua/create', [OrangtuaController::class, 'create'])->name('pendaftaran.orangtua.create');

    Route::get('pendaftaran/dokumen', [DokumenController::class, 'index'])->name('pendaftaran.dokumen');
    Route::post('pendaftaran/dokumen/post', [DokumenController::class, 'store'])->name('pendaftaran.dokumen.store');
    Route::get('pendaftaran/dokumen/create', [DokumenController::class, 'create'])->name('pendaftaran.dokumen.create');
    
    // menu beranda
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // menu calonsiswa
    Route::get('calon-siswa', [CalonSiswaController::class, 'show'])->name('calon-siswa');
    Route::delete('/calon-siswa/{id}', [CalonSiswaController::class, 'destroy'])->name('calon-siswa.destroy');

    // menu status
    Route::get('status', [StatusSiswaController::class, 'index'])->name('status');
    // Route untuk mengedit dan mengupdate status siswa
    Route::get('/status/ubah/{id}', [StatusSiswaController::class, 'edit'])->name('status.ubah');
    Route::post('/status/ubah/{id}', [StatusSiswaController::class, 'update'])->name('status.update');

    // menu daftar ulang
    Route::get('daftar-ulang', [DaftarUlangController::class, 'index'])->name('daftar-ulang.index');
    Route::get('daftar-ulang/create', [DaftarUlangController::class, 'create'])->name('daftar-ulang.create');
    Route::post('daftar-ulang', [DaftarUlangController::class, 'store'])->name('daftar-ulang.store');

    Route::get('daftar-ulang/edit/{id}', [DaftarUlangController::class, 'edit'])->name('daftar-ulang.edit');
    Route::put('daftar-ulang/{id}', [DaftarUlangController::class, 'update'])->name('daftar-ulang.update');
    Route::delete('daftar-ulang/{id}', [DaftarUlangController::class, 'destroy'])->name('daftar-ulang.destroy');

    // menu siswa
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('siswa/show/{id}', [SiswaController::class, 'show'])->name('siswa.show');

    // Kelas
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('kelas/create', [KelasController::class, 'buatKelas'])->name('kelas.create');
    Route::get('/kelas/siswa/{id}', [KelasController::class, 'showSiswa'])->name('kelas.siswa');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::get('/kelas/{id}/siswa', [KelasController::class, 'siswaJurusan'])->name('kelas.siswa-jurusan');

    // menu faq
    Route::resource('faq', FaqController::class);
    Route::get('faq', [FaqController::class, 'index'])->name('faq.index');

    // print
    Route::get('bukti-pendaftaran', [PrintController::class, 'index'])->name('bukti-pendaftaran');
    // Route::get('bukti-pendaftaran/cetak', [PrintController::class, 'print'])->name('bukti-pendaftaran.cetak');
    Route::get('cetak/{id_pendaftaran}', [PrintController::class, 'print'])->name('cetak');
});

// Role User
Route::middleware('auth')->group(function () {
    // menu daftar
    Route::get('pendaftaran/calon-siswa', [CalonSiswaController::class, 'index'])->name('pendaftaran.calon-siswa');
    Route::post('pendaftaran/calon-siswa/store', [CalonSiswaController::class, 'store'])->name('pendaftaran.calon-siswa.store');
    Route::get('pendaftaran/calon-siswa/create', [CalonSiswaController::class, 'create'])->name('pendaftaran.calon-siswa.create');

    Route::get('pendaftaran/orangtua', [OrangtuaController::class, 'index'])->name('pendaftaran.orangtua');
    Route::post('pendaftaran/orangtua/store', [OrangtuaController::class, 'store'])->name('pendaftaran.orangtua.store');
    Route::get('pendaftaran/orangtua/create', [OrangtuaController::class, 'create'])->name('pendaftaran.orangtua.create');

    Route::get('pendaftaran/dokumen', [DokumenController::class, 'index'])->name('pendaftaran.dokumen');
    Route::post('pendaftaran/dokumen/post', [DokumenController::class, 'store'])->name('pendaftaran.dokumen.store');
    Route::get('pendaftaran/dokumen/create', [DokumenController::class, 'create'])->name('pendaftaran.dokumen.create');
    
    // menu beranda
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    // menu calon siswa
    Route::get('calon-siswa/show', [CalonSiswaController::class, 'show'])->name('calon-siswa.show');

    // menu biodata
    Route::get('biodata', [BiodataController::class, 'index'])->name('biodata');

    // menu status
    Route::get('status-user', [StatusSiswaController::class, 'statusUser'])->name('status.user');
    
    // menu daftar ulang
    Route::get('daftar-ulang', [DaftarUlangController::class, 'index'])->name('daftar-ulang.index');
    Route::get('daftar-ulang/create', [DaftarUlangController::class, 'create'])->name('daftar-ulang.create');
    Route::post('daftar-ulang', [DaftarUlangController::class, 'store'])->name('daftar-ulang.store');

    Route::get('daftar-ulang/edit/{id}', [DaftarUlangController::class, 'edit'])->name('daftar-ulang.edit');
    Route::put('daftar-ulang/{id}', [DaftarUlangController::class, 'update'])->name('daftar-ulang.update');
    Route::delete('daftar-ulang/{id}', [DaftarUlangController::class, 'destroy'])->name('daftar-ulang.destroy');

    // status siswa
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/notifikasi/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifikasi/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');

});
Route::get('/', [UserFaqController::class, 'welcome']);
