@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <h2 class="mb-5">Status Calon peserta Didik Baru SMK VIP Maarif NU 1 Kemiri</h2>

        <div class="flex items-center mb-1 order-tab border border-slate-200 rounded-md w-[242px]">
            <button type="button" data-tab="order" data-tab-page="active" class="bg-gray-50 text-sm font-medium text-gray-400 py-2 px-4 rounded-tl-md rounded-bl-md hover:text-gray-600 active">Semua</button>
            <button type="button" data-tab="order" data-tab-page="diterima" class="bg-gray-50 text-sm font-medium text-gray-400 py-2 px-4 hover:text-gray-600">Diterima</button>
            <button type="button" data-tab="order" data-tab-page="ditolak" class="bg-gray-50 text-sm font-medium text-gray-400 py-2 px-4 rounded-tr-md rounded-br-md hover:text-gray-600">Ditolak</button>
        </div>

        {{-- start table --}}
        @if(Auth::user()->role === 'admin')
            <div class=" overflow-x-auto shadow-md sm:rounded-lg ">
                <table data-tab-for="order" data-page="active" class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
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
                            <th scope="col" class="px-2 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($calonsiswas as $calonsiswa)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-1 py-4 text-center">
                                {{-- Menampilkan nomor urut yang berlanjut sesuai dengan halaman --}}
                                <span class="text-sm">{{ $loop->iteration + ($calonsiswas->currentPage() - 1) * $calonsiswas->perPage() }}</span>
                            </td>
                            <td class="px-1 py-4">
                                <span class="text-sm">{{ $calonsiswa->nama }}</span>
                            </td>
                            <td class="px-1 py-4">
                                <span class="text-sm">{{ $calonsiswa->j_kelamin }}</span>
                            </td>
                            <td class="px-1 py-4">
                                <span class="text-sm">{{ $calonsiswa->tempat_lahir }},  {{ Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d F Y')}}</span>                          
                            </td>
                            <td class="px-1 py-4">
                                <span class="text-sm">{{ $calonsiswa->sekolah_asal }}</span>      
                            </td>
                            <td class="px-1 py-4">
                                <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                            </td>
                            <td class="px-1 py-4">
                                @if ($calonsiswa->statussiswa)
                                    @if ($calonsiswa->statussiswa->status == 'Diproses')
                                        <div class="flex gap-2 justify-start  text-blue-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#723b13" d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM288 437l0 11L96 448l0-11c0-25.5 10.1-49.9 28.1-67.9L192 301.3l67.9 67.9c18 18 28.1 42.4 28.1 67.9z"/>
                                            </svg> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#5b96fb" d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM288 437l0 11L96 448l0-11c0-25.5 10.1-49.9 28.1-67.9L192 301.3l67.9 67.9c18 18 28.1 42.4 28.1 67.9z"/>
                                            </svg>
                                            {{ $calonsiswa->statussiswa->status }}
                                        </div>
                                    @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                        <div class="flex gap-2 justify-start text-[#00AA5B] text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                                            </svg> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#00aa5b" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                            </svg>
                                            {{ $calonsiswa->statussiswa->status }}
                                        </div>    
                                    @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                        <div class="flex gap-2 justify-start text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#771d1d" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                                            </svg> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#9b1c1c" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                                            </svg>
                                            {{ $calonsiswa->statussiswa->status }}
                                        </div>
                                    @else
                                        {{-- Jika status tidak sesuai dengan salah satu dari kondisi di atas --}}
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @endif
                                @else
                                    {{-- Jika tidak ada data statussiswa terkait --}}
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                        Status tidak tersedia
                                    </span>
                                @endif
                            </td>                            
                            <td>
                                <a class="" href="{{ route('status.ubah', ['id' => $calonsiswa->id]) }}">
                                    <div class="flex gap-2 items-center bg-green-100 rounded-md px-2 justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#00aa5b" d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/>
                                        </svg>
                                        <span class="text-xs text-[#00AA5B]">Ubah Status</span>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table data-tab-for="order" data-page="diterima" class="hidden w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
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
                                    <td class="p2-6 py-4">
                                        <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        @if ($calonsiswa->statussiswa->status == 'Diproses')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                            {{-- <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span> --}}
                                        @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @else
                                        {{-- Jika status tidak sesuai dengan salah satu dari kondisi di atas --}}
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @endif
                                    </td>
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <table data-tab-for="order" data-page="ditolak" class="hidden w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
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
                        @php $no = 1; @endphp
                        @foreach ($calonsiswas as $calonsiswa)
                            @if ($calonsiswa->statussiswa && $calonsiswa->statussiswa->status == 'Ditolak')
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
                                    <td class="p2-6 py-4">
                                        <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                                    </td>
                                    <td class="px-2 py-4">
                                        @if ($calonsiswa->statussiswa->status == 'Diproses')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @else
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                                {{ $calonsiswa->statussiswa->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Tampilkan pagination -->
            <div class="pagination justify-content-center mt-4">
                {{ $calonsiswas->links() }}
            </div>
            {{-- end table --}}
        @else
            <div class=" overflow-x-auto shadow-md sm:rounded-lg ">
                <table data-tab-for="order" data-page="active" class="w-full min-w-[540px] text-sm text-left border-t border-slate-100 rtl:text-right text-gray-500 dark:text-gray-400">
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
                            <td class="p2-6 py-4">
                                <span class="text-sm">{{ $calonsiswa->jurusan }}</span>
                            </td>
                            <td class="px-2 py-4">
                                @if ($calonsiswa->statussiswa)
                                    @if ($calonsiswa->statussiswa->status == 'Diproses')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @elseif ($calonsiswa->statussiswa->status == 'Diterima')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @elseif ($calonsiswa->statussiswa->status == 'Ditolak')
                                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @else
                                        {{-- Jika status tidak sesuai dengan salah satu dari kondisi di atas --}}
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">
                                            {{ $calonsiswa->statussiswa->status }}
                                        </span>
                                    @endif
                                @else
                                    {{-- Jika tidak ada data statussiswa terkait --}}
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
    </div>
@endsection