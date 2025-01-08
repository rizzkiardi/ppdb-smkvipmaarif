@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 max-w-screen-xl xl:mx-auto">
        <div class="sm:gap-10 max-w-screen lg:max-w-screen-2xl space-y-10 ">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg max-sm:p-8 max-sm:rounded-lg">
                <div class="flex gap-10 max-lg:grid max-lg:grid-cols-1">
                    <div class="w-1/2 max-sm:w-full">
                        <h2 class="text-md my-3">Biodata Siswa</h2>
                        @if ($biodatas->isEmpty())
                            {{-- Tampilkan pemberitahuan ketika biodata tidak tersedia --}}
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Biodata siswa belum tersedia.</span>
                        @else
                            <table class="w-full bg-white border rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                    @foreach ($biodatas as $biodata)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2 text-sm">
                                            Pas Foto
                                        </td>
                                        <td class="px-2 py-2">
                                            <img src="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->pas_foto ) }}" alt="" class="rounded-lg" width="100">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2 text-sm">
                                            ID Pendaftaran
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->id_pendaftaran }}</span>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            NIK
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->nik}}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Nama Lengkap
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->nama }}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Tempat, Tgl lahir
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->tempat_lahir }},  {{ Carbon\Carbon::parse($biodata->tgl_lahir)->translatedFormat('d F Y')}}</span>                          
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Jenis Kelamin
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->j_kelamin}}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Agama
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->agama}}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            NISN
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->nisn}}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Asal Sekolah
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->sekolah_asal }}</span>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Tahun Lulus
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->tahun_lulus }}</span>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Kartu PIP
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->kartu_pip }}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Jurusan
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->jurusan }}</span>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Nomor HP
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->no_hp }}</span>
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            Alamat Rumah
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-sm">{{ $biodata->alamat }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="w-1/2 max-sm:w-full">
                        <h2 class="text-md my-3 max-sm:mt-7">Kelengkapan Dokumen</h2>
                        @if ($biodatas->isEmpty())
                            {{-- Tampilkan pemberitahuan ketika dokumen tidak tersedia --}}
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Dokumen belum tersedia.</span>
                        @else
                            <table class="w-full bg-white border rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                    @foreach ($biodatas as $biodata)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4 text-sm">
                                            Pas Foto
                                        </td>
                                        <td class="px-2 py-4">
                                            {{-- {{ $dokumen->pas_foto }} --}}
                                            {{ $biodata->dokumen->first()->pas_foto }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            <a href="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->pas_foto ) }}" data-lightbox="pas-foto" data-title="Pas Foto">
                                                {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Lihat</span> --}}
                                                <div class="flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                    Lihat
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4">
                                            Surat Keterangan Lulus
                                        </td>
                                        <td class="px-2 py-4">
                                            {{ $biodata->dokumen->first()->skl }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            <a href="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->skl ) }}" data-lightbox="skl" data-title="Surat Keterangan Lulus">
                                                {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Lihat</span> --}}
                                                <div class="flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                    Lihat
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4">
                                            Ijazah
                                        </td>
                                        <td class="px-2 py-4">
                                            {{ $biodata->dokumen->first()->ijazah }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            <a href="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->ijazah ) }}" data-lightbox="Ijazah" data-title="Ijazah">
                                                {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Lihat</span> --}}
                                                <div class="flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                    Lihat
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4">
                                            Kartu Keluarga
                                        </td>
                                        <td class="px-2 py-4">
                                            {{ $biodata->dokumen->first()->kk }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            <a href="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->kk ) }}" data-lightbox="Kartu-Keluarga" data-title="Kartu Keluarga">
                                                {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Lihat</span> --}}
                                                <div class="flex gap-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                    Lihat
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4">
                                            Akte Kelahiran
                                        </td>
                                        <td class="px-2 py-4">
                                            {{ $biodata->dokumen->first()->akte }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            <a href="{{ asset('storage/dokumen/' . $biodata->dokumen->first()->akte ) }}" data-lightbox="Akte-Kelahiran" data-title="Akte Kelahiran">
                                                {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Lihat</span> --}}
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
                        @endif

                        <h2 class="text-md my-3 max-sm:mt-7 mt-7">Bukti Pembayaran Daftar Ulang</h2>
                        @if ($biodatas->isEmpty())
                            {{-- Tampilkan pemberitahuan ketika bukti pembayaran tidak tersedia --}}
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Bukti Pembayaran belum tersedia.</span>
                        @else
                            <table class="w-full bg-white border rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <tbody>
                                    @foreach ($biodatas as $biodata)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-2 py-4 text-sm">
                                            Bukti Daftar Ulang
                                        </td>
                                        <td class="px-2 py-4">
                                            @if ($biodata->daftarulang && $biodata->daftarulang->first())
                                                {{-- Tampilkan bukti pembayaran jika ada --}}
                                                {{ $biodata->daftarulang->first()->bukti_pembayaran }}
                                            @else
                                                {{-- Pesan jika belum melakukan daftar ulang --}}
                                                <span class="text-red-500">Anda belum melakukan daftar ulang</span>
                                            @endif                                
                                        </td>
                                        <td class="px-2 py-2">
                                            <!-- Tambahkan link untuk Lightbox2 -->
                                            @if ($biodata->daftarulang && $biodata->daftarulang->first())
                                                {{-- Tampilkan link untuk melihat bukti pembayaran --}}
                                                <a href="{{ asset('storage/daftarulang/' . $biodata->daftarulang->first()->bukti_pembayaran ) }}" data-lightbox="bukti-pembayaran" data-title="Bukti Pembayaran">
                                                    <div class="flex gap-1 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512">
                                                            <path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                        </svg>
                                                        Lihat
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            <div class=" p-4 sm:p-8 bg-white shadow sm:rounded-lg max-sm:p-8 max-sm:rounded-lg">
                <h2 class="text-md my-3">Biodata Orangtua</h2>
                @if ($biodatas->isEmpty())
                    {{-- Tampilkan pemberitahuan ketika biodata tidak tersedia --}}
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300">Biodata Orang tua belum tersedia.</span>
                @else
                <div class="flex gap-10 max-lg:grid max-lg:grid-cols-1">
                    <div class="w-1/2 max-sm:w-full">
                        <p class="text-sm mb-2 max-sm:mt-7">Ayah</p>
                        <table class="w-full bg-white border rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <tbody>
                                @foreach ($biodatas as $biodata)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2 text-sm">
                                        Nama Ayah
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->nama_ayah }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Nomor Induk Kependudukan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->nik_ayah }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Tempat, Tanggal lahir
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->t_lahir_ayah }},</span> {{ Carbon\Carbon::parse($biodata->orangtua->first()->tgl_lahir_ayah)->translatedFormat('d F Y')}}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Agama
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->agama_ayah }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Pendidikan Terakhir
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->pendidikan_ayah }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Pekerjaan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->pekerjaan_ayah }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Penghasilan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->penghasilan_ayah }}</span>
                                    </td>
                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Nomor Handphone
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->no_hp_ayah }}</span>
                                    </td>
                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Alamat Rumah
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->alamat_ayah }}</span>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-1/2 max-sm:w-full">
                        <p class="text-sm mb-2 max-sm:mt-7">Ibu</p>
                        <table class="w-full bg-white border rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <tbody>
                                @foreach ($biodatas as $biodata)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2 text-sm">
                                        Nama Ibu
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->nama_ibu }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Nomor Induk Kependudukan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->nik_ibu}}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Tempat, Tanggal lahir
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->t_lahir_ibu }},</span> {{ Carbon\Carbon::parse($biodata->orangtua->first()->tgl_lahir_ibu)->translatedFormat('d F Y')}}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Agama
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->agama_ibu }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Pendidikan Terakhir
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->pendidikan_ibu }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Pekerjaan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->pekerjaan_ibu }}</span>
                                    </td>
                                </tr>
        
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Penghasilan
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->penghasilan_ibu }}</span>
                                    </td>
                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Nomor Handphone
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->no_hp_ibu }}</span>
                                    </td>
                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-2 py-2">
                                        Alamat Rumah
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="text-sm">{{ $biodata->orangtua->first()->alamat_ibu }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection