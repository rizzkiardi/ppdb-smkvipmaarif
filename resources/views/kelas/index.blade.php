@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    {{-- <a href="{{ route('kelas.create') }}" class="py-2 px-6 text-sm rounded-md bg-[#00AA5B] text-white" 
    @if($kelasExist) onclick="event.preventDefault();" @endif>
    Buat Kelas
    </a>
    @if($kelasExist)
        <span class="text-sm text-red-500 italic ml-5">Kelas sudah dibuat</span>
    @endif --}}
    <a href="{{ route('kelas.create') }}" 
   class="py-2 px-6 text-sm rounded-md text-white 
          {{ $kelasExist ? 'bg-gray-400 cursor-not-allowed' : 'bg-[#00AA5B]' }}" 
   @if($kelasExist) onclick="event.preventDefault();" @endif>
    Buat Kelas
</a>
@if($kelasExist)
    <span class="text-sm text-[#00AA5B] italic ml-5">Kelas sudah dibuat</span>
@endif

    <h1 class="mt-7 mb-2">Daftar Kelas SMK VIP Maarif NU 1 Kemiri</h1>

    @php
        $kelasList = App\Models\Kelas::all();
    @endphp

    @if($kelasList->isNotEmpty())
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">No</th>
                        <th scope="col" class="px-2 py-3">Nama Kelas</th>
                        <th scope="col" class="px-2 py-3">Jurusan</th>
                        <th scope="col" class="px-2 py-3">Jumlah siswa</th>
                        <th scope="col" class="px-2 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelasList as $kelas)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                        <td class="text-sm px-2 py-4">{{ $loop->iteration }}</td>
                        <td class="text-sm px-2 py-4">{{ $kelas->nama_kelas }}</td>
                        <td class="text-sm px-2 py-4">{{ $kelas->jurusan }}</td>
                        <td class="text-sm px-2 py-4">{{ $kelas->daftarUlang->count() }} Siswa</td>
                        <td class="flex gap-1 px-2 py-4 justify-center">
                            <a href="{{ route('kelas.siswa-jurusan', $kelas->id) }}">
                                <div class="flex gap-1 items-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Data siswa</span>
                                </div>
                            </a>
                            <!-- Tombol untuk membuka modal -->
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" 
                            data-item-name="{{ $kelas->nama_kelas }}" 
                            data-url="{{ route('kelas.destroy', $kelas->id) }}" 
                            onclick="confirmDelete('{{ $kelas->nama_kelas }}', '{{ route('kelas.destroy', $kelas->id) }}')" 
                            type="button" class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#99154b" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                    Hapus
                                </div>
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div id="popup-modal" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                <div class="relative bg-white rounded-lg shadow-lg max-w-md w-full">
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mt-4 mb-6 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-3 text-lg text-gray-700 dark:text-gray-300">Apakah Anda yakin ingin menghapus Kelas?</h3>
                                        <p id="delete-item-name" class="mb-7 text-lg text-gray-500 dark:text-gray-400"></p>
                                        <div class="flex justify-center gap-4">
                                            <form id="delete-form" action="" method="POST" onsubmit="return confirmDeleteAction();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">Hapus</button>
                                            </form>
                                            <button data-modal-hide="popup-modal" type="button" class="text-gray-900 bg-white border border-gray-200 rounded-lg py-2.5 px-5 text-sm font-medium hover:bg-gray-100 hover:text-gray-800 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="text-sm text-center">Kelas Tidak tersedia.</div>
            </div>
        </div>
    @endif
</div>
<script>
    function confirmDelete(itemName, url) {
        document.getElementById('delete-item-name').innerText = itemName;
        document.getElementById('delete-form').action = url;
        document.getElementById('popup-modal').classList.remove('hidden');
    }
</script>
@endsection
