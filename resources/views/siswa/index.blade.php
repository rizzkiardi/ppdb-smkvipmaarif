@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <h2 class="mb-2">Data Siswa SMK VIP Maarif NU 1 Kemiri TA 2024/2025</h2>
        {{-- <div class="pb-1 dark:bg-gray-900 flex-end">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Siswa..">
            </div>
        </div> --}}
        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('siswa') }}" class="pb-4">
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
        {{-- @if ($calonsiswas->isEmpty())
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex flex-col justify-center items-center h-[75vh] w-[100%]">
                    <img src="{{ asset('assets/image/404 Page Not Found.svg') }}" width="200px" alt="Gambar not found" class="mx-auto">
                    <div class="text-sm text-center">Tidak ada data siswa.</div>
                </div>
            </div>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table data-tab-for="order" data-page="diterima" class=" w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
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
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($calonsiswas as $calonsiswa)
                            @if ($calonsiswa->statussiswa && $calonsiswa->statussiswa->status == 'Diterima')
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-2 py-4 text-center">
                                        <span class="text-sm">{{ $no++ }}</span>
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
                                        <a href="{{ route('siswa.show', ['id' => $calonsiswa->id]) }}">
                                            
                                            <div class="flex gap-1 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                </svg>
                                                Lihat
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif --}}
        <!-- Tabel Data -->
        @if ($calonsiswas->isEmpty())
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex flex-col justify-center items-center h-[75vh] w-[100%]">
                    <img src="{{ asset('assets/image/404 Page Not Found.svg') }}" width="200px" alt="Gambar not found" class="mx-auto">
                    <div class="text-sm text-center">Tidak ada data siswa.</div>
                </div>
            </div>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">No</th>
                            <th scope="col" class="px-2 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-2 py-3">Jenis Kelamin</th>
                            <th scope="col" class="px-2 py-3">Tempat/Tgl Lahir</th>
                            <th scope="col" class="px-2 py-3">Asal Sekolah</th>
                            <th scope="col" class="px-2 py-3">Jurusan</th>
                            <th scope="col" class="px-2 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($calonsiswas as $calonsiswa)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-2 py-4 text-center">{{ $no++ }}</td>
                                <td class="px-2 py-4">{{ $calonsiswa->nama }}</td>
                                <td class="px-2 py-4">{{ $calonsiswa->j_kelamin }}</td>
                                <td class="px-2 py-4">{{ $calonsiswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d F Y') }}</td>
                                <td class="px-2 py-4">{{ $calonsiswa->sekolah_asal }}</td>
                                <td class="px-2 py-4">{{ $calonsiswa->jurusan }}</td>
                                <td class="px-2 py-4">
                                    <a href="{{ route('siswa.show', ['id' => $calonsiswa->id]) }}">
                                        <div class="flex gap-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                            </svg>
                                            Lihat
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection