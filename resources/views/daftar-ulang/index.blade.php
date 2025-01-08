@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    <div class="mb-7">
        <a href="{{ route('daftar-ulang.create') }}" class="py-2 px-6 text-sm rounded-md bg-[#00AA5B] text-white">Daftar Ulang</a>
    </div>
    @if (Auth::user()->role == 'admin')
            <h2 class="mb-2">Daftar Calon peserta Didik Baru yang Sudah Melakukan Daftar Ulang</h2>
            <!-- Cek apakah ada data siswa yang sudah daftar ulang -->
            @if($daftarUlangs->count() > 0)
            <div class="overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <table data-tab-for="order" data-page="active" class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                <span class="ml-4">No</span>
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Nama Siswa
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Bukti Pembayaran
                            </th>
                            <th scope="col" class="px-2 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarUlangs as $index => $daftarUlang)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-2 py-4">
                                    <span class="text-sm ml-4">{{ $index + 1 }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="text-sm">{{ $daftarUlang->calonSiswa->nama }}</span>
                                </td>
                                <td class="px-2 py-4">
                                    <!-- Tambahkan link untuk Lightbox2 -->
                                    <a href="{{ asset('storage/daftarulang/' . $daftarUlang->bukti_pembayaran) }}" class=" hover:text-[#00AA5B] " data-lightbox="bukti-pembayaran" data-title="Bukti Pembayaran">
                                        {{ $daftarUlang->bukti_pembayaran }}
                                    </a>
                                </td>
                                <td class="flex gap-2 justify-center px-2 py-4">
                                    {{-- edit --}}
                                    <a class="bg-green-100  text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300" href="{{ route('daftar-ulang.edit', $daftarUlang->id) }}">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#03543f" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                            Edit
                                        </div>
                                    </a>
                                    {{-- hapus --}}
                                    <!-- Tombol untuk membuka modal -->
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" data-item-name="{{ $daftarUlang->calonSiswa->nama }}" data-url="{{ route('daftar-ulang.destroy', $daftarUlang->id) }}" onclick="confirmDelete('{{ route('daftar-ulang.destroy', $daftarUlang->id) }}')" type="button" class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#99154b" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            Hapus
                                        </div>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div id="popup-modal" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                        <div class="relative bg-white rounded-lg shadow-lg max-w-md w-full">
                                            <!-- Modal content -->
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mt-4 mb-6 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-3 text-lg  text-gray-700 dark:text-gray-300">Apakah anda yakin menghapus?</h3>
                                                <p id="delete-item-name" class="mb-7 text-lg  text-gray-500 dark:text-gray-400"></p>
                                                <div class="flex justify-center gap-4">
                                                    <form id="deleteForm" method="POST" action="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal" type="button" class="text-gray-900 bg-white border border-gray-200 rounded-lg py-2.5 px-5 text-sm font-medium hover:bg-gray-100 hover:text-gray-800 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        Batal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End modal hapus -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex flex-col justify-center items-center h-[75vh] w-[100%]">
                    <img src="{{ asset('assets/image/404 Page Not Found.svg') }}" width="200px" alt="Gambar not found" class="mx-auto">
                    <div class="text-sm text-center">Tidak ada data siswa yang melakukan daftar ulang.</div>
                </div>
            </div>
            @endif
        @else
            <h2 class="pb-1 pt-5">Bukti daftar ulang</h2>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table data-tab-for="order" data-page="active" class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-2">
                                ID Pendaftaran
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Nama Siswa
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Jenis Kelamin
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Tempat, Tgl Lahir
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Jurusan
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Bukti Pembayaran
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($daftarUlangUser && $daftarUlangUser->isNotEmpty())
                            @forelse($daftarUlangUser as $index => $daftarUlang)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-2 py-4">
                                        <span class="text-sm">{{ $daftarUlang->calonSiswa->id_pendaftaran }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        <span class="text-sm">{{ $daftarUlang->calonSiswa->nama }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        <span class="text-sm">{{ $daftarUlang->calonSiswa->j_kelamin }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        <span class="text-sm">{{ $daftarUlang->calonSiswa->tempat_lahir }}, {{ Carbon\Carbon::parse($daftarUlang->calonSiswa->tgl_lahir)->translatedFormat('d F Y') }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        <span class="text-sm">{{ $daftarUlang->calonSiswa->jurusan }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        <a href="{{ asset('storage/daftarulang/' . $daftarUlang->bukti_pembayaran) }}" class=" hover:text-[#00AA5B]" data-lightbox="bukti-pembayaran" data-title="Bukti Pembayaran">
                                            {{ $daftarUlang->bukti_pembayaran }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-4">
                                        <a href="{{ route('daftar-ulang.edit', $daftarUlang->id) }}">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Edit</span>
                                        </a>
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" data-item-name="{{ $daftarUlang->calonSiswa->nama }}" data-url="{{ route('daftar-ulang.destroy', $daftarUlang->id) }}" onclick="confirmDelete('{{ route('daftar-ulang.destroy', $daftarUlang->id) }}')" type="button" class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                            Hapus
                                        </button>

                                        <!-- Modal Konfirmasi Hapus -->
                                        <div id="popup-modal" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                            <div class="relative bg-white rounded-lg shadow-lg max-w-md w-full">
                                                <!-- Modal content -->
                                                <div class="p-6 text-center">
                                                    <svg class="mx-auto mt-4 mb-6 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-3 text-lg  text-gray-700 dark:text-gray-300">Apakah anda yakin menghapus?</h3>
                                                    <p id="delete-item-name" class="mb-7 text-lg  text-gray-500 dark:text-gray-400"></p>
                                                    <div class="flex justify-center gap-4">
                                                        <form id="deleteForm" method="POST" action="">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="popup-modal" type="button" class="text-gray-900 bg-white border border-gray-200 rounded-lg py-2.5 px-5 text-sm font-medium hover:bg-gray-100 hover:text-gray-800 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End modal hapus -->
                                    </td>
                                </tr>
                            @empty
                                <!-- Tampilkan pesan jika tidak ada data daftar ulang -->
                                <tr>
                                    <td colspan="7" class="px-2 py-2 text-center">
                                        <div class="mx-auto py-4 px-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Anda belum melakukan Daftar Ulang.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        @else
                            <!-- Tampilkan pesan jika daftarUlangUser null atau kosong -->
                            <tr>
                                <td colspan="7" class="px-2 py-4 text-center">
                                    <div class="mx-auto py-4">
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Anda belum melakukan Daftar Ulang.</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
</div>

<!-- Lightbox2 Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Menangani tombol hapus
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-target');
                const modal = document.getElementById(modalId);
                const itemName = button.getAttribute('data-item-name');
                const deleteForm = document.getElementById('deleteForm');
                const deleteItemName = document.getElementById('delete-item-name');
                
                // Set nama item yang akan dihapus
                deleteItemName.textContent = itemName;
                modal.classList.toggle('hidden');
            });
        });

        // Menangani form hapus
        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
            });
        });
    });

    // Fungsi untuk mengonfigurasi form penghapusan dengan URL yang sesuai
    function confirmDelete(url) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = url;
        const modal = document.getElementById('popup-modal');
        modal.classList.remove('hidden');
    }
</script>
@endsection
