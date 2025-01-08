@extends('layouts.app')

@section('content')
<div class="px-6 py-8 max-w-screen-xl xl:mx-auto">
        @if (Auth::user()->role == 'admin')
            <h2 class="pb-6 text-lg font-semibold ">Selamat datang, {{ Auth::user()->name }}</h2>
            <div class="lg:flex gap-5 max-sm:block max-sm:w-full  overflow-hidden">
                <div class="flex max-lg:mb-5 gap-5 w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-sm:w-full max-sm:px-10 max-sm:space-x-5">
                    <div>
                        <svg class="max-sm:h-[75px]" xmlns="http://www.w3.org/2000/svg" height="90" width="95" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#f0f3f7" d="M48 48l88 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L32 0C14.3 0 0 14.3 0 32L0 136c0 13.3 10.7 24 24 24s24-10.7 24-24l0-88zM175.8 224a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-26.5 32C119.9 256 96 279.9 96 309.3c0 14.7 11.9 26.7 26.7 26.7l56.1 0c8-34.1 32.8-61.7 65.2-73.6c-7.5-4.1-16.2-6.4-25.3-6.4l-69.3 0zm368 80c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3l-69.3 0c-9.2 0-17.8 2.3-25.3 6.4c32.4 11.9 57.2 39.5 65.2 73.6l56.1 0zm-89.4 0c-8.6-24.3-29.9-42.6-55.9-47c-3.9-.7-7.9-1-12-1l-80 0c-4.1 0-8.1 .3-12 1c-26 4.4-47.3 22.7-55.9 47c-2.7 7.5-4.1 15.6-4.1 24c0 13.3 10.7 24 24 24l176 0c13.3 0 24-10.7 24-24c0-8.4-1.4-16.5-4.1-24zM464 224a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-80-32a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM504 48l88 0 0 88c0 13.3 10.7 24 24 24s24-10.7 24-24l0-104c0-17.7-14.3-32-32-32L504 0c-13.3 0-24 10.7-24 24s10.7 24 24 24zM48 464l0-88c0-13.3-10.7-24-24-24s-24 10.7-24 24L0 480c0 17.7 14.3 32 32 32l104 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-88 0zm456 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l104 0c17.7 0 32-14.3 32-32l0-104c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 88-88 0z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="max-sm:text-2xl mb-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-white">{{ $jumlahPengguna }}</div>
                        <div class="flex justify-between">
                            <p class="max-sm:text-xs text-sm text-gray-700 dark:text-gray-400">Total Pengguna</p>
                        </div>
                    </div>
                </div>
            
                <div class="flex max-lg:mb-5 max-sm:gap-2 gap-5 w-full max-w-md  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-sm:w-full max-sm:px-10 max-sm:space-x-5">
                    <div>
                        <svg class="max-sm:h-[75px]" xmlns="http://www.w3.org/2000/svg" height="90" width="95" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#f0f3f7" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="max-sm:text-2xl mb-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-white">{{ $jumlahPendaftar }}</div>
                        <div class="flex justify-between">
                            <p class="max-sm:text-xs text-sm text-gray-700 dark:text-gray-400">Siswa Mendaftar</p>
                            <a href="{{ route('status') }}" class=" ml-5 max-sm:text-xs text-sm text-gray-700">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                    Lihat
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex max-lg:mb-5 max-sm:gap-2 gap-5 w-full max-w-md  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-sm:w-full max-sm:px-10 max-sm:space-x-5">
                    <div>
                        <svg class="max-sm:h-[75px]" xmlns="http://www.w3.org/2000/svg" height="90" width="87.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#f0f3f7" d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="max-sm:text-2xl mb-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-white">{{ $jumlahSiswaDiterima }}</div>
                        <div class="flex justify-between">
                            <p class="max-sm:text-xs text-sm text-gray-700 dark:text-gray-400">Siswa Diterima</p>
                            <a href="{{ route('siswa') }}" class=" ml-5 max-sm:text-xs text-sm text-gray-700 ">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                    Lihat
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex max-lg:mb-5 max-sm:gap-2 gap-5 w-full max-w-md  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-sm:w-full max-sm:px-10 max-sm:space-x-5">
                    <div>
                        <svg class="max-sm:h-[75px]" xmlns="http://www.w3.org/2000/svg" height="90" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#f0f3f7" d="M104.6 48L64 48C28.7 48 0 76.7 0 112L0 384c0 35.3 28.7 64 64 64l96 0 0-48-96 0c-8.8 0-16-7.2-16-16l0-272c0-8.8 7.2-16 16-16l16 0c0 17.7 14.3 32 32 32l72.4 0C202 108.4 227.6 96 256 96l62 0c-7.1-27.6-32.2-48-62-48l-40.6 0C211.6 20.9 188.2 0 160 0s-51.6 20.9-55.4 48zM144 56a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zM448 464l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L464 243.9 464 448c0 8.8-7.2 16-16 16zM256 512l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9l-67.9-67.9c-9-9-21.2-14.1-33.9-14.1L256 128c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="max-sm:text-2xl mb-2 text-3xl font-bold tracking-tight text-gray-700 dark:text-white">{{ $jumlahSiswaDaftarUlang }}</div>
                        <div class="flex justify-between">
                            <p class="max-sm:text-xs text-sm text-gray-700 dark:text-gray-400">Siswa Daftar Ulang</p>
                            <a href="{{ route('daftar-ulang.index') }}" class=" ml-5 max-sm:text-xs text-sm text-gray-700 ">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00aa5b" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                    Lihat
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-10">
                <h2 class="text-md">Grafik PPDB berdasarkan jurusan.</h2>
                {{-- <div class="w-[75%] mx-auto"> --}}
                    <canvas class="my-2" id="jurusanChart" width="400" height="200"></canvas>
                {{-- </div> --}}
                <script>
                    var ctx = document.getElementById('jurusanChart').getContext('2d');
                    var jurusanChart = new Chart(ctx, {
                        type: 'bar', // Bisa diganti dengan 'pie' 'bar' jika ingin menggunakan pie chart
                        data: {
                            labels: ['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik'],
                            datasets: [{
                                label: 'Jumlah Pendaftar',
                                data: [{{ $akuntansiCount }}, {{ $dkvCount }}, {{ $ototronikCount }}],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        @endif

        @if (Auth::user()->role == 'user')
            @if($notifications->isNotEmpty())
                <ul id="notification-list" class="bg-gradient-to-br from-[#00AA5B] to-[#c0ffd3] border rounded-lg shadow-md px-3 py-1 mb-5">
                    @foreach ($notifications as $notification)
                        <li id="notification-{{ $notification->id }}" class="border-b last:border-b-0 py-2">
                            <span class="text-sm">{!! $notification->data['message'] ?? 'Pesan tidak tersedia' !!}</span>
                            <div class=" text-gray-500 flex justify-between">
                                <a 
                                    href="{{ route('status.user') }}" 
                                    class="hover:underline text-white text-sm mark-as-read" 
                                    data-id="{{ $notification->id }}"
                                    data-url="{{ route('status.user') }}"
                                >
                                    <div class="flex gap-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fff" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                        </svg>
                                        Lihat
                                    </div>
                                </a>
                                <span class="text-xs">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            <h2 class="pb-4 text-lg font-semibold ">Selamat datang, {{ Auth::user()->name }}</h2>
            <h2 class="mb-2 text-sm">SMK VIP Maarif NU 1 Kemiri memiliki 3 Kompetensi Keahlian / Jurusan.</h2>
            <div class="flex gap-5 max-w-screen-xl max-lg:flex-col max-lg:w-1/2 max-lg:mx-auto max-lg:space-y-5">
                {{-- Start Akuntansi --}}
                <a href="{{ asset('assets/image/Jurusan akuntansi.png') }}" data-lightbox="akuntansi" data-title="Jurusan Akuntansi">
                    <img class="rounded-md" src="{{ asset('assets/image/Jurusan akuntansi.png') }}" alt="Jurusan Akuntansi">
                </a>

                {{-- Start DKV --}}
                <a href="{{ asset('assets/image/Jurusan dkv.png') }}" data-lightbox="dkv" data-title="Jurusan Desain Komunikasi Visual">
                    <img class="rounded-md" src="{{ asset('assets/image/Jurusan dkv.png') }}" alt="Jurusan Desain Komunikasi Visual">
                </a>

                {{-- Start Ototronik --}}
                <a href="{{ asset('assets/image/Jurusan ototronik.png') }}" data-lightbox="ototronik" data-title="Jurusan Ototronik">
                    <img class="rounded-md" src="{{ asset('assets/image/Jurusan ototronik.png') }}" alt="Jurusan Ototronik">
                </a>
            </div>

            <div class="my-10">
                <h2 class="text-sm">Grafik PPDB berdasarkan jurusan.</h2>
                <canvas class="my-2" id="jurusanChart" width="400" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('jurusanChart').getContext('2d');
                    var jurusanChart = new Chart(ctx, {
                        type: 'bar', // Bisa diganti dengan 'pie' jika ingin menggunakan pie chart
                        data: {
                            labels: ['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik'],
                            datasets: [{
                                label: 'Jumlah Pendaftar',
                                data: [{{ $akuntansiCount }}, {{ $dkvCount }}, {{ $ototronikCount }}],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>

            @if (!Auth::user()->hasRegistered())
                <!-- Modal Pop-up -->
                <div id="modal-pendaftaran" class="fixed z-10 inset-0 overflow-y-auto backdrop-filter backdrop-blur-sm bg-gray-500 bg-opacity-50 transition-opacity duration-300 ease-out">
                    <div class="flex items-center justify-center min-h-screen px-4 transition-transform transform scale-95 opacity-0 duration-300 ease-out">
                        <div class="animate__animated animate__backInDown bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative">
                            <!-- Close button -->
                            <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>

                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Pemberitahuan</h3>
                            <p class="text-gray-800 mb-4">
                                Anda belum mendaftar sebagai Calon peserta Didik Baru SMK VIP MAARIF NU 1 KEMIRI.
                            </p>
                            <a href="{{ route('pendaftaran.calon-siswa.create') }}" class="text-[#00AA5B] underline">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endif

    </div>

    <!-- Script to open and close modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var userHasRegistered = {{ Auth::user()->hasRegistered() ? 'true' : 'false' }};
            var modal = document.getElementById('modal-pendaftaran');
            var modalContent = modal.querySelector('div.transition-transform');
            var closeModal = document.getElementById('close-modal');

            if (!userHasRegistered) {
                modal.classList.remove('hidden');

                // Apply transition for showing modal
                setTimeout(function () {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                }, 100); // Delay slightly to trigger animation
            }

            // Close modal when the close button is clicked
            closeModal.addEventListener('click', function () {
                modalContent.classList.add('scale-95', 'opacity-0'); // Add back animation
                setTimeout(function () {
                    modal.classList.add('hidden'); // Hide modal after transition
                }, 300); // Wait for the animation to finish
            });
        });

        // notifikasi
        document.addEventListener('DOMContentLoaded', function () {
            // Pilih semua elemen dengan class 'mark-as-read'
            const links = document.querySelectorAll('.mark-as-read');

            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault(); // Mencegah aksi default

                    // Ambil ID dari data-id
                    const notificationId = this.getAttribute('data-id');
                    const redirectUrl = this.getAttribute('data-url');

                    // Hapus elemen notifikasi dari tampilan
                    // const notificationElement = document.getElementById(`notification-${notificationId}`);
                    // if (notificationElement) {
                    //     notificationElement.remove();
                    // }

                    // Periksa apakah masih ada notifikasi
                    // const notificationList = document.getElementById('notification-list');
                    // if (!notificationList.querySelector('li')) {
                    //     notificationList.innerHTML = '<li class="text-gray-500">Tidak ada notifikasi.</li>';
                    // }

                    // Redirect ke halaman tujuan
                    window.location.href = redirectUrl;
                });
            });
        });
    </script>
@endsection