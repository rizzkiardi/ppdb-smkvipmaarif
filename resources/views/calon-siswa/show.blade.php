@extends('layouts.app')

@section('content')
<div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
    <h2 class="mb-5">Calon peserta Didik Baru SMK VIP Maarif NU 1 Kemiri</h2>
        @if (Auth::user()->role == 'admin')
            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('calon-siswa') }}" class="pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <input 
                        type="text" 
                        id="table-search" 
                        name="search" 
                        class="block w-80 p-2 pl-5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B] focus:border-[#00AA5B] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                        placeholder="Cari siswa..." 
                        value="{{ old('search', $keyword ?? '') }}">
                    <button type="submit" class="absolute left-[280px] top-1 mt-1.5 mr-2 text-gray-500">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <!-- Tabel Hasil Pencarian -->
            @if($calonsiswas->isEmpty())
                <p>Tidak ada calon siswa yang ditemukan.</p>
            @else
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                No
                            </th>
                            <th scope="col" class="px-2 py-3">
                                NISN
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Jenis Kelamin
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tempat/Tgl Lahir
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Asal Sekolah
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Jurusan
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Bukti Pendaftaran
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Aksi
                            </th>

                            {{-- <th scope="col" class="px-2 py-3">
                                Status
                            </th> --}} 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calonsiswas as $calonsiswa)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-2 py-4 text-center">
                                {{-- Menampilkan nomor urut yang berlanjut sesuai dengan halaman --}}
                                <span class="text-sm">{{ $loop->iteration + ($calonsiswas->currentPage() - 1) * $calonsiswas->perPage() }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->nisn }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->nama }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->j_kelamin }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->tempat_lahir }},  {{ Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d F Y')}}</span>                          
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->sekolah_asal }}</span>      
                            </td>
                            <td class="p2-6 py-4">
                                <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                            </td>
                            <td class=" p2-6 py-4 text-center">
                                <div class="text-xs text-[#00AA5B] ">
                                    <a href="{{ route('cetak', $calonsiswa->id_pendaftaran) }}" class="flex items-center justify-center space-x-2">
                                        <img src="{{ asset("assets/image/print.png") }}" alt="" width="25px">
                                        <span>Cetak</span>
                                    </a>
                                </div>
                            </td>
                            <td class="p2-6 py-4 text-center">
                                <!-- Button Hapus -->
                                <button type="button" data-modal-target="popup-modal-{{ $calonsiswa->id }}" data-modal-toggle="popup-modal-{{ $calonsiswa->id }}" class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#99154b" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                        Hapus
                                    </div>
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div id="popup-modal-{{ $calonsiswa->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mt-4 mb-6 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-3 text-lg  text-gray-700 dark:text-gray-300">Apakah anda yakin menghapus ?</h3>
                                                <p class="mb-7 text-lg  text-gray-500 dark:text-gray-400">{{ $calonsiswa->nama }}</p>
                                                <form action="{{ route('calon-siswa.destroy', $calonsiswa->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Hapus
                                                    </button>
                                                    <button type="button" data-modal-hide="popup-modal-{{ $calonsiswa->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        @endif

        @if (Auth::user()->role == 'user')
        <!-- Form Pencarian -->
            <form method="GET" action="{{ route('calon-siswa.show') }}" class="pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <input 
                        type="text" 
                        id="table-search" 
                        name="search" 
                        class="block w-80 p-2 pl-5 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00AA5B] focus:border-[#00AA5B] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                        placeholder="Cari siswa..." 
                        value="{{ old('search', $keyword ?? '') }}">
                    <button type="submit" class="absolute left-[280px] top-1 mt-1.5 mr-2 text-gray-500">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </div>
            </form>
            @if($calonsiswas->isEmpty())
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex flex-col justify-center items-center h-[75vh] w-[100%]">
                    <img src="{{ asset('assets/image/404 Page Not Found.svg') }}" width="200px" alt="Gambar not found" class="mx-auto">
                    <div class="text-sm text-center">Tidak ada data siswa.</div>
                </div>
            </div>            
            @else
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                No
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Jenis Kelamin
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tempat/Tgl Lahir
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Asal Sekolah
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Jurusan
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Status
                            </th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calonsiswas as $calonsiswa)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-2 py-4 text-center">
                                {{-- Menampilkan nomor urut yang berlanjut sesuai dengan halaman --}}
                                <span class="text-sm">{{ $loop->iteration + ($calonsiswas->currentPage() - 1) * $calonsiswas->perPage() }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->nama }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->j_kelamin }}</span>
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->tempat_lahir }},  {{ Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d F Y')}}</span>                          
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->sekolah_asal }}</span>      
                            </td>
                            <td class="px-2 py-4">
                                <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                            </td>
                            
                            <td class="px-2 py-4">
                                @if ($calonsiswa->statussiswa)
                                    @if ($calonsiswa->statussiswa->status == 'Diproses')
                                        <div class="flex gap-2 justify-start  text-blue-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#5b96fb" d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM288 437l0 11L96 448l0-11c0-25.5 10.1-49.9 28.1-67.9L192 301.3l67.9 67.9c18 18 28.1 42.4 28.1 67.9z"/>
                                            </svg>
                                            {{ $calonsiswa->statussiswa->status }}
                                        </div>
                                        @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                            <div class="flex gap-2 justify-start text-[#00AA5B] text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#00aa5b" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                                </svg>
                                                {{ $calonsiswa->statussiswa->status }}
                                            </div>    
                                        @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                            <div class="flex gap-2 justify-start text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#9b1c1c" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                                                </svg>
                                                {{ $calonsiswa->statussiswa->status }}
                                            </div>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @endif
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                        Status tidak tersedia
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        @endif
    <!-- Tampilkan pagination -->
    {{-- <div class="pagination justify-content-center mt-4">
        {{ $calonsiswas->links() }}
    </div> --}}
</div>


{{-- start hapus --}}
<script>
    document.querySelectorAll('[data-modal-toggle]').forEach(function(button) {
    button.addEventListener('click', function() {
        const modalId = button.getAttribute('data-modal-target');
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    });
});

document.querySelectorAll('[data-modal-hide]').forEach(function(button) {
    button.addEventListener('click', function() {
        const modalId = button.getAttribute('data-modal-hide');
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    });
});
</script>
{{-- end hapus --}}

@endsection
